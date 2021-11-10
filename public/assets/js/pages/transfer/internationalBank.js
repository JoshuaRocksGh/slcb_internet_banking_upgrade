function formatToCurrency(amount) {
    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
}

function from_account() {
    $.ajax({
        type: "GET",
        url: "get-my-account",
        datatype: "application/json",
        success: function (response) {
            // {{-- console.log(response.data); --}}
            let data = response.data;
            $.each(data, function (index) {
                $("#from_account").append(
                    $("<option>", {
                        value:
                            data[index].accountType +
                            "~" +
                            data[index].accountDesc +
                            "~" +
                            data[index].accountNumber +
                            "~" +
                            data[index].currency +
                            "~" +
                            data[index].availableBalance,
                    }).text(
                        data[index].accountType +
                            "" +
                            " - " +
                            "" +
                            data[index].accountNumber +
                            "" +
                            " - " +
                            "" +
                            data[index].currency +
                            "" +
                            " - " +
                            "" +
                            formatToCurrency(
                                Number(data[index].availableBalance)
                            )
                    )
                );
                //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));
            });
        },
    });
}

function get_benerficiary() {
    $.ajax({
        type: "GET",
        url: "get-transfer-beneficiary-api?beneType=INTB",
        datatype: "application/json",
        success: function (response) {
            // {{-- console.log(response.data); --}}
            let data = response.data;

            if (!response.data) {
            } else {
                if (response.data.length > 0) {
                    $(".yes_beneficiary").show();
                    $(".no_beneficiary").hide();

                    $.each(data, function (index) {
                        $("#to_account").append(
                            $("<option>", {
                                value:
                                    data[index].BANK_NAME +
                                    "~" +
                                    data[index].BANK_COUNTRY.toUpperCase() +
                                    "~" +
                                    data[index].BEN_ACCOUNT +
                                    "~" +
                                    data[index].BANK_SWIFT_CODE +
                                    "~" +
                                    data[index].NICKNAME +
                                    "~" +
                                    data[index].ADDRESS_1 +
                                    "~" +
                                    data[index].BANK_SWIFT_CODE +
                                    "~" +
                                    data[index].EMAIL +
                                    "~" +
                                    data[index].BEN_ACCOUNT_CURRENCY +
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
                    $(".yes_beneficiary").hide();
                    $(".no_beneficiary").show();
                }
            }
        },
    });
}

function expenseTypes() {
    $.ajax({
        type: "GET",
        url: "get-expenses",
        datatype: "application/json",
        success: function (response) {
            console.log(response.data);
            let data = response.data;

            $.each(data, function (index) {
                $("#category").append(
                    $("<option>", {
                        value:
                            data[index].expenseCode +
                            "~" +
                            data[index].expenseName,
                    }).text(data[index].expenseName)
                );
            });
        },
    });
}

$(document).ready(function () {
    $("#spinner").hide(),
        $("#spinner-text").hide(),
        $("#print_receipt").hide(),
        $(".hide_invoice").hide();
    $("#transaction_summary").hide();
    $(".success_gif").hide();
    $(".attach_invoice").hide();
    $(".transfer_mode_note").hide();
    $(".no_beneficiary").hide();
    $("#our_charges_type").hide();
    $("#share_charges_type").hide();
    $("#yours_charges_type").hide();
    $(".charges_type_note").hide();

    setTimeout(function () {
        from_account();
        get_benerficiary();
        expenseTypes();
    }, 2000);

    function toaster(message, icon) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        Toast.fire({
            icon: icon,
            title: message,
        });
    }

    $("#from_account").change(function () {
        var from_account_details = $(this).val().split("~");
        console.log(from_account_details);
        $(".display_from_account_name").text(from_account_details[1]);
        $(".display_from_account_no").text(from_account_details[2]);
        $(".display_from_account_amount").text(from_account_details[4]);
        $(".display_from_account_currency").text(from_account_details[3]);
        $(".display_currency").text(from_account_details[3]);
    });

    $("#to_account").change(function () {
        var to_account_details = $(this).val().split("~");
        console.log(to_account_details);
        $(".display_to_account_name").text(to_account_details[4]);
        $(".display_to_bank_name").text(to_account_details[0]);
        $(".display_to_account_no").text(to_account_details[2]);
        $(".display_to_account_currency").text(to_account_details[8]);
        $(".display_to_account_country").text(to_account_details[1]);
        //
        $("#beneficiary_country_name").val(to_account_details[1]);
        $("#beneficiary_bank_name").val(to_account_details[0]);
        $("#beneficiary_swift_code").val(to_account_details[3]);
        $("#beneficiary_account_name").val(to_account_details[4]);
        $("#beneficiary_address").val(to_account_details[5]);
        $("#beneficiary_email").val(to_account_details[7]);
        // {{-- $("#beneficiary_telephone").val(to_account_details[6]); --}}

        $(".beneficiary_details").show();

        //MODAL DISPLAY
        $("#beneficiary_details_bank_name").text(to_account_details[0]);
        $("#beneficiary_details_bank_swift_code").text(to_account_details[5]);
        $("#beneficiary_details_account_name").text(to_account_details[1]);
        $("#beneficiary_details_account_number").text(to_account_details[2]);
        $("#beneficiary_details_account_currency").text(to_account_details[3]);
        $("#beneficiary_details_name").text(to_account_details[1]);
        $("#beneficiary_details_address").text(to_account_details[4]);
        $("#beneficiary_details_email").text(to_account_details[6]);
    });

    $("#amount").keyup(function () {
        let amount = $("#amount").val();
        $(".display_transfer_amount").text(
            formatToCurrency(parseFloat(amount))
        );
    });

    $("#checkmeout0").click(function () {
        if ($(this).is(":checked")) {
            // {{-- console.log("Checkbox is checked."); --}}

            // {{-- $("#onetime_payment_details_form").toggle(500); --}}
            // {{-- $("#payment_details_form").hide(); --}}

            $(".bene_details").hide();
            $("#onetime_beneficiary_form").toggle(500);
            $("#saved_benefciary_form").hide();
        } else if ($(this).is(":not(:checked)")) {
            // {{-- console.log("Checkbox is unchecked."); --}}
            // {{-- $("#payment_details_form").toggle(500); --}}
            // {{-- $("#onetime_payment_details_form").hide(); --}}

            $(".bene_details").toggle(500);
            $("#saved_benefciary_form").toggle(500);
            $("#onetime_beneficiary_form").hide();
        }
    });
    $("#charges_type").change(function () {
        var transfer_charges_ = $(this).val().split("~");
        // {{-- console.log(transfer_charges); --}}
        let transfer_charges = transfer_charges_[1];

        if ("OUR" == transfer_charges) {
            $(".charges_type_note").show();
            $("#our_charges_type").show();
            $("#share_charges_type").hide();
            $("#yours_charges_type").hide();
        } else if ("SHARE" == transfer_charges) {
            $(".charges_type_note").show();
            $("#share_charges_type").show();
            $("#our_charges_type").hide();
            $("#yours_charges_type").hide();
        } else if ("YOURS" == transfer_charges) {
            $(".charges_type_note").show();
            $("#yours_charges_type").show();
            $("#share_charges_type").hide();
            $("#our_charges_type").hide();
        } else {
            return false;
        }
    });

    $(".transfer_type").on("change", function (e) {
        e.preventDefault();

        var transfer_type = $('input[name="radioInline"]:checked').val();
        console.log(transfer_type);
        if (transfer_type == "INVOICE") {
            // {{-- console.log('disable'); --}}

            $(".attach_invoice").toggle(500);
        } else {
            // {{-- console.log('enable'); --}}
            $(".attach_invoice").hide();
            return false;
        }
    });

    $("#next_button").click(function (e) {
        e.preventDefault();

        var from_account = $("#from_account").val();

        var to_account = $("#to_account").val();

        var amount = $("#amount").val();

        var charges_type = $("#charges_type").val();

        var purpose = $("#purpose").val();

        var category_ = $("#category").val().split("~");
        var category = category_[1];

        if (
            from_account == "" ||
            to_account == "" ||
            amount == "" ||
            charges_type == "" ||
            purpose == "" ||
            category == ""
        ) {
            toaster("Field must not be empty", "error");
            return false;
        } else {
            $("#display_category").text(category);
            $("#display_purpose").text(purpose);
            $("#transaction_summary").toggle(500);
            $("#transaction_form").hide();
        }
    });

    $("#back_button").click(function (e) {
        e.preventDefault();

        $("#transaction_form").toggle(500);
        $("#transaction_summary").hide();
    });

    $("#confirm_modal_button").click(function () {
        if ($("#terms_and_conditions").is(":checked")) {
            var from_account_ = $("#from_account").val().split("~");
            console.log(from_account_);

            var to_account_ = $("#to_account").val().split("~");
            console.log(to_account_);

            var transfer_type = $("#beneficiary_inputGroupFile04").val();

            var amount = $("#amount").val();
            console.log(amount);

            var transfer_mode_ = $("#transfer_mode").val().split("~");
            console.log(transfer_mode_);

            var future_payement = $("#future_payement").val();
            console.log(future_payement);

            var sec_pin = $("#user_pin").val();
            console.log(sec_pin);

            $.ajax({
                type: "POST",
                url: "international-bank-transfer-api",
                datatype: "application/json",
                data: {},
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);

                    if (response.responseCode == "000") {
                        $("#confirm_modal_button").hide();
                        Swal.fire("", response.message, "success");
                        $("#spinner").hide();
                        $("#spinner-text").hide();
                        $("#back_button").hide();
                        $("#print_receipt").show();
                        $("#related_information_display").removeClass(
                            "d-none d-sm-block"
                        );
                        $(".rtgs_card_right").hide();
                        $(".success_gif").show();
                    } else {
                        $("#confirm_modal_button").show();
                        $("#spinner").hide();
                        $("#spinner-text").hide();
                        $("#print_receipt").hide();
                        $(".success_gif").hide();

                        $(".rtgs_card_right").show();
                    }
                },
            });
        } else {
            toaster("Accept terms & conditions to continue", "error", 6000);

            return false;
        }
    });
});
