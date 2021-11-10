let beneficiaryDetails;
function getLocalBanks() {
    return $.ajax({
        type: "GET",
        url: "get-bank-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#select_bank").empty();
                $("#select_bank").append(
                    `<option selected disabled value=""> --- Select Bank ---</option>`
                );
                $.each(data, (i) => {
                    let { bankCode, bankDescription, bankSwiftCode } = data[i];
                    option = `<option value="${bankCode}" data-bank-swift-code="${bankSwiftCode}">${bankDescription}</option>`;
                    $("#select_bank").append(option);
                });
                $("#account_number").attr("disabled", false);
            } else {
                toaster(response.message);
            }
        },
    });
}

function getCountries() {
    return $.ajax({
        type: "GET",
        url: "get-countries-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#select_country").empty();
                $("#select_country").append(
                    `<option selected disabled value=""> --- Select Country ---</option>`
                );
                $.each(data, (i) => {
                    let { actualCode, codeType, description } = data[i];
                    option = `<option value="${codeType}"  data-country-code="${actualCode}">${description}</option>`;
                    $("#select_country").append(option);
                });
            } else {
                toaster(response.message);
            }
        },
    });
}

function getInternationalBanks(countryCode) {
    return $.ajax({
        type: "GET",
        url: "get-international-bank-list-api",
        data: {
            countryCode,
        },
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#select_bank").empty();
                $("#select_bank").append(
                    `<option selected disabled value=""> --- Select Bank ---</option>`
                );
                $.each(data, (i) => {
                    let { BICODE, BANK_DESC, COUNTRY } = data[i];
                    option = `<option value="${BICODE}" data-bank-country="${COUNTRY}" >${BANK_DESC}</option>`;
                    $("#select_bank").append(option);
                });
                $("#select_bank").attr("disabled", false);
                $("#account_number").attr("disabled", false);
            } else {
                toaster(response.message);
            }
        },
    });
}

function deleteBeneficiary(beneficiaryId) {
    $.ajax({
        type: "DELETE",
        url: "delete-transfer-beneficiary-api",
        datatype: "application/json",
        data: { beneficiaryId },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (res) => {
            if (res.responseCode === "000") {
                $("#edit_modal").modal("hide");
                beneficiaryDeleted();
            } else {
                toaster(res.message, "error");
            }
        },
        error: (err) => {
            toaster(err.statusText, "error");
        },
    });
}

//validate same bank account number
function getAccountDescription(accountNumber) {
    $.ajax({
        type: "POST",
        url: "get-account-description",
        datatype: "application/json",
        data: {
            accountNumber,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (res) => {
            if (res.responseCode === "000") {
                $("#account_name").val(res.data.accountDescription);
                $("#account_currency").val(res.data.accountCurrencyIso);
            } else {
                $("#account_name").val("");
                $("#account_currency").val("");
                toaster(res.message, "error");
            }
        },
        error: (err) => {
            $("#account_name").val("");
            toaster(err.statusText, "error");
        },
    });
}

//Adding Beneficiary
async function addBankBeneficiary(currentType) {
    await prepareBeneficiaryForm(currentType, "Add");
    $("#delete_btn").hide();
    $(".modal-footer").removeClass("justify-content-between");
}

async function prepareBeneficiaryForm(currentType, mode) {
    $("#edit_modal").attr("data-mode", mode);
    $("#edit_modal").attr("data-type", currentType);
    if (currentType === "SAB") {
        $("#beneficiary_form_header").addClass("bg-same-bank");
        $("#beneficiary_form_title").text(`${mode} Same Bank Beneficiary`);
        $("#account_number").on("keyup", () => {
            if ($("#account_number").val().length >= ACCOUNT_NUMBER_LENGTH) {
                getAccountDescription($("#account_number").val());
            }
        });

        $(".same-bank-form").show();
    } else if (currentType === "OTB") {
        $("#beneficiary_form_header").addClass("bg-other-bank");
        $("#beneficiary_form_title").text(`${mode} Local Bank Beneficiary`);
        $(".other-bank-form").show();
        $("#account_number").attr("disabled", true);
        await getLocalBanks();
    } else if (currentType === "INTB") {
        $("#beneficiary_form_header").addClass("bg-international-bank");
        $("#beneficiary_form_title").text(
            `${mode} International Bank Beneficiary`
        );
        await getCountries();
        $("#select_country").on("change", () => {
            getInternationalBanks($("#select_country").val());
        });
        $(".international-bank-form").show();
        $("#select_bank").attr("disabled", true);
        $("#account_number").attr("disabled", true);
    }
    $("#edit_modal").modal("show");
}

//editting beneficiary
async function editBankBeneficiary(data, type) {
    await prepareBeneficiaryForm(type, "Edit");
    if (data.BENEF_TYPE === "OTB") {
        $(".other-bank-form").show();
        $(`#select_bank option[value=${data.BANK_SWIFT_CODE}]`).prop(
            "selected",
            true
        );
    }
    if (data.BENEF_TYPE === "INT") {
        $(".international-bank-form").show();
    }

    $("#account_number").val(data.BEN_ACCOUNT).trigger("keyup");
    // $("#account_name").val(data.NICKNAME);
    $("#beneficiary_email").val(data.EMAIL);
    $("#beneficiary_address").val(data.ADDRESS_1);
    $("#beneficiary_name").val(data.NICKNAME);
    if (data.SEND_EMAIL && data.SEND_EMAIL.toUpperCase() !== "N") {
        $("#send_email_check").prop("checked", true);
    }
    beneficiaryDetails.beneficiaryId = data.BENE_ID;
    // prepopulate bene form
    $("#edit_modal").modal("show");
}

function initBeneficiaryForm() {
    let currentFs, nextFs, previousFs;
    beneficiaryDetails = {};
    $(".next").click(function () {
        currentFs = $(".current-fs");
        nextFs = currentFs.next();
        if (!validateFormInputs($(currentFs).attr("data-value"))) {
            return false;
        }
        if ($(".current-fs").html() === $(".last-fs").html()) {
            // const type = $("#edit_modal").attr("data-mode");
            saveBeneficiary(beneficiaryDetails);
            return false;
        }
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(nextFs)).addClass("active");
        //show the next fieldset
        nextFs.toggle(300, "linear");
        currentFs.toggle(300, "linear");
        currentFs.removeClass("current-fs");
        nextFs.addClass("current-fs");
        $(".action-button-previous").removeAttr("disabled");
        if ($(".current-fs").html() === $(".last-fs").html()) {
            $(".action-button").text("save", true);
        }
    });

    $(".previous").click(function () {
        currentFs = $(".current-fs");
        previousFs = currentFs.prev();
        //Remove class active
        $("#progressbar li")
            .eq($("fieldset").index(currentFs))
            .removeClass("active");
        currentFs.toggle(300, "linear");
        previousFs.toggle(300, "linear");
        currentFs.removeClass("current-fs");
        previousFs.addClass("current-fs");
        $(".action-button").text("next", true);
        if ($(".current-fs").html() === $(".first-fs").html()) {
            $(".action-button-previous").attr("disabled", true);
        }
    });

    $("#delete_btn").on("click", () => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                deleteBeneficiary(beneficiaryDetails.beneficiaryId);
            }
        });
    });
}

function validateFormInputs(whatToCheck) {
    const type = $("#edit_modal").attr("data-type");
    const mode = $("#edit_modal").attr("data-mode");
    let fail = false;
    if (whatToCheck === "account") {
        beneficiaryDetails.mode = mode.toUpperCase();
        beneficiaryDetails.type = type.toUpperCase();
        beneficiaryDetails.accountNumber = $("#account_number").val();
        beneficiaryDetails.bankName = $("#select_bank option:selected").text();
        beneficiaryDetails.bankCode = $("#select_bank").val();
        // beneficiaryDetails.bankSwiftCode = $("#select_bank").attr(
        //     "data-bank-swift-code"
        // );
        beneficiaryDetails.bankCountry = $("#select_country").val();
        if (
            !beneficiaryDetails.accountNumber ||
            beneficiaryDetails.accountNumber < ACCOUNT_NUMBER_LENGTH
        ) {
            fail = true;
        }
        if (type === "SAB") {
            beneficiaryDetails.bankName = "ROKEL COMMERCIAL BANK";
            beneficiaryDetails.accountName = $("#account_name").val();
            if (!beneficiaryDetails.accountName) {
                toaster("invalid account", "warning");
                return false;
            }
        } else {
            if (!beneficiaryDetails.bankCode || !beneficiaryDetails.bankName) {
                fail = true;
            }
        }
    }
    if (whatToCheck === "beneficiary") {
        beneficiaryDetails.beneficiaryName = $("#beneficiary_name").val();
        beneficiaryDetails.beneficiaryEmail = $("#beneficiary_email").val();
        beneficiaryDetails.beneficiaryAddress = $("#beneficiary_address").val();
        if ($("#send_email_check").prop("checked")) {
            beneficiaryDetails.notify = "Y";
        }

        if (
            !beneficiaryDetails.beneficiaryName ||
            !beneficiaryDetails.beneficiaryEmail
        ) {
            fail = true;
        }
        if (!validateEmail(beneficiaryDetails.beneficiaryEmail)) {
            toaster("invalid email", "warning");
            return false;
        }

        if (type !== "SAB" && !beneficiaryDetails.beneficiaryAddress) {
            fail = true;
        }
    }

    if (fail) {
        toaster("all fields required", "warning");
        return false;
    }
    return true;
}

$(document).ready(function () {
    initialModalHtml = $("#edit_modal").html();
    initBeneficiaryForm();
    $("#edit_modal").on("hidden.bs.modal", (e) => {
        $("#edit_modal").html(initialModalHtml);
        initBeneficiaryForm();
    });
});
