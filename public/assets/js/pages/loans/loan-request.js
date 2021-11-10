function getOptions(optionUrl, optionId, data) {
    $.ajax({
        type: "GET",
        data: data,
        url: optionUrl,
        datatype: "application/json",
        success: (response) => {
            let data = response.data;
            $.each(data, (index) => {
                $(optionId).append(
                    $("<option>", {
                        value: data[index].code,
                    }).text(data[index].name)
                );
            });
            if (optionId === "#loan_sub_sectors") {
                $("#side-loadingId").hide();
            }
        },
        error: (xhr, status, error) => {
            console.log(optionUrl);
            console.log(error);
            setTimeout(() => {
                getOptions(optionUrl, optionId);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getBranches() {
    $.ajax({
        type: "GET",
        url: "get-branches-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            $.each(data, (i) => {
                let { branchCode, branchDescription } = data[i];
                $("#product_branch").append(
                    $("<option>", {
                        value: branchCode,
                    }).text(branchDescription)
                );
            });
        },
    });
}

function getLoanQuotationDetails(loanData) {
    $.ajax({
        type: "POST",
        url: "loan-quotation-details",
        datatype: "application/json",
        data: loanData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode === "000") {
                console.log(response);
                let table = $(".loan_payment_schedule").DataTable();
                // var nodes = table.rows().nodes();
                let data = response.data.loanSchedule;
                $("#request_form_div").hide();
                $(".disappear-after-success").hide();
                $("#loan_request_detail_div").show();
                $("#loan_request_detail_div").hide();
                $(".appear-button").show();
                $("#atm_request_summary").hide();
                $("#payment_schedule").show();
                $(".spinner-load").hide();
                $(".submit-text").show();
                $("#btn_loan_request").prop("disabled", false);

                $.each(data, function (index) {
                    model_data = data[index];
                    table.row
                        .add([
                            index + 1,
                            data[index].repaymentDate,
                            data[index].principalRepayment,
                            data[index].interestRepayment,
                            data[index].totalRepayment,
                        ])
                        .draw(false);
                });
            } else {
                toaster(response.message, "error", 2000);
                $(".spinner-load").hide();
                $(".submit-text").show();
                $("#btn_loan_request").prop("disabled", false);
            }
        },
        error: function (xhr, status, error) {
            $("#submit").attr("disabled", false);
            $(".spinner-load").hide();
            $("#log_in").show();
            $("#error_message").text("Connection Error");
            $("#failed_login").show();
        },
    });
}

function postLoanOrigination(data) {
    $.ajax({
        type: "POST",
        url: "loan-origination-api",
        datatype: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: data,
        success: function (response) {
            if (response.responseCode === "000") {
                console.log(response);
                swal.fire({
                    title: "Logout successful!",
                    html: response.message,
                    icon: "success",
                    showConfirmButton: "false",
                    timer: "2000",
                });
            } else {
                $("#btn_loan_request").prop("disabled", false);
                toaster(response.message, "warning");
            }
        },
    });
}

$(() => {
    getOptions("get-loan-products-api", "#loan_product");
    getOptions("get-loan-frequencies-api", ".loan_frequencies");
    getOptions("get-interest-types-api", "#interest_rate_type");
    getOptions("get-loan-intro-source-api", "#loan_intro_source");
    getOptions("get-loan-sectors-api", "#loan_sectors");
    getOptions("get-loan-purpose-api", "#loan_purpose");
    getBranches();
    let loanData = new Object();
    let loanFormStage = "initial";
    let confirmationCompleted = false;

    $("#loan_product").on("change", (e) => {
        loanData.loanProduct = $("#loan_product option:selected").text();
        loanData.loanProductCode = $("#loan_product option:selected").val();
        $(".display_loan_product").text(loanData.loanProduct);
    });

    $("#loan_amount").on("input", (e) => {
        loanData.loanAmount = $("#loan_amount").val();
        if (loanData.loanAmount > 9999099) {
            toaster("Amount exceeds maximum allowed", warning);
            return false;
        }
        $(".display_loan_amount").text(
            parseFloat(loanData.loanAmount).toFixed(2)
        );
    });

    $("#tenure_in_months").on("input", (e) => {
        loanData.tenureInMonths = $("#tenure_in_months").val();
        if (loanData.tenureInMonths > 120) {
            toaster("tenure exceeds maximum allowed", warning);
            return false;
        }
        $(".display_tenure_in_months").text(loanData.tenureInMonths);
    });

    $("#interest_rate_type").on("change", (e) => {
        loanData.interestRateType = $(
            "#interest_rate_type option:selected"
        ).text();
        loanData.interestRateTypeCode = $(
            "#interest_rate_type option:selected"
        ).val();
        $(".display_interest_rate_type").text(loanData.interestRateType);
    });

    $("#principal_repay_freq").on("change", (e) => {
        loanData.principalRepayFreq = $(
            "#principal_repay_freq option:selected"
        ).text();
        loanData.principalRepayFreqCode = $(
            "#principal_repay_freq option:selected"
        ).val();
        $(".display_principal_repay_freq").text(loanData.principalRepayFreq);
    });

    $("#interest_repay_freq").on("change", (e) => {
        loanData.interestRepayFreq = $(
            "#interest_repay_freq option:selected"
        ).text();
        loanData.interestRepayFreqCode = $(
            "#interest_repay_freq option:selected"
        ).val();
        $(".display_interest_repay_freq").text(loanData.interestRepayFreq);
    });
    $("#loan_purpose").on("change", (e) => {
        loanData.loanPurpose = $("#loan_purpose option:selected").text();
        loanData.loanPurposeCode = $("#loan_purpose option:selected").val();
        $(".display_loan_purpose").text(loanData.loanPurpose);
    });
    $("#loan_sectors").on("change", () => {
        loanData.loanSector = $("#loan_sectors option:selected").text();
        loanData.loanSectorCode = $("#loan_sectors option:selected").val();
        if (loanData.loanSectorCode === "") {
            $(".loan-sub-sectors-div").hide(300);
        } else {
            $("#loan_sub_sectors")
                .empty()
                .append(
                    '<option value="" disabled selected hidden>Select the sub sector</option>'
                );
            getOptions(
                "get-loan-sub-sectors-api",
                "#loan_sub_sectors",
                loanData
            );
            $(".loan-sub-sectors-div").show(300);
        }
        $(".display_loan_sectors").text(loanData.loanSector);
    });

    $("#loan_intro_source").on("change", (e) => {
        loanData.loanIntroSource = $(
            "#loan_intro_source option:selected"
        ).text();
        loanData.loanIntroSourceCode = $(
            "#loan_intro_source option:selected"
        ).val();
        $(".display_loan_intro_source").text(loanData.loanIntroSource);
    });

    $("#loan_sub_sectors").on("change", (e) => {
        loanData.loanSubSector = $("#loan_sub_sectors option:selected").text();
        loanData.loanSubSectorCode = $(
            "#loan_sub_sectors option:selected"
        ).val();
        $(".display_loan_sub_sectors").text(loanData.loanSubSector);
    });
    $("#btn_proceed_to_loan").on("click", (e) => {
        $("#payment_schedule").toggle();
        $("#request_form_div").toggle(500);
        $("#atm_request_summary").toggle(500);
        $(".loan-detail").toggle(500);
        $(".spinner-load").hide();
        loanFormStage = "final";
    });
    $("#product_branch").on("change", (e) => {
        loanData.productBranchCode = $("#product_branch option:selected").val();
        loanData.productBranch = $("#product_branch option:selected").text();
        $(".display_product_branch").text(loanData.productBranch);
    });

    $("#page_back_button").on("click", (e) => {
        if (loanFormStage !== "initial") {
            e.preventDefault();
            if (loanFormStage === "middle") {
                $(".submit-text").show();
                $(".spinner-load").hide();
                $("#request_form_div").show(500);
                $(".disappear-after-success").show();
                $("#loan_request_detail_div").hide();
                $(".success-message").hide();
                $("#loan_request_detail_div").show();
                $(".appear-button").hide();
                $("#atm_request_summary").show();
                $("#payment_schedule").hide();
                loanFormStage = "initial";
            } else if (loanFormStage == "final") {
                $("#payment_schedule").toggle();
                $("#request_form_div").toggle(500);
                $("#atm_request_summary").toggle(500);
                $(".loan-detail").toggle(500);
                $(".spinner-load").show();
                loanFormStage = "middle";
            }
        }
    });

    $("#btn_loan_request").on("click", (e) => {
        if (loanFormStage === "final") {
            console.log(loanData);
            if (
                !loanData.loanProductCode ||
                !loanData.loanAmount ||
                !loanData.tenureInMonths ||
                !loanData.principalRepayFreqCode ||
                !loanData.interestRateTypeCode ||
                !loanData.interestRepayFreqCode ||
                !loanData.loanIntroSourceCode ||
                !loanData.loanSectorCode ||
                !loanData.loanSubSectorCode ||
                !loanData.loanPurpose ||
                !loanData.productBranch
            ) {
                console.log("A");
                toaster("Please complete all required fields", "warning");
                return false;
            }
            confirmationCompleted = true;
            $("#centermodal").modal("show");
            // postLoanOrigination(loanData);
            // loanFormStage = false;
            return;
        }

        if (
            !loanData.loanProductCode ||
            !loanData.loanAmount ||
            !loanData.tenureInMonths ||
            !loanData.principalRepayFreqCode ||
            !loanData.interestRateTypeCode ||
            !loanData.interestRepayFreqCode
        ) {
            toaster("Please complete all required fields", "warning");
            return false;
        }
        loanFormStage = "middle";
        $(".submit-text").hide();
        $(".spinner-load").show();
        $("#btn_loan_request").prop("disabled", true);
        getLoanQuotationDetails(loanData);
    });
    $("#transfer_pin").on("click", function (e) {
        e.preventDefault;
        if (!confirmationCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        loanData.secPin = $("#user_pin").val();
        if (loanData.secPin.length !== 4) {
            toaster("invalid pin", "warning", 3000);
            return false;
        }
        $("#btn_loan_request").prop("disabled", true);
        postLoanOrigination(loanData);
        $("#user_pin").val("").text("");
        loanData.secPin = "";
        confirmationCompleted = false;
    });
});
