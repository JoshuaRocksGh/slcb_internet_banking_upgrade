// let forexRate = [];

// function makeTransfer(data) {
//     $.ajax({
//         type: "POST",
//         url: "local-bank-transfer-api",
//         datatype: "application/json",
//         data: data,
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             console.log(response);
//             if (response.responseCode == "000") {
//                 $("#related_information_display").removeClass(
//                     "d-none d-sm-block"
//                 );
//                 transactionSuccessToaster(response.message);
//                 $(".receipt").show();
//                 $(".form_process").hide();
//                 $("#confirm_modal_button").hide();
//                 $("#spinner").hide();
//                 $("#spinner-text").hide();
//                 $("#back_button").hide();
//                 $("#print_receipt").show();
//                 $(".rtgs_card_right").hide();
//                 $(".success_gif").show();
//             } else {
//                 toaster(response.message, "error", 3000);
//                 $(".receipt").hide();
//                 $("#confirm_transfer").show();
//                 $("#confirm_modal_button").prop("disabled", false);
//                 $("#spinner").hide();
//                 $("#spinner-text").hide();
//                 $("#back_button").show();
//                 $("#print_receipt").hide();
//                 $("#related_information_display").show();
//                 $(".success_gif").hide();
//             }
//         },
//     });
// }

// function getCorrectFxRate() {
//     $.ajax({
//         type: "GET",
//         url: "get-correct-fx-rate-api",
//         datatype: "application/json",
//         success: function (response) {
//             if (response.responseCode == "000") {
//                 forexRate = response.data;
//             } else {
//             }
//         },
//         error: function (xhr, status, error) {
//             setTimeout(function () {
//                 getCorrectFxRate();
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

function getLocalbanksList() {
    $.ajax({
        type: "GET",
        url: "get-bank-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            $.each(data, function (index) {
                $("#onetime_beneficiary_bank_name").append(
                    $("<option>", {
                        value:
                            data[index].bankCode +
                            "~" +
                            data[index].bankDescription +
                            "~" +
                            data[index].bankSwiftCode,
                    }).text(data[index].bankDescription)
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getLocalbanksList();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

// var c = {};

// function getCurrency() {
//     $.ajax({
//         type: "GET",
//         url: "get-currency-list-api",
//         datatype: "application/json",
//         success: function (response) {
//             let data = response.data;

//             $.each(data, function (index) {
//                 if (data[index].isoCode === "SLL") {
//                     $(".select_conversion_currency").append(
//                         $("<option selected>", {
//                             value: data[index].isoCode,
//                         }).text(data[index].isoCode)
//                     );
//                 } else {
//                     $(".select_conversion_currency").append(
//                         $("<option>", {
//                             value: data[index].isoCode,
//                         }).text(data[index].isoCode)
//                     );
//                 }
//             });
//         },
//         error: function (xhr, status, error) {
//             setTimeout(function () {
//                 getCurrency();
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

function transactionFee(fee_account, fee_amount, transfer_type) {
    $.ajax({
        type: "POST",
        url: "get-transaction-fees",
        datatype: "application/json",
        data: {
            accountNumber: fee_account,
            amount: fee_amount,
            transfer_type: transfer_type,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            let fee = response.data;
            if (fee != "0") {
                $(".terms_and_conditions_fee").show();
                $(".terms_and_conditions").hide();
                $(".fee_amount").text(response.data);
            } else {
                $(".terms_and_conditions").show();
                $(".terms_and_conditions_fee").hide();
            }
        },
    });
}

// function getExpenseTypes() {
//     let name = $("#category_").val();

//     $.ajax({
//         type: "GET",
//         url: "get-expenses",
//         datatype: "application/json",
//         success: function (response) {
//             let data = response.data;
//             let exType = response.data.expenseName;
//             $.each(data, function (index) {
//                 $("#category").append(
//                     $("<option>", {
//                         value:
//                             data[index].expenseCode +
//                             "~" +
//                             data[index].expenseName,
//                     }).text(data[index].expenseName)
//                 );
//                 $("#onetime_category").append(
//                     $("<option>", {
//                         value:
//                             data[index].expenseCode +
//                             "~" +
//                             data[index].expenseName,
//                     }).text(data[index].expenseName)
//                 );
//             });
//         },
//         error: function (xhr, status, error) {
//             setTimeout(function () {
//                 getExpenseTypes();
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

function getBeneficiaries() {
    $.ajax({
        type: "GET",
        url: "get-transfer-beneficiary-api?beneType=OTB",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;

            if (!response.data) {
            } else {
                if (response.data.length > 0) {
                    $(".yes_beneficiary").show();
                    $(".no_beneficiary").hide();

                    $.each(data, function (index) {
                        //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                        $("#to_account").append(
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
                                    data[index].EMAIL +
                                    "~" +
                                    JSON.stringify(data[index]),
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
    getLocalbanksList();
    getCurrency();
    getExpenseTypes();
    getCorrectFxRate();
    let fromAccount = new Object();
    let transactionDetails = new Object();
    let onetimeTransactionDetails = new Object();
    let confirmationCompleted = false;
    let validationCompleted = false;
    let transferInfo = new Object();
    let isOnetimeTransaction = false;

    function updateTransactionType() {
        if ($("#onetime_toggle").is(":checked")) {
            isOnetimeTransaction = true;
        } else {
            isOnetimeTransaction = false;
        }
    }

    function handleConversion(toCur) {
        let amount;
        let displayMidrate = ".display_midrate";
        let displayConverted = ".display_converted_amount";
        let displayRate;
        let converted;

        if (isOnetimeTransaction) {
            amount = onetimeTransactionDetails.amount;
            displayRate = "#onetime_convertor_rate";
            converted = "#onetime_converted_amount";
        } else {
            amount = transactionDetails.amount;
            displayRate = "#convertor_rate";
            converted = "#converted_amount";
        }
        if (!fromAccount.currency || !amount || isNaN(amount) || amount <= 0) {
            $(".display_midrate").text("");
            $(".display_converted_amount").text("");
            $(converted).val("");
            return;
        }
        let conversionData = currencyConvertor(
            forexRate,
            amount,
            fromAccount.currency,
            toCur
        );
        let { convertedAmount, midrate, currencyPair } = conversionData;
        $(displayMidrate).text(`${currencyPair} => ${midrate}`);
        $(displayRate).val(midrate);
        $(converted).val(convertedAmount);
        $(displayConverted).text(convertedAmount);
    }

    $("#onetime_toggle").click(function () {
        updateTransactionType();
        $(".display_to_account_name").text("");
        $(".display_to_bank_name").text("");
        $(".display_to_account_no").text("");
        $(".display_to_account_currency").text("");
        $(".display_to_account_address").text("");

        if (isOnetimeTransaction) {
            $(".bene_details").hide();
            $("#onetime_beneficiary_form").show(500);
            $("#saved_benefciary_form").hide();
            $(".dtac").hide();
            $("#onetome_to_account").trigger("change");
            $("#onetime_amount").trigger("change");
        } else {
            $(".dtac").show();
            $(".bene_details").show(500);
            $("#saved_benefciary_form").show(500);
            $("#onetime_beneficiary_form").hide();
            $("#to_account").trigger("change");
            $("#amount").trigger("change");
        }
    });

    $("#from_account").change(function () {
        fromAccount.info = $(this).val();
        if (!fromAccount.info) {
            $(".display_from_account_name").text("");
            $(".display_from_account_no").text("");
            $(".display_from_account_currency").text("");
            $(".fee_currency").text("");
            $(".display_currency").text("");
            $(".select_currency").val("");
            return false;
        }
        if (fromAccount.info === transactionDetails.info) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            fromAccount.info = "";
            return false;
        }
        let accountDetails = fromAccount.info.split("~");
        fromAccount.name = accountDetails[1].trim();
        fromAccount.accountNumber = accountDetails[2].trim();
        fromAccount.currency = accountDetails[3].trim();
        fromAccount.balance = parseFloat(accountDetails[4].trim());
        // set summary values for display
        const { name, accountNumber, currency, balance } = fromAccount;
        if (
            isOnetimeTransaction &&
            accountNumber === onetimeTransactionDetails.accountNumber
        ) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            fromAccount.info = "";
            return false;
        }
        if (currency !== "SLL") {
            $(".select_conversion_currency").val("SLL");
            $(".select_conversion_currency").prop("disabled", true);
        } else {
            $(".select_conversion_currency").prop("disabled", false);
        }
        $("#select_conversion_currency").val(currency);
        $(".display_from_account_name").text(name);
        $(".display_from_account_no").text(accountNumber);
        $(".display_from_account_amount").text(balance);
        $(".display_from_account_currency").text(currency);
        $(".display_currency").text(currency);
        $(".select_currency").val(currency);
        $(".fee_currency").text(currency);
    });

    $("#to_account").change(function () {
        transactionDetails.info = $(this).val();
        if (!transactionDetails.info) {
            $(".display_to_account_name").text("");
            $(".display_to_bank_name").text("");
            $(".display_to_account_no").text("");
            $(".display_to_account_address").text("");
            $(".display_to_account_currency").text("");
            $("#beneficiary_bank_name").val("");
            $("#beneficiary_account_number").val("");
            $("#beneficiary_account_name").val("");
            $("#beneficiary_email").val("");
            $("#beneficiary_address").val();

            return false;
        }
        if (fromAccount.info === transactionDetails.info) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            transactionDetails.info = "";
            return false;
        }
        let accountDetails = $(this).val().split("~");
        transactionDetails.swiftCode = accountDetails[0].split("||")[1];
        transactionDetails.name = accountDetails[1];
        transactionDetails.bank = accountDetails[0].split("||")[0];
        transactionDetails.accountNumber = accountDetails[2];
        transactionDetails.currency = accountDetails[3];
        transactionDetails.address = accountDetails[4];
        transactionDetails.email = accountDetails[6];
        const { name, bank, accountNumber, currency, address, email } =
            transactionDetails;
        if (
            isOnetimeTransaction &&
            accountNumber === fromAccount.accountNumber
        ) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            transactionDetails.info = "";
            return false;
        }
        $(".display_to_account_name").text(name);
        $(".display_to_bank_name").text(bank);
        $(".display_to_account_no").text(accountNumber);
        $(".display_to_account_currency").text(currency);
        $("#beneficiary_bank_name").val(bank);
        $("#beneficiary_account_number").val(accountNumber);
        $("#beneficiary_account_name").val(name);
        $("#beneficiary_email").val(email);
        $(".display_to_account_address").text(address);
        $("#beneficiary_address").val(address);
        $(".beneficiary_details").show();
    });
    $("#conversion_currency").on("change", () => {
        if (!transactionDetails.amount) {
            // toaster("Enter valid transfer amount", "warning");
            return false;
        }
        handleConversion($("#conversion_currency").val());
    });

    $("#amount").keyup(function () {
        if (!fromAccount.info || !transactionDetails.info) {
            toaster("Please select source and destination accounts", "warning");
            $(this).val("");
            transactionDetails.amount = "";
            return false;
        }
        if (!transactionDetails.mode) {
            toaster("select transfer mode", "warning");
            $(this).val("");
            transactionDetails.amount = "";
            return false;
        }
        transactionDetails.amount = parseFloat($("#amount").val());
        const { amount } = transactionDetails;
        if (amount <= 0 || !amount) {
            toaster("invalid amount", "warning");
            $(this).val("");
            transactionDetails.amount = "";
        }
        if (isNaN(amount)) {
            $(".display_transfer_amount").text("");
            transactionDetails.amount = "";
        } else {
            $(".display_transfer_amount").text(amount);
        }
        // transactionFee(
        //     fromAccount.accountNumber,
        //     amount,
        //     transactionDetails.mode
        // );
        handleConversion($("#conversion_currency").val());
        $(".display_transfer_amount").text(amount);
    });

    $("#transfer_mode").change(function () {
        transactionDetails.mode = $(this).val();
        let { mode } = transactionDetails;
        if ("ACH" == mode) {
            $(".transfer_mode_note").show();
            $("#ach_transfer_mode").show();
            $("#rtgs_transfer_mode").hide();
            $("#instant_transfer_mode").hide();
        } else if ("RTGS" == mode) {
            $(".transfer_mode_note").show();
            $("#rtgs_transfer_mode").show();
            $("#ach_transfer_mode").hide();
            $("#instant_transfer_mode").hide();
        } else if ("INSTANT" == mode) {
            $(".transfer_mode_note").show();
            $("#instant_transfer_mode").show();
            $("#rtgs_transfer_mode").hide();
            $("#ach_transfer_mode").hide();
        }
    });

    $("#purpose").on("keyup", function () {
        transactionDetails.purpose = $(this).val();
        $("#display_purpose").text(transactionDetails.purpose);
    });

    $("#category").on("change", function () {
        if ($(this).val() === "others") {
            transactionDetails.category === $(this).val();
        } else {
            transactionDetails.category = $(this).val().split("~")[1];
        }
        $("#display_category").text(transactionDetails.category);
    });

    //==================== onetime ================

    $("#onetime_beneficiary_bank_name").change(function () {
        onetimeTransactionDetails.bank = $(this).val().split("~");
        $(".display_to_bank_name").text(onetimeTransactionDetails.bank[1]);
    });

    $("#onetime_beneficiary_account_name").keyup(function () {
        onetimeTransactionDetails.name = $(this).val();
        $(".display_to_account_name").text(onetimeTransactionDetails.name);
    });

    $("#onetime_beneficiary_account_number").keyup(function () {
        onetimeTransactionDetails.accountNumber = $(this).val();
        const { accountNumber } = onetimeTransactionDetails;
        // if (accountNumber === fromAccount.accountNumber) {
        //     toaster("Cannot send to same account", "warning");
        //     $(this).val("");
        //     onetimeTransactionDetails.accountNumber = "";
        // }
        $(".display_to_account_no").text(accountNumber);
    });
    $("#onetime_beneficiary_account_address").keyup(function () {
        $(".display_to_account_address").text($(this).val());
        onetimeTransactionDetails.address = $(this).val();
    });
    $("#onetime_beneficiary_account_email").keyup(function () {
        onetimeTransactionDetails.email = $(this).val();
    });

    $("#onetime_transfer_mode").change(function () {
        onetimeTransactionDetails.mode = $(this).val();
        let { mode } = onetimeTransactionDetails;

        if ("ACH" == mode) {
            $(".onetime_transfer_mode_note").show();
            $("#onetime_ach_transfer_mode").show();
            $("#onetime_rtgs_transfer_mode").hide();
            $("#onetime_instant_transfer_mode").hide();
        } else if ("RTGS" == mode) {
            $(".onetime_transfer_mode_note").show();
            $("#onetime_rtgs_transfer_mode").show();
            $("#onetime_ach_transfer_mode").hide();
            $("#onetime_instant_transfer_mode").hide();
        } else if ("INSTANT" == mode) {
            $(".onetime_transfer_mode_note").show();
            $("#onetime_instant_transfer_mode").show();
            $("#onetime_rtgs_transfer_mode").hide();
            $("#onetime_ach_transfer_mode").hide();
        }
    });

    $("#onetime_amount").keyup(function () {
        if (!fromAccount.info) {
            toaster("select source account", "warning");
            $(this).val("");
            onetimeTransactionDetails.amount = "";
            return false;
        }
        if (!onetimeTransactionDetails.mode) {
            toaster("select transfer mode", "warning");
            $(this).val("");
            onetimeTransactionDetails.amount = "";
            return false;
        }
        onetimeTransactionDetails.amount = formatToCurrency(
            $("#onetime_amount").val()
        );
        const { amount } = onetimeTransactionDetails;

        if (amount <= 0 || !amount) {
            toaster("invalid amount", "warning");
            $(this).val("");
            onetimeTransactionDetails.amount = "";
        }
        if (isNaN(amount) || !amount) {
            $(".display_transfer_amount").text("");
            onetimeTransactionDetails.amount = "";
        } else {
            $(".display_transfer_amount").text(amount);
        }
        $(".display_transfer_amount").text(amount);
    });
    $("#onetime_purpose").on("keyup", function () {
        onetimeTransactionDetails.purpose = $(this).val();
        $("#display_purpose").text(onetimeTransactionDetails.purpose);
    });

    $("#onetime_category").on("change", function () {
        if ($(this).val() === "others") {
            onetimeTransactionDetails.category === $(this).val();
        } else {
            onetimeTransactionDetails.category = $(this).val().split("~")[1];
        }
        $("#display_category").text(onetimeTransactionDetails.category);
    });

    // NEXT BUTTON CLICK
    $("#next_button").on("click", function () {
        // console.log(fromAccount);
        // console.log(transactionDetails);
        // console.log("=====================");
        // console.log(onetimeTransactionDetails);
        // $("#transaction_summary").show();
        // //enable extras in summary and receipt
        // $(".display_to_bank_name").show();
        // $("#transaction_form").hide();
        if (isOnetimeTransaction) {
            onetimeTransactionDetails.email = $(
                "#onetime_beneficiary_email"
            ).val();
            if (!onetimeTransactionDetails.email) {
                toaster("Please enter valid beneficiary email", "warning");
                return false;
            }
            let { purpose, category, amount, mode } = onetimeTransactionDetails;
            transferInfo = {
                purpose,
                category,
                amount,
                mode,
            };
            transferInfo.beneficiaryEmail = onetimeTransactionDetails.email;
            transferInfo.beneficiaryName = onetimeTransactionDetails.name;
            transferInfo.beneficiaryAccount =
                onetimeTransactionDetails.accountNumber;
            transferInfo.beneficiaryAddress = onetimeTransactionDetails.address;
            transferInfo.bankName = onetimeTransactionDetails.bank;
        } else {
            let { purpose, category, amount, mode } = transactionDetails;
            transferInfo = {
                purpose,
                category,
                amount,
                mode,
            };
            transferInfo.beneficiaryEmail = transactionDetails.email;
            transferInfo.beneficiaryName = transactionDetails.name;
            transferInfo.beneficiaryAccount = transactionDetails.accountNumber;
            transferInfo.beneficiaryAddress = transactionDetails.address;
            transferInfo.bankName = transactionDetails.bank;
        }
        if (transferInfo.amount <= 0 || isNaN(transferInfo.amount)) {
            toaster("invalid transfer amount", "warning");
            return false;
        }
        if (parseFloat(transferInfo.amount) > parseFloat(fromAccount.balance)) {
            toaster("Insufficient account balance", "warning");
            return false;
        }
        if (
            !fromAccount.info ||
            !transferInfo.beneficiaryAccount ||
            !transferInfo.amount ||
            !transferInfo.category ||
            !transferInfo.purpose ||
            !transferInfo.mode ||
            !transferInfo.beneficiaryAddress ||
            !transferInfo.bankName
        ) {
            toaster("Field must not be empty", "warning");
            return false;
        }
        transferInfo.fromAccount = fromAccount.accountNumber;
        transferInfo.currency = fromAccount.currency;
        validationsCompleted = true;
        $("#transaction_form").hide();
        $("#transaction_summary").show();
    });

    $("#confirm_transfer_button").on("click", function (e) {
        console.log(transferInfo);
        e.preventDefault();
        if (!$("#terms_and_conditions").is(":checked")) {
            toaster("Accept Terms & Conditions to continue", "warning", 3000);
            return false;
        }
        if (!validationsCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        $("#from_account_receipt").text(transferInfo.fromAccount);
        $("#to_account_receipt").text(transferInfo.beneficiaryAccount);
        $("#amount_receipt").text(parseFloat(transferInfo.amount));
        $("#category_receipt").text(transferInfo.category);
        $("#purpose_receipt").text(transferInfo.purpose);
        $(".receipt_currency").text(transferInfo.currency);
        confirmationCompleted = true;
        $("#centermodal").modal("show");
    });

    $("#transfer_pin").on("click", function (e) {
        e.preventDefault;
        if (!confirmationCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        transferInfo.secPin = $("#user_pin").val();
        if (transferInfo.secPin.length !== 4) {
            toaster("invalid pin", "warning");
            return false;
        }
        console.log(transferInfo);
        makeTransfer(transferInfo);
        $("#user_pin").val("").text("");
        confirmationCompleted = false;
    });

    $("#back_button").click(function (e) {
        e.preventDefault();
        validationsCompleted = false;
        confirmationCompleted = false;
        $("#transaction_form").show();
        $("#transaction_summary").hide();
    });
});
