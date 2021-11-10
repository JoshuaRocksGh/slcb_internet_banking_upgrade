function korporReversal(data) {
    $("#centermodal").modal("show");
    $("#transfer_pin").on("click", () => {
        let userPin = $("#user_pin").val();
        if (userPin.length !== 4) {
            toaster("invalid pin", "warning");
            $("#user_pin").val("");
            userPin = "";
            return false;
        }
        let korporData = new Object();
        korporData.pinCode = userPin;
        korporData.referenceNo = data.REMITTANCE_REF;
        korporData.beneficiaryMobileNo = data.BENEF_TEL;
        reverseKorpor("reverse-korpor", korporData);
        $("#user_pin").val("");
        userPin = "";
    });
}
function reverseKorpor(url, data) {
    $.ajax({
        type: "POST",
        url: url,
        datatype: "application/json",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode === "000") {
                toaster(response.message, "success");
                // window.ref;
            } else {
                toaster(response.message, "error");
            }
        },
    });
}
function getKorporHistory(url, fromAccountNo, target) {
    $.ajax({
        type: "GET",
        url: url,
        datatype: "application/json",
        data: {
            accountNo: fromAccountNo,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.data.length > 0) {
                let data = response.data;
                $(`${target}`).empty();
                let extracolumn;
                if (!target.includes("reversal")) {
                    let badgeColor;
                    let badgeText;
                    if (target.includes("reversed")) {
                        badgeColor = "danger";
                        badgeText = "Cancelled";
                    } else if (target.includes("completed")) {
                        badgeColor = "success";
                        badgeText = "Completed";
                    } else {
                        badgeColor = "warning";
                        badgeText = "Pending";
                    }
                    extracolumn = `<td> <strong><span class="badge badge-${badgeColor}">&nbsp;${badgeText}&nbsp;</span></strong> </td>`;
                }
                $.each(data, function (index) {
                    if (target.includes("reversal")) {
                        extracolumn = `<td> <button class="badge badge-danger" id="${data[index].REMITTANCE_REF}" korporData="${data[index].BENEF_TEL}~${data[index].REMITTANCE_REF}"> &nbsp;Reverse&nbsp;</button> </td>`;
                    }
                    $(`${target}`).append(
                        `<tr><td> <b> ${data[index].REMITTANCE_REF} </b>  </td>
                        <td> <b> ${data[index].BENEF_NAME}  </b>  </td>
                        <td> <b> ${data[index].BENEF_TEL}  </b>  </td>
                        <td> <b> ${data[index].BENEF_ADDRESS1}  </b>  </td>
                        <td> <b> ${formatToCurrency(
                            parseFloat(data[index].REMITTANCE_AMOUNT)
                        )}</b></td>${extracolumn}</tr>`
                    );
                    if (target.includes("reversal")) {
                        $(`#${data[index].REMITTANCE_REF}`).on("click", () => {
                            korporReversal(data[index]);
                        });
                    }
                });
            }
        },
    });
}

$(document).ready(function () {
    $("#transaction_summary").hide();
    $("#spinner").hide();
    $("#spinner-text").hide();
    $("#spinner-reverse").hide();
    $("#spinner-text-reverse").hide();
    $("#spinner-text-self").hide();
    $("#spinner-self").hide();
    $("#spinner-text-next").hide();
    $("#spinner-next").hide();
    $(".self_form").hide();
    $(".self_summary").hide();
    $("#spinner-redeem").hide();
    $("#spinner-text-redeem").hide();
    $(".receipt").hide();

    $(".korpor_details").hide();

    if (customerType == "C") {
        $(".account_of_transfer_reverse").show();
        $(".personal_pin").hide();
    } else {
        $(".personal_pin").show();
        $(".account_of_transfer_reverse").hide();
    }

    $("#redeem_button").click(function () {
        let mobile_no = $("#mobile_no").val();
        console.log(mobile_no);
        let remittance_no = $("#remittance_no").val();
        console.log(remittance_no);

        if (mobile_no == "" || remittance_no == "") {
            toaster("fields must not be empty", "error", 2000);
            return false;
        }

        $.ajax({
            type: "POST",
            url: "korpor-otp",
            datatype: "application/json",
            data: {
                remittance_no: remittance_no,
                mobile_no: mobile_no,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);

                if (response.responseCode == "000") {
                    toaster(response.message, "success", 20000);

                    $(".redeem_korpor").hide();
                    $(".korpor_details").show();
                    let receiver_name = response.data.beneficiaryName;
                    console.log(receiver_name);
                    $("#receiver_name_redeem").text(receiver_name);
                    $("#receiver_name_redeem").val(receiver_name);
                    let receiver_address = response.data.beneficiaryAddress;
                    // $("#receiver_address_redeem").text(receiver_address);
                    $("#receiver_address_redeem").val(receiver_address);
                    let receiver_amount = response.data.remittanceAmount;
                    $("#receiver_amount_redeem").val(receiver_amount);

                    let receiver_num = $("#mobile_no").val();
                    $("#receiver_phone_redeem").val(receiver_num);

                    let accountNo = response.data.accountNumber;

                    $("#done_button").click(function () {
                        let otp = $("#receiver_otp_redeem").val();
                        if (otp == "") {
                            toaster("Kindly enter the otp", "error", 20000);
                            return false;
                        }

                        $.ajax({
                            type: "POST",
                            url: "redeem-korpor",
                            datatype: "application/json",
                            data: {
                                redeem_amount: receiver_amount,
                                redeem_receiver_name: receiver_name,
                                redeem_receiver_phone: receiver_num,
                                redeem_account: accountNo,
                                redeem_remittance_no: remittance_no,
                                otp_number: otp,
                            },
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            success: function (response) {
                                console.log(response);

                                if (response.responseCode == "000") {
                                    toaster(response.message, "success", 20000);

                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 30000);
                                } else {
                                    toaster(response.message, "error", 20000);
                                }
                            },
                        });
                    });

                    // $("#request_form_div").hide();
                    // $('.display_button_print').show();
                    // alert("done test");
                } else {
                    toaster(response.message, "error", 9000);

                    $("#spinner").hide();
                    $("#spinner-text").hide();
                    $(".submit-text").show();
                    // $('#confirm_payment').show();
                    // $('#confirm_button').attr('disabled', false);
                }
            },
        });
    });

    // $("#")
    // $('#print_receipt').hide();

    $(".display_button_print").hide();

    //codes to display self or others transfer
    $("#inlineRadio1").click(function () {
        var destination_type = $(
            'input[type="radio"][name="radioInline"]:checked'
        ).val();
        // console.log(destination_type);
        $(".display_receiver_name").text(userAlias);
        $(".self_form").toggle("500");
        // {{-- $(".self_summary").toggle('500'); --}}
        $(".others_form").hide();
        // {{-- $(".others_summary").hide(); --}}
    });

    $("#inlineRadio2").click(function () {
        var destination_type = $(
            'input[type="radio"][name="radioInline"]:checked'
        ).val();
        // console.log(destination_type);
        $(".display_receiver_name").text("");
        $(".others_form").toggle("500");
        // {{-- $(".others_summary").toggle('500'); --}}
        $(".self_form").hide();
        // {{-- $(".self_summary").hide(); --}}
    });

    // {{-- hide select accounts info --}}
    $(".from_account_display_info").hide();
    $(".to_account_display_info").hide();
    $("#schedule_payment_date").hide();
    $("#frequency").hide();
    $("#schedule_payment_contraint_input").hide();
    $(".display_schedule_payment_date").text("N/A");

    $("#korpor_payment_form").show();
    $("#korpor_payment_summary").hide();

    //show card after the from_account value changes
    $(".from_account").change(function () {
        var from_account = $(this).val();
        console.log(from_account);
        if (from_account == "" || from_account.trim() == undefined) {
            // {{-- alert('money') --}}
            // $(".from_account_display_info").hide()
        } else {
            from_account_info = from_account.split("~");

            // var to_account = $('#to_account').val()

            // set summary values for display
            $(".display_from_account_type").text(from_account_info[0]);
            $(".display_from_account_name").text(from_account_info[1]);
            $(".display_from_account_no").text(from_account_info[2]);
            $(".display_from_account_currency").text(from_account_info[3]);
            $(".select_currency").val(from_account_info[3]);
            $(".display_transfer_currency").text(from_account_info[3]);
            $("#display_currency").text(from_account_info[3]);
            $("#from_account_receipt").text(from_account_info[2]);
            $(".receipt_currency").text(from_account_info[3]);

            $(".display_currency").text(from_account_info[3]); // set summary currency

            amt = from_account_info[4];

            $(".display_from_account_amount").text(
                formatToCurrency(Number(from_account_info[4]))
            );
            $(".from_account_display_info").show();

            //set summary value for display for self

            $(".display_from_account_type_self").text(from_account_info[0]);
            $(".display_from_account_name_self").text(from_account_info[1]);
            $(".display_from_account_no_self").text(from_account_info[2]);
            $(".display_from_account_currency_self").text(from_account_info[3]);

            $(".display_currency_self").text(from_account_info[3]); // set summary currency

            amt = from_account_info[4];

            $(".display_from_account_amount_self").text(
                formatToCurrency(Number(from_account_info[4]))
            );
            $(".from_account_display_info_self").show();
        }
    });

    //for testing process
    $(".from_account").change(function () {
        var from_account = $(".from_account").val();
        console.log(from_account);
        // alert(from_account);
    });

    $(".unredeemed").change(function () {
        var account = $(".unredeemed").val();
        console.log(account);
    });

    $("#amount").keyup(function () {
        var amount_ = $(this).val();
        var amount = $("#amount").val();
        $(".display_amount").text(formatToCurrency(parseFloat(amount_)));
        console.log(amount);
    });

    $("#receiver_name").change(function () {
        var receiver_name = $("#receiver_name").val();
        console.log(receiver_name);
    });

    $("#receiver_phoneNum").change(function () {
        var receiver_phoneNum = $("#receiver_phoneNum").val();
        console.log(receiver_phoneNum);
    });

    $("#receiver_address").change(function () {
        var receiver_address = $("#receiver_address").val();
        console.log(receiver_address);
    });

    $("#user_pin").change(function () {
        var user_pin = $("#user_pin").val();
        console.log(user_pin);
    });
    //end of testing process

    //display for others
    $("#receiver_name").keyup(function () {
        var receiver_name = $("#receiver_name").val();
        $(".display_receiver_name").text(receiver_name);
    });

    $("#receiver_phoneNum").keyup(function () {
        var receiver_phoneNum = $("#receiver_phoneNum").val();
        $(".display_receiver_phoneNum").text(receiver_phoneNum);
    });

    $("#receiver_address").keyup(function () {
        var receiver_address = $("#receiver_address").val();
        $(".display_receiver_address").text(receiver_address);
    });

    $("#amount").change(function () {
        var amount = $("#amount").val();
        $(".display_amount").text(amount);
    });

    //korpor transfer details for self
    $("#amount_self").keyup(function () {
        var amount_ = $(this).val();
        var amount = $("#amount_self").val();
        $(".display_amount").text(formatToCurrency(parseFloat(amount_)));
        console.log(amount);
    });

    $("#receiver_name_self").click(function () {
        var receiver_name = $("#receiver_name_self").val();
        console.log(receiver_name);
    });

    $("#receiver_phoneNum_self").change(function () {
        var receiver_phoneNum = $("#receiver_phoneNum_self").val();
        console.log(receiver_phoneNum);
    });

    $("#receiver_address_self").keyup(function () {
        var receiver_address_ = $(this).val();
        var receiver_address = $("#receiver_address_self").val();
        $(".display_receiver_address").text(receiver_address_);
        console.log(receiver_address);
    });

    $("#user_pin_self").change(function () {
        var user_pin = $("#user_pin_self").val();
        console.log(user_pin);
    });
    //end of testing process

    $("#receiver_name_self").click(function () {
        var receiver_name = userAlias;
        $(".display_receiver_name_self").text(receiver_name);
        $(".display_receiver_name").text(receiver_name);
    });

    $("#receiver_phoneNum_self").keyup(function () {
        var receiver_phoneNum_ = $(this).val();
        var receiver_phoneNum = $("#receiver_phoneNum_self").val();
        $(".display_receiver_phoneNum_self").text(receiver_phoneNum);
        $(".display_receiver_phoneNum").text(receiver_phoneNum_);
    });

    $("#amount_self").change(function () {
        var amount = $("#amount_self").val();
        $(".display_amount_self").text(amount);
    });

    $(".reference_no").change(function () {
        var reference_no = $(".reference_no").val();
        console.log(reference_no);
    });

    $(".receiver_phoneNo_reverse").change(function () {
        var receiver_phoneNo = $(".receiver_phoneNo_reverse").val();
        console.log(receiver_phoneNo);
    });

    //method to format currency amount
    function formatToCurrency(amount) {
        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    }

    //button to submit for list of redeemed/completed transactions
    $("#submit_account_no_redeemed").on("click", function () {
        let fromAccount = $(".redeemed").val();
        handleKorporHistory(
            "redeemed-korpor",
            fromAccount,
            ".redeemed_korpor_list_display"
        );
    });

    //button to submit account unredeemed request
    $("#submit_account_no_unredeemed").on("click", function () {
        let fromAccount = $("#unredeemed_history_account").val();
        handleKorporHistory(
            "unredeem-korpor-request",
            fromAccount,
            "#unredeemed_korpor_history_display"
        );
    });

    $("#submit_unredeemed_account").on("click", () => {
        let fromAccount = $("#unredeemed_account").val();
        handleKorporHistory(
            "unredeem-korpor-request",
            fromAccount,
            "#korpor_reversal_list_display"
        );
    });
    $("#submit_account_no_reversed").on("click", function () {
        let fromAccount = $(".reversed").val();
        handleKorporHistory(
            "reversed-korpor-request",
            fromAccount,
            ".reversed_korpor_list_display"
        );
    });
    function handleKorporHistory(url, fromAccount, target) {
        if (!fromAccount) {
            toaster(
                "Select an account to show list of unredeemed transactions",
                "warning"
            );
            return false;
        }
        let fromAccountNo = fromAccount.split("~")[2];
        getKorporHistory(url, fromAccountNo, target);
    }

    //button to submit korpor payment transaction for others
    $("#confirm_button").click(function () {
        // alert('i have been clicked');
        var from_account = $(".from_account").val();

        // let from_account = from_account_value;
        let transfer_amount = $("#amount").val();
        console.log(transfer_amount);
        // alert('');
        let receiver_name = $("#receiver_name").val();
        let receiver_phoneNum = $("#receiver_phoneNum").val();
        let receiver_address = $("#receiver_address").val();
        let sender_name = userAlias;
        let user_pin = $("#user_pin").val();
        // console.log(sender_name);

        if (
            from_account.trim() == "" ||
            transfer_amount == "" ||
            receiver_name == "" ||
            receiver_phoneNum == "" ||
            receiver_address == "" ||
            user_pin == ""
        ) {
            // alert('fields must not be empty');
            toaster("Fields must not be empty", "error", 10000);
            return false;
        } else {
            //hide the payment form and show the summary form
            $("#korpor_payment_form").hide();
            $("#korpor_payment_summary").show();

            amt = from_account_info[4].trim();
            if (amt < transfer_amount) {
                toaster("Insufficient account balance", "error", 9000);
                return false;
            } else {
                //display this is the payment summary
                $("#display_amount").text(transfer_amount);
                $("#display_receiver_name").text(receiver_name);
                $("#display_receiver_address").text(receiver_name);
                $("#display_receiver_phoneNum").text(receiver_phoneNum);
            }

            if (user_pin == "") {
                toaster("enter your pin", "error", 9000);
                // console.log("Error is from here.");
                return false;
            } else {
                $("#spinner").show(),
                    $("#spinner-text").show(),
                    // $('#print_receipt').hide();
                    $(".submit-text").hide();
                let from_account_value = from_account_info[2].trim();
            }
        }
    });

    $("#back_button").click(function (e) {
        e.preventDefault();
        $("#request_form_div").show();
        $("#transaction_summary").hide();
    });

    //button to submit korpor payment transaction for self.
    $("#confirm_next_button").click(function (e) {
        e.preventDefault();
        var destination_type = $(
            'input[type="radio"][name="radioInline"]:checked'
        ).val();
        if (destination_type == "OTHERS") {
            // alert(destination_type);

            var from_account_ = $("#account_of_transfer").val();
            // console.log("from_account_:", from_account_);

            var receiver_name_ = $("#receiver_name").val();
            $("#display_receiver_name").text(receiver_name_);
            $("#receiver_name_receipt").text(receiver_name_);
            // console.log("receiver_name_:", receiver_name_);

            var receiver_phone_ = $("#receiver_phoneNum").val();
            $("#display_receiver_telephone").text(receiver_phone_);
            $("#receiver_telephone_receipt").text(receiver_phone_);
            // console.log("receiver_phone_:", receiver_phone_);

            var receiver_address_ = $("#receiver_address").val();
            $("#display_receiver_address").text(receiver_address_);
            // console.log("receiver_address_:", receiver_address_);

            var amount_ = $("#amount").val();
            $("#display_transfer_amount").text(
                formatToCurrency(Number(amount_))
            );
            $("#amount_receipt").text(formatToCurrency(Number(amount_)));
            // console.log("amount_:", amount_);

            // write an if statement for transfer amount if its less

            if (
                from_account_ == "" ||
                amount_ == "" ||
                receiver_name_ == "" ||
                receiver_phone_ == "" ||
                receiver_address_ == ""
            ) {
                // alert('fields must not be empty');
                // toaster("Fields must not be empty", "error", 10000);
                return false;
            } else {
                $("#transaction_summary").show();
                $("#request_form_div").hide();
            }
        } else {
            // {{-- alert("SELF") --}}

            var from_account_self_ = $("#account_of_transfer").val();

            var receiver_name_self_ = $("#receiver_name_self").val();

            $("#display_receiver_name").text(userAlias);
            $("#receiver_name_receipt").text(userAlias);

            var receiver_phoneNum_self_ = $("#receiver_phoneNum_self").val();
            $("#display_receiver_telephone").text(receiver_phoneNum_self_);
            $("#receiver_telephone_receipt").text(receiver_phoneNum_self_);

            var receiver_address_self = $("#receiver_address_self").val();
            $("#display_receiver_address").text(receiver_address_self);

            var amount_self_ = $("#amount_self").val();
            $("#display_transfer_amount").text(
                formatToCurrency(Number(amount_self_))
            );
            $("#amount_receipt").text(formatToCurrency(Number(amount_self_)));

            if (
                !validateAll(
                    from_account_self_,
                    amount_self_,
                    receiver_name_self_,
                    receiver_phoneNum_self_,
                    receiver_address_self
                )
            ) {
                // alert('fields must not be empty');
                toaster("Fields must not be empty", "error", 10000);
                return false;
            } else {
                $("#transaction_summary").show();
                $("#request_form_div").hide();
                return false;
            }
        }

        // alert('i have been clicked');
        let from_account = $(".from_account").val();
        let transfer_amount = $("#amount_self").val();
        console.log(transfer_amount);
        // alert('');
        let receiver_name = $("#receiver_name_self").val();
        let receiver_phoneNum = $("#receiver_phoneNum_self").val();
        let receiver_address = $("#receiver_address_self").val();
        let sender_name = userAlias;
        let user_pin = $("#user_pin_self").val();
        // console.log(sender_name);

        //

        if (
            from_account.trim() == "" ||
            transfer_amount == "" ||
            receiver_name == "" ||
            receiver_phoneNum == "" ||
            user_pin == ""
        ) {
            // alert('fields must not be empty');
            toaster("Fields must not be empty", "error", 10000);
            return false;
        } else {
            //hide the payment form and show the summary form
            $("#korpor_payment_form").hide();
            $("#korpor_payment_summary").show();

            amt = from_account_info[4].trim();
            if (amt < transfer_amount) {
                toaster("Insufficient account balance", "error", 9000);
                return false;
            } else {
                //display this is the payment summary
                $("#display_amount").text(transfer_amount);
                $("#display_receiver_name").text(receiver_name);
                $("#display_receiver_address").text(receiver_name);
                $("#display_receiver_phoneNum").text(receiver_phoneNum);
            }

            if (user_pin == "") {
                toaster("enter your pin", "error", 9000);
                // console.log("Error is from here.");
                return false;
            } else {
                $("#spinner").show(),
                    $("#spinner-text").show(),
                    // $('#print_receipt').hide();
                    $(".submit-text").hide();
                let from_account_value = from_account_info[2].trim();
            }
        }
    });

    //button to submit for korpor payment for reversal
    $("#reverse_button").click(function () {
        console.log(customerType);

        if (customerType == "C") {
            // alert("Corporate Reversal");

            var account_num = $("#account_of_transfer_reverse")
                .val()
                .split("~");
            console.log(account_num);
            var acc_num = account_num[2];
            var acc_currency = account_num[3];
            var acc_mandate = account_num[5];
            var acc_currCode = account_num[6];
            // return false ;
            var reference_no = $("#reference_no").val();
            var receiver_phoneNo = $("#receiver_phoneNo_reverse").val();
            // var pin = $("#reference_pin").val();

            if (
                reference_no == "" ||
                receiver_phoneNo == "" ||
                account_num == ""
            ) {
                toaster("Fields must not be empty", "error", 10000);
                return false;
            } else {
                $("#reverse-text").hide();
                $("#spinner-reverse").show();
                $("#spinner-text-reverse").show();

                $.ajax({
                    type: "POST",
                    url: "corporate-reverse-korpor",
                    datatype: "application/json",
                    data: {
                        reference_no: reference_no,
                        receiver_phoneNo: receiver_phoneNo,
                        accountNumber: acc_num,
                        accountCurrency: acc_currency,
                        accountMandate: acc_mandate,
                        accountCurrCode: acc_currCode,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        if (response.responseCode == "000") {
                            Swal.fire("", response.message, "success");
                            // toaster(response.message, 'success', 2000)
                            // var data = response.data.loanSchedule
                            // console.log(response)
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        } else {
                            toaster(response.message, "error", 9000);
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#submit").attr("disabled", false);
                        $("#spinner").hide();
                        $("#spinner-text").hide();

                        $("#log_in").show();
                        $("#error_message").text("Connection Error");
                        $("#failed_login").show();
                    },
                });
            }
        } else {
            var reference_no = $("#reference_no").val();
            var receiver_phoneNo = $("#receiver_phoneNo_reverse").val();
            var pin = $("#reference_pin").val();

            // if (from_account == '' || amount == '' || receiver_name == '' || receiver_phoneNum ==
            //     '' || receiver_address == '') {
            //     toaster('Field must not be empty', 'error', 10000)
            //     return false
            // }

            if (!validateAll(reference_no, receiver_phoneNo, pin)) {
                toaster("Fields must not be empty", "error", 10000);
                return false;
            } else {
                $("#reverse-text").hide();
                $("#spinner-reverse").show();
                $("#spinner-text-reverse").show();

                $.ajax({
                    type: "POST",
                    url: "reverse-korpor",
                    datatype: "application/json",
                    data: {
                        reference_no: reference_no,
                        receiver_phoneNo: receiver_phoneNo,
                        pin: pin,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        if (response.responseCode == "000") {
                            Swal.fire("", response.message, "success");
                            // toaster(response.message, 'success', 2000)
                            // var data = response.data.loanSchedule
                            // console.log(response)
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        } else {
                            toaster(response.message, "error", 9000);
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#submit").attr("disabled", false);
                        $("#spinner").hide();
                        $("#spinner-text").hide();

                        $("#log_in").show();
                        $("#error_message").text("Connection Error");
                        $("#failed_login").show();
                    },
                });
            }
        }
    });

    // button to submit for both others and self transaction
    $("#confirm_modal_button").click(function (e) {
        e.preventDefault();

        if ($("#terms_and_conditions").is(":checked")) {
            if (customerType == "C") {
                // {{-- alert('Corporate Account'); --}}

                $("#confirm_transfer").hide();
                $("#spinner").show();
                $("#spinner-text").show();
                $("#confirm_modal_button").prop("disabled", true);

                var destination_type = $(
                    'input[type="radio"][name="radioInline"]:checked'
                ).val();

                if (destination_type == "OTHERS") {
                    // {{-- alert(destination_type) --}}

                    var from_account_ = $("#account_of_transfer")
                        .val()
                        .split("~");
                    console.log("========");
                    console.log(from_account_);

                    var from_account = from_account_[2];

                    // let from_account = from_account_value;
                    let transfer_amount = $("#amount").val();
                    console.log(transfer_amount);
                    // alert('');
                    let receiver_name = $("#receiver_name").val();
                    let receiver_phoneNum = $("#receiver_phoneNum").val();
                    let receiver_address = $("#receiver_address").val();
                    let sender_name = userAlias;
                    let user_pin = $("#user_pin").val();
                    let from_account_number = from_account_[2];
                    var form_account_currency = from_account_[3];
                    var from_account_mandate = from_account_[5];
                    var from_account_currCode = from_account_[6];
                    var narration = $("#others_form_narration").val();
                    // {{-- console.log(from_account_mandate) --}}

                    $.ajax({
                        type: "POST",
                        url: "corporate-initiate-korpor",
                        datatype: "application/json",
                        data: {
                            amount: transfer_amount,
                            debit_account: from_account_number,
                            // 'pin_code': user_pin,
                            receiver_address: receiver_address.trim(),
                            receiver_name: receiver_name.trim(),
                            receiver_phone: receiver_phoneNum,
                            sender_name: sender_name.trim(),
                            account_currency: form_account_currency,
                            account_mandate: from_account_mandate,
                            currCode: from_account_currCode,
                            narration: narration,
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            console.log(response);

                            if (response.responseCode == "000") {
                                var ref_number = response.message;

                                var reference_number = ref_number.split(" ");
                                // {{-- console.log(reference_number); --}}
                                $("#reference_number_receipt").text(
                                    reference_number[7]
                                );
                                $(".summary_button").hide();

                                // Swal.fire("", response.message, "success");
                                toaster(response.message, "success", 10000);

                                // $(".receipt").show();
                                // $(".form_process").hide();
                            } else {
                                toaster(response.message, "error", 9000);

                                //$('#spinner').hide();
                                //$('#spinner-text').hide();
                                //$('.submit-text').show();
                                // $('#confirm_payment').show();
                                // $('#confirm_button').attr('disabled', false);
                            }
                        },
                    });
                } else {
                    // alert("SELF")

                    var from_account_ = $("#account_of_transfer")
                        .val()
                        .split("~");
                    // var from_account = from_account_[2]
                    let from_account_number = from_account_[2];
                    var form_account_currency = from_account_[3];
                    var from_account_mandate = from_account_[5];
                    var from_account_currCode = from_account_[6];
                    var narration = $("#others_form_narration").val();
                    // alert('i have been clicked');
                    let from_account = $(".from_account").val();
                    let transfer_amount = $("#amount_self").val();
                    console.log(transfer_amount);
                    // alert('');
                    let receiver_name = $("#receiver_name_self").val();
                    let receiver_phoneNum = $("#receiver_phoneNum_self").val();
                    let receiver_address = $("#receiver_address_self").val();
                    let sender_name = userAlias;
                    let user_pin = $("#user_pin").val();
                    // console.log(sender_name);

                    let from_account_value = from_account_info[2].trim();

                    function redirect_page() {
                        window.location.href = "{{ url('home') }}";
                    }
                    $.ajax({
                        type: "POST",
                        url: "corporate-initiate-korpor",
                        datatype: "application/json",
                        data: {
                            amount: transfer_amount,
                            debit_account: from_account_number,
                            // 'pin_code': user_pin,
                            receiver_address: receiver_address.trim(),
                            receiver_name: receiver_name.trim(),
                            receiver_phone: receiver_phoneNum,
                            sender_name: sender_name.trim(),
                            account_currency: form_account_currency,
                            account_mandate: from_account_mandate,
                            currCode: from_account_currCode,
                            narration: narration,
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            // {{-- console.log(response) --}}

                            if (response.responseCode == "000") {
                                var ref_number = response.message;

                                var reference_number = ref_number.split(" ");
                                // {{-- console.log(reference_number); --}}
                                $("#reference_number_receipt").text(
                                    reference_number[7]
                                );

                                $(".summary_button").hide();

                                // Swal.fire("", response.message, "success");
                                toaster(response.message, "success", 10000);

                                // setTimeout(function () {
                                //     redirect_page();
                                // }, 3000);

                                // $(".receipt").show();
                                // $('.form_process').hide();
                                // toaster(response.message, 'success', 20000);
                                // $("#request_form_div").hide();
                                // $('.display_button_print').show();
                            } else {
                                toaster(response.message, "error", 9000);

                                // $('#spinner').hide();
                                // $('#spinner-text').hide();
                                // $('.submit-text').show();
                                // $('#confirm_payment').show();
                                // $('#confirm_button').attr('disabled', false);
                            }
                        },
                    });
                }
            } else {
                $("#transfer_pin").click(function (e) {
                    e.preventDefault();
                    // {{-- alert("post to API"); --}}

                    var destination_type = $(
                        'input[type="radio"][name="radioInline"]:checked'
                    ).val();
                    if (destination_type == "OTHERS") {
                        // {{-- alert(destination_type) --}}

                        var from_account = $(".from_account").val();

                        // let from_account = from_account_value;
                        let transfer_amount = $("#amount").val();
                        console.log(transfer_amount);
                        // alert('');
                        let receiver_name = $("#receiver_name").val();
                        let receiver_phoneNum = $("#receiver_phoneNum").val();
                        let receiver_address = $("#receiver_address").val();
                        let sender_name = userAlias;
                        let user_pin = $("#user_pin").val();
                        let from_account_value = from_account_info[2].trim();

                        $.ajax({
                            type: "POST",
                            url: "initiate-korpor",
                            datatype: "application/json",
                            data: {
                                amount: transfer_amount,
                                debit_account: from_account_value,
                                pin_code: user_pin,
                                receiver_address: receiver_address.trim(),
                                receiver_name: receiver_name.trim(),
                                receiver_phone: receiver_phoneNum,
                                sender_name: sender_name.trim(),
                            },
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            success: function (response) {
                                console.log(response);

                                if (response.responseCode == "000") {
                                    var ref_number = response.message;

                                    var reference_number =
                                        ref_number.split(" ");
                                    // {{-- console.log(reference_number); --}}
                                    $("#reference_number_receipt").text(
                                        reference_number[7]
                                    );

                                    Swal.fire("", response.message, "success");
                                    $(".receipt").show();
                                    $(".form_process").hide();
                                } else {
                                    toaster(response.message, "error", 9000);

                                    //$('#spinner').hide();
                                    //$('#spinner-text').hide();
                                    //$('.submit-text').show();
                                    // $('#confirm_payment').show();
                                    // $('#confirm_button').attr('disabled', false);
                                }
                            },
                        });
                    } else {
                        // {{-- alert("SELF") --}}

                        // alert('i have been clicked');
                        let from_account = $(".from_account").val();
                        let transfer_amount = $("#amount_self").val();
                        // console.log(transfer_amount);
                        // alert('');
                        let receiver_name = $("#receiver_name_self").val();
                        let receiver_phoneNum = $(
                            "#receiver_phoneNum_self"
                        ).val();
                        let receiver_address = $(
                            "#receiver_address_self"
                        ).val();
                        let sender_name = userAlias;
                        let user_pin = $("#user_pin").val();
                        // console.log(sender_name);

                        let from_account_value = from_account_info[2].trim();

                        $.ajax({
                            type: "POST",
                            url: "initiate-korpor",
                            datatype: "application/json",
                            data: {
                                amount: transfer_amount,
                                debit_account: from_account_value,
                                pin_code: user_pin,
                                receiver_address: receiver_address.trim(),
                                receiver_name: receiver_name.trim(),
                                receiver_phone: receiver_phoneNum,
                                sender_name: sender_name.trim(),
                            },
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            success: function (response) {
                                // {{-- console.log(response) --}}

                                if (response.responseCode == "000") {
                                    var ref_number = response.message;

                                    var reference_number =
                                        ref_number.split(" ");
                                    // {{-- console.log(reference_number); --}}
                                    $("#reference_number_receipt").text(
                                        reference_number[7]
                                    );

                                    Swal.fire("", response.message, "success");
                                    $(".receipt").show();
                                    $(".form_process").hide();
                                    // toaster(response.message, 'success', 20000);
                                    // $("#request_form_div").hide();
                                    // $('.display_button_print').show();
                                } else {
                                    toaster(response.message, "error", 9000);

                                    // $('#spinner').hide();
                                    // $('#spinner-text').hide();
                                    // $('.submit-text').show();
                                    // $('#confirm_payment').show();
                                    // $('#confirm_button').attr('disabled', false);
                                }
                            },
                        });
                    }
                });
            }
        } else {
            toaster("Accept Terms & Conditions to continue", "error");
            return false;
        }
    });
});
