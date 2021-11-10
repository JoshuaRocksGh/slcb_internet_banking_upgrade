function postStandingOrder(url, data) {
    $.ajax({
        type: "POST",
        url: url,
        datatype: "application/json",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);

            if (response.responseCode == "000") {
                transactionSuccessToaster(response.message);
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#back_button").hide();
                $("#print_receipt").show();
                $(".receipt").show();
                $(".form_process").hide();
                $("#confirm_modal_button").hide();
            } else {
                toaster(response.message, "error");
                $("#confirm_transfer_text").show();
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#confirm_modal_button").prop("disabled", false);

                // $(".form_process").hide();
                console.log("api error");
            }
        },
        error: function (error) {
            console.log(error);
            toaster(error, "error");
            $("#confirm_transfer_text").show();
            $("#spinner").hide();
            $("#spinner-text").hide();
            $("#confirm_modal_button").prop("disabled", false);
        },
    });
}

//function to get the loan products accessible to the customer of the bank.
function getStandingOrderFrequencies() {
    $.ajax({
        type: "GET",
        url: "get-standing-order-frequencies-api",
        datatype: "application/json",
        success: function (response) {
            console.log(response.data);
            let data = response.data;
            $.each(data, function (index) {
                $(".so_frequency").append(
                    $("<option>", {
                        value: data[index].code + "~" + data[index].name,
                    }).text(data[index].name)
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getStandingOrderFrequencies();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getBeneficiaries() {
    $.ajax({
        type: "GET",
        url: "get-transfer-beneficiary-api?beneType=SAB",
        datatype: "application/json",
        success: function (response) {
            // console.log(response.data);
            let data = response.data;

            if (!response.data) {
            } else {
                if (response.data.length > 0) {
                    $(".yes_beneficiary").show();
                    $(".no_beneficiary").hide();

                    $.each(data, function (index) {
                        //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                        $("#saved_beneficiary").append(
                            $("<option>", {
                                value:
                                    data[index].BANK_NAME +
                                    "~" +
                                    data[index].NICKNAME.toUpperCase() +
                                    "~" +
                                    data[index].BEN_ACCOUNT +
                                    "~" +
                                    data[index].BEN_ACCOUNT_CURRENCY +
                                    "~" +
                                    data[index].ADDRESS_1 +
                                    "~" +
                                    data[index].BANK_SWIFT_CODE +
                                    "~" +
                                    data[index].EMAIL,
                                // "~" +
                                // JSON.stringify(data[index]),
                            }).text(
                                data[index].NICKNAME.toUpperCase() +
                                    " - " +
                                    data[index].BANK_NAME.toUpperCase() +
                                    " - " +
                                    data[index].BEN_ACCOUNT +
                                    " - " +
                                    data[index].BEN_ACCOUNT_CURRENCY
                            )
                        );
                    });
                } else {
                    // $('.yes_beneficiary').hide()
                    // $('.no_beneficiary').show()
                }
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getBeneficiaries();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

$(document).ready(function () {
    getBeneficiaries();
    getStandingOrderFrequencies();
    let standingOrderData = new Object();
    let fromAccount = new Object();
    let toAccount = new Object();
    let validationsCompleted = false;
    let confirmationCompleted = false;
    $("#from_account").on("change", function () {
        fromAccount.info = $(this).val();
        // console.log(fromAccount.info);
        if (!fromAccount.info) {
            $(".display_from_account_type").text("");
            $(".display_from_account_name").text("");
            $(".display_from_account_no").text("");
            $(".display_from_account_currency").text("");
            $(".display_currency").text("");
            $(".from_account_display_info").hide();
            $(".display_from_account_amount").text("");
            return false;
        }

        let accountDetails = fromAccount.info.split("~");
        console.log(accountDetails);
        fromAccount.type = accountDetails[0].trim();
        fromAccount.name = accountDetails[1].trim();
        fromAccount.accountNumber = accountDetails[2].trim();
        fromAccount.currency = accountDetails[3].trim();
        fromAccount.balance = parseFloat(accountDetails[4].trim());
        fromAccount.mandate = accountDetails[5].trim();
        fromAccount.bankCode = "aaa";
        const { type, name, accountNumber, currency, balance, mandate } =
            fromAccount;
        if (accountNumber === toAccount.accountNumber) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            return false;
        }

        $(".display_from_account_type").text(type);
        $(".display_from_account_name").text(name);
        $(".display_from_account_no").text(accountNumber);
        $(".display_from_account_currency").text(currency);
        $(".display_currency").text(currency);
        $(".display_from_account_amount").text(balance);
        $(".from_account_display_info").show();
    });

    $("#saved_beneficiary").on("change", function () {
        toAccount.info = $(this).val();
        if (!toAccount.info) {
            $(".to_account_display_info").hide();
            $(".to_account_display_info").hide();
            $(".display_to_account_name").text("");
            $(".display_to_account_no").text("");
            $(".display_to_account_currency").text("");
            return false;
        }

        let accountDetails = toAccount.info.split("~");
        toAccount.bank = accountDetails[0].trim();
        toAccount.name = accountDetails[1].trim();
        toAccount.accountNumber = accountDetails[2].trim();
        toAccount.currency = accountDetails[3].trim();
        toAccount.email = accountDetails[6].trim();
        const { bank, name, accountNumber, currency, email } = toAccount;

        if (accountNumber === fromAccount.accountNumber) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            return false;
        }
        $("#saved_beneficiary_name").val(name);
        $("#saved_account_number").val(accountNumber);
        $("#saved_beneficiary_email").val(email);

        $(".display_to_account_type").text(bank);
        $(".display_to_account_name").text(name);
        $(".display_to_account_no").text(accountNumber);
        // $(".display_to_account_amount").text(to_account_info[4]);
        $(".display_to_account_currency").text(currency);
        $(".to_account_display_info").show();
    });

    let today = new Date();
    let day = today.getDate().toString().padStart(2, "0");
    let month = (today.getMonth() + 1).toString().padStart(2, "0");
    standingOrderData.startDate = today.getFullYear() + "-" + month + "-01";
    standingOrderData.endDate = today.getFullYear() + "-" + month + "-" + day;
    let thisDay = standingOrderData.endDate;

    $("#so_start_date").on("change", function () {
        standingOrderData.startDate = $("#so_start_date").val();
        $(".display_so_start_date").text(standingOrderData.startDate);
        // console.log(display_start_date);
    });

    $("#so_end_date").on("change", function () {
        standingOrderData.endDate = $("#so_end_date").val();
        $(".display_so_end_date").text(standingOrderData.endDate);
        // console.log(display_end_date);
    });

    $("#amount").on("keyup", function () {
        standingOrderData.amount = parseFloat($(this).val()).toFixed(2);
        const { amount } = standingOrderData;
        if (amount <= 0 || amount === undefined || isNaN(amount)) {
            $(".display_transfer_amount").text("");
            return false;
        }
        $(".display_transfer_amount").text(
            formatToCurrency(parseFloat(amount))
        );
    });

    $("#beneficiary_frequency").on("change", function () {
        var standing_order = $("#beneficiary_frequency").val().split("~");
        // var standing_order_ = standing_order;
        standingOrderData.frequency = standing_order[0];
        var optionText = $("#beneficiary_frequency option:selected").text();
        $(".display_frequency_so").text(standing_order[1]);
    });

    $("#purpose").on("change", function () {
        standingOrderData.purpose = $("#purpose").val();
        $(".display_purpose").text(standingOrderData.purpose);
    });

    $("#next_button").on("click", function (e) {
        e.preventDefault();
        // $("#confirm_transfer_text").show();
        $(".display_purpose").text(standingOrderData.purpose);
        console.log(
            fromAccount.accountNumber,
            // fromAccount.mandate,
            toAccount.accountNumber,
            standingOrderData.amount,
            standingOrderData.startDate,
            standingOrderData.endDate,
            standingOrderData.frequency,
            standingOrderData.purpose
        );
        if (
            !fromAccount.accountNumber ||
            // fromAccount.mandate ||
            !toAccount.accountNumber ||
            !standingOrderData.amount ||
            !standingOrderData.startDate ||
            !standingOrderData.endDate ||
            !standingOrderData.frequency ||
            !standingOrderData.purpose
        ) {
            toaster("fields cannot be empty", "warning");
            return false;
        }
        const { startDate, endDate, amount } = standingOrderData;

        if (amount <= 0 || isNaN(amount)) {
            toaster("invalid transfer amount", "warning");
            return false;
        }
        if (parseFloat(amount) > parseFloat(fromAccount.balance)) {
            toaster("Insufficient account balance", "warning");
            return false;
        }
        if (startDate < thisDay) {
            toaster("Start date can't be less than today", "warning");
            return false;
        } else if (endDate < thisDay) {
            toaster("End date can't be less than today", "warning");
            return false;
        } else if (startDate > endDate) {
            toaster("Start date can't be greater than end date", "warning");
            return false;
        }
        standingOrderData.fromAccount = fromAccount.accountNumber;
        // standingOrderData.fromAccountName = fromAccount.name;
        standingOrderData.mandate = fromAccount.mandate;
        standingOrderData.toAccount = toAccount.accountNumber;
        standingOrderData.toAccountName = toAccount.name;
        standingOrderData.currency = fromAccount.currency;
        standingOrderData.bankCode = fromAccount.bankCode;
        // standingOrderData.bankCode = fromAccount.mandate;
        console.log(standingOrderData);
        validationsCompleted = true;

        $("#transaction_form").hide();
        $("#transaction_summary").show();
    });

    $("#confirm_transfer_button").on("click", function (e) {
        e.preventDefault();
        if (!validationsCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        confirmationCompleted = true;
        $("#centermodal").modal("show");
    });

    $("#transfer_pin").on("click", function (e) {
        e.preventDefault;
        if (!confirmationCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        standingOrderData.secPin = $("#user_pin").val();
        if (standingOrderData.secPin.length !== 4) {
            toaster("invalid pin", "warning", 3000);
            return false;
        }
        console.log("av");
        console.log(standingOrderData);
        $("#confirm_transfer_text").hide();
        $("#spinner").show();
        $("#spinner-text").show();
        postStandingOrder(
            "initiate-standing-order-request-api",
            standingOrderData
        );
        $("#user_pin").val("").text("");
        confirmationCompleted = false;
    });

    $("#back_button").on("click", function (e) {
        e.preventDefault();
        validationsCompleted = false;
        confirmationCompleted = false;
        $("#transaction_form").toggle();
        $("#transaction_summary").hide();
    });
});
