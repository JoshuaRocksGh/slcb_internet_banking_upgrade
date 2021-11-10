let forexRate = [];

function makeTransfer(url, data) {
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
                $("#related_information_display").removeClass(
                    "d-none d-sm-block"
                );
                transactionSuccessToaster(response.message, "success", 3000);
                $(".receipt").show();
                $(".form_process").hide();
                $("#confirm_modal_button").hide();
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#back_button").hide();
                $("#print_receipt").show();
                $(".rtgs_card_right").hide();
                $(".success_gif").show();
            } else {
                toaster(response.message, "error", 3000);
                $(".receipt").hide();
                $("#confirm_transfer").show();
                $("#confirm_modal_button").prop("disabled", false);
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#back_button").show();
                $("#print_receipt").hide();
                $("#related_information_display").show();
                $(".success_gif").hide();
            }
        },
    });
}
function getCorrectFxRate() {
    $.ajax({
        type: "GET",
        url: "get-correct-fx-rate-api",
        datatype: "application/json",
        success: function (response) {
            if (response.responseCode == "000") {
                forexRate = response.data;
            } else {
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getCorrectFxRate();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getCurrency() {
    $.ajax({
        type: "GET",
        url: "get-currency-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;

            $.each(data, function (index) {
                if (data[index].isoCode === "SLL") {
                    $(".select_conversion_currency").append(
                        $("<option selected>", {
                            value: data[index].isoCode,
                        }).text(data[index].isoCode)
                    );
                } else {
                    $(".select_conversion_currency").append(
                        $("<option>", {
                            value: data[index].isoCode,
                        }).text(data[index].isoCode)
                    );
                }
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getCurrency();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getToAccount() {
    $.ajax({
        type: "GET",
        url: "get-transfer-beneficiary-api?beneType=SAB",
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            let data = response.data;
            // {{-- console.log(data); --}}
            if (response.data.length > 0) {
                // {{-- $('.yes_beneficiary').show() --}}
                $(".no_beneficiary").hide();
                $.each(data, function (index) {
                    //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                    $("#to_account").append(
                        $("<option>", {
                            value:
                                data[index].BENEF_TYPE +
                                "~" +
                                data[index].NICKNAME +
                                "~" +
                                data[index].BEN_ACCOUNT +
                                "~" +
                                data[index].BEN_ACCOUNT_CURRENCY +
                                "~" +
                                data[index].EMAIL,
                        }).text(
                            data[index].BENEF_TYPE +
                                "~" +
                                data[index].BEN_ACCOUNT +
                                "~" +
                                data[index].NICKNAME +
                                "~" +
                                data[index].BEN_ACCOUNT_CURRENCY
                        )
                    );
                });
            } else {
                $(".no_beneficiary").show();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getToAccount();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getExpenseTypes() {
    $.ajax({
        type: "GET",
        url: "get-expenses",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            $.each(data, function (index) {
                let name = data[index].expenseName;
                let code = data[index].expenseCode;

                $("#category").append(
                    $("<option>", {
                        value: `${code}~${name}`,
                    }).text(name)
                );
                $("#onetime_category").append(
                    $("<option>", {
                        value: `${code}~${name}`,
                    }).text(name)
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getExpenseTypes();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getAccountDescription(account) {
    $.ajax({
        type: "POST",
        url: "get-account-description",
        datatype: "application/json",
        data: {
            authToken: "string",
            accountNumber: account.accountNumber,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (response) {
            console.log(response);
            if (response.responseCode == "000") {
                details = response.data;
                account.name = details.accountDescription;
                account.currency = details.accountCurrencyIso;
                console.log(account);
                handleToAccount(account);
            } else {
                toaster(response.message, "warning");
                account.name = "";
                account.currency = "";
                handleToAccount(account);
            }
        },
    });
}

function handleToAccount(account) {
    let { name, currency, accountNumber } = account;
    $("#onetime_beneficiary_name").val(name);
    $(".display_to_account_name").text(name);
    $(".display_to_account_currency").text(currency);
    if (!name) {
        $(".display_to_account_no").text(accountNumber);
    } else {
        $(".display_to_account_no").text("");
    }
}

$(function () {
    // getFromAccount();
    getToAccount();
    getExpenseTypes();
    getCurrency();
    getCorrectFxRate();
    let toAccount = new Object();
    let onetimeToAccount = new Object();
    let fromAccount = new Object();
    let transactionType;
    let transactionDetails = new Object();
    let onetimeTransactionDetails = new Object();
    let confirmationCompleted = false;
    let validationsCompleted = false;
    let transferInfo = new Object();
    function updateTransactionType() {
        if ($("#onetime_toggle").is(":checked")) {
            transactionType = "onetime";
        } else {
            transactionType = "beneficiary";
        }
    }
    updateTransactionType();

    function handleConversion(toCur) {
        let amount;
        let displayMidrate = ".display_midrate";
        let displayConverted = ".display_converted_amount";
        let displayRate;
        let converted;

        if (transactionType === "beneficiary") {
            amount = transactionDetails.amount;
            displayRate = "#convertor_rate_";
            converted = "#converted_amount";
        } else if (transactionType === "onetime") {
            console.log("here");
            amount = onetimeTransactionDetails.amount;
            displayRate = "#onetime_convertor_rate";
            converted = "#onetime_converted_amount";
        }
        console.log(amount);
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
        console.log(conversionData);
        let { convertedAmount, midrate, currencyPair } = conversionData;
        $(displayMidrate).text(`${currencyPair} => ${midrate}`);
        $(displayRate).val(midrate);
        $(converted).val(convertedAmount);
        $(displayConverted).text(convertedAmount);
    }

    $("#conversion_currency").on("change", () => {
        if (!transactionDetails.amount) {
            toaster("Enter valid transfer amount", "warning");
            return false;
        }
        handleConversion($("#conversion_currency").val());
    });

    $("#onetime_toggle").on("click", function () {
        updateTransactionType();
        $(".display_to_account_name").text("");
        $(".display_to_account_no").text("");
        $(".display_to_account_currency").text("");
        $(".display_midrate").text("");
        $(".display_converted_amount").text("");
        $(".display_amount").text("");

        if (transactionType === "beneficiary") {
            $("#onetime_beneficiary_form").hide(300);
            $("#saved_beneficiary_form").show(300);
            $(".badge").hide(300);
            $(".select_beneficiary").show();
            $("#to_account").trigger("change");
            $("#amount").trigger("change");
        }
        if (transactionType === "onetime") {
            $("#amount").val("");
            $("#onetime_beneficiary_form").show();
            $("#saved_beneficiary_form").hide(300);
            $(".select_beneficiary").hide(300);
            $(".badge").show(300);
            $("#onetome_to_account").trigger("change");
            $("#onetime_amount").trigger("change");
        }
    });

    // {{-- Event on From Account field --}}
    $("#from_account").on("change", function () {
        fromAccount.info = $(this).val();
        if (!fromAccount.info) {
            $(".display_from_account_name").text("");
            $(".display_from_account_no").text("");
            $(".display_from_account_currency").text("");
            $(".display_transfer_currency").text("");
            return false;
        }
        if (fromAccount.info === toAccount.info) {
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
            transactionType === "onetime" &&
            accountNumber === onetimeToAccount.accountNumber
        ) {
            toaster("can not transfer to same account", "warning");
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
        $(".display_from_account_name").text(name);
        $(".display_from_account_no").text(accountNumber);
        $(".display_from_account_currency").text(currency);
        $(".display_transfer_currency").text(currency);

        $(".account_currency").val(currency);
        $(".conversion_currency option").each(function () {
            if ($(this).val() === currency) {
                $(this).prop("selected", true);
            } else {
            }
        });

        $(".display_currency").text(currency); // set summary currency
        $(".display_from_account_amount").text(
            formatToCurrency(parseFloat(balance))
        );
        $(".from_account_display_info").show();
    });

    $("#to_account").on("change", function () {
        toAccount.info = $(this).val();
        if (!toAccount.info) {
            $(".to_account_display_info").hide();
            $(".display_to_account_name").text("");
            $(".display_to_account_no").text("");
            $(".display_to_account_currency").text("");
            return false;
        }
        if (toAccount.info === fromAccount.info) {
            toaster("can not transfer to same account", "warning", 3000);
            $(this).val("");
            toAccount.info = "";
            return false;
        }
        let accountDetails = toAccount.info.split("~");
        toAccount.name = accountDetails[1].trim();
        toAccount.accountNumber = accountDetails[2].trim();
        toAccount.currency = accountDetails[3].trim();
        toAccount.email = accountDetails[4].trim();

        // set summary values for display
        const { name, accountNumber, currency, email } = toAccount;

        // set summary values for display
        $(".display_to_account_name").text(name);
        $(".display_to_account_no").text(accountNumber);
        $(".display_to_account_currency").text(currency);
        $("#saved_beneficiary_email").val(email);
        $("#saved_beneficiary_account_number").val(accountNumber);
        $("#saved_beneficiary_name").val(name);

        $(".to_account_display_info").show();

        // alert(to_account_info[0]);
    });

    $("#amount").on("keyup", function () {
        if (!fromAccount.info || !toAccount.info) {
            toaster("Please select source and destination accounts", "warning");
            $(this).val("");
            transactionDetails.amount = "";
            return false;
        }
        transactionDetails.amount = parseFloat($(this).val()).toFixed(2);
        const { amount } = transactionDetails;

        if (amount <= 0 || amount === undefined) {
            toaster("invalid amount", "warning");
            $(this).val("");
        }
        if (isNaN(amount)) {
            $(".display_amount").text("");
            // transactionDetails.account = "";
        } else {
            $(".display_amount").text(amount);
        }

        handleConversion($("#conversion_currency").val());
    });

    $("#category").on("change", function () {
        if ($(this).val() === "others") {
            transactionDetails.category === $(this).val();
        } else {
            transactionDetails.category = $(this).val().split("~")[1];
        }
        $("#display_category").text(transactionDetails.category);
    });

    $("#purpose").on("keyup", function () {
        transactionDetails.purpose = $(this).val();
        $("#display_purpose").text(transactionDetails.purpose);
    });

    $("#onetime_amount").on("keyup", function () {
        if (!fromAccount.info) {
            toaster("Please select source account", "warning");
            $(this).val("");
            onetimeToAccount.amount = "";
            return false;
        }
        onetimeTransactionDetails.amount = parseFloat($(this).val()).toFixed(2);
        const { amount } = onetimeTransactionDetails;

        if (amount <= 0 || amount === undefined) {
            toaster("invalid amount", "warning");
            $(this).val("");
        }

        if (isNaN(amount)) {
            $(".display_amount").text("");
        } else {
            $(".display_amount").text(amount);
        }

        handleConversion($("#onetime_conversion_currency").val());
    });

    //category
    $("#onetime_category").on("change", function () {
        if ($(this).val() === "others") {
            onetimeTransactionDetails.category === $(this).val();
        } else {
            onetimeTransactionDetails.category = $(this).val().split("~")[1];
        }
        $("#display_category").text(onetimeTransactionDetails.category);
    });

    $("#onetime_account_number").on("keyup", function () {
        if (onetimeToAccount.accountNumber === $(this).val()) {
            return false;
        }
        onetimeToAccount.accountNumber = "";
        if ($(this).val() === fromAccount.accountNumber) {
            toaster("Cannot send to same account", "warning");
            return false;
        }
        onetimeToAccount.accountNumber = $(this).val();
        if (onetimeToAccount.accountNumber.length > 17) {
            getAccountDescription(onetimeToAccount);
        }
    });

    $("#onetime_purpose").on("keyup", function () {
        onetimeTransactionDetails.purpose = $(this).val();
        $("#display_purpose").text(onetimeTransactionDetails.purpose);
    });

    $("#onetime_beneficiary_email").on("keyup", function () {
        onetimeToAccount.email = $(this).val();
    });

    // NEXT BUTTON CLICK
    $("#next_button").on("click", function () {
        if (transactionType === "onetime") {
            onetimeToAccount.name = $("#onetime_beneficiary_name");
            onetimeToAccount.email = $("#onetime_beneficiary_email").val();
            if (!onetimeToAccount.email) {
                toaster("Please enter valid beneficiary email", "warning");
                return false;
            }
            let { purpose, category, amount } = onetimeTransactionDetails;
            transferInfo = {
                purpose,
                category,
                amount,
            };
            transferInfo.beneficiaryEmail = onetimeToAccount.email;
            transferInfo.beneficiaryName = onetimeToAccount.name;
            transferInfo.beneficiaryAccount = onetimeToAccount.accountNumber;
        } else if (transactionType === "beneficiary") {
            let { purpose, category, amount } = transactionDetails;
            transferInfo = {
                purpose,
                category,
                amount,
            };
            transferInfo.beneficiaryEmail = toAccount.email;
            transferInfo.beneficiaryName = toAccount.name;
            transferInfo.beneficiaryAccount = toAccount.accountNumber;
        } else {
            somethingWentWrongHandler();
        }

        console.log(transferInfo);
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
            !transferInfo.purpose
        ) {
            toaster("Field must not be empty", "warning");
            return false;
        }

        transferInfo.fromAccount = fromAccount.accountNumber;
        transferInfo.currency = fromAccount.currency;
        console.log(transferInfo);
        validationsCompleted = true;
        $("#transaction_form").hide();
        $("#transaction_summary").show();
    });

    $("#confirm_transfer_button").on("click", function (e) {
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
            toaster("invalid pin", "warning", 3000);
            return false;
        }
        console.log("av");
        console.log(transferInfo);
        makeTransfer("transfer-to-beneficiary-api", transferInfo);
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
