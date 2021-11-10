$(function () {
    // console.log("a")
    let today = new Date();
    let day = today.getDate().toString().padStart(2, "0");
    let month = (today.getMonth() + 1).toString().padStart(2, "0");
    let start_date = today.getFullYear() + "-" + month + "-01";
    let end_date = today.getFullYear() + "-" + month + "-" + day;
    let this_day = end_date;

    $("#startDate").val(start_date);
    $("#endDate").val(end_date);

    // get_accounts();

    $("#from_account").change(function () {
        let from_account = $(this).val();
        from_account_info = from_account.split("~");
        // set summary values for display
        $(".account_product").text(from_account_info[0]);
        $(".account_description").text(from_account_info[1]);
        $(".account_number").text(from_account_info[2]);
        $(".display_from_account_currency").text(from_account_info[3]);
        $(".account_currency").text(from_account_info[3]);
    });

    $("#search_transaction").click(function () {
        start_date = $("#startDate").val();
        end_date = $("#endDate").val();
        if (start_date > this_day) {
            toaster("Start Date can't be greater than today", "warning", 3000);
            return false;
        } else if (end_date > this_day) {
            toaster("End Date can't be greater than today", "warning", 3000);
            return false;
        } else if (start_date > end_date) {
            toaster(
                "Start Date can't be greater than End Date",
                "warning",
                3000
            );
            return false;
        } else {
            var from_account = $("#from_account").val();
            console.log(start_date);
            if (!validateAll(from_account)) {
                toaster("please select an account", "warning", 3000);
                $("#search_transaction").text("Search");
                return false;
            } else {
                $("#search_transaction").text("Loading ...");
                from_account_info = from_account.split("~");
                account_number = from_account_info[2].trim();
                getAccountTransactions(account_number, start_date, end_date);
            }
        }
    });

    $("#date_search").click(function () {
        $(".account_transaction_display").hide();
        $(".account_transaction_display_table").hide();
        $("#account_transaction_retry_btn").hide();
        $("#account_transaction_loader").show();
        getAccountTransactions(account_number, start_date, end_date);
    });

    $("#credit_transaction").click(function () {
        $("#table-body-display").empty();
        let data = transactions;
        var load_data = [];
        $.each(data, function (index) {
            if (parseFloat(data[index].amount) > 0) {
                load_data.push(data[index]);
            } else {
            }
        });

        load_data_into_table(load_data, account_number, start_date, end_date);
    });

    $("#filter").change(function () {
        let filter = $(this).val();

        let account = $("#from_account").val();

        if (account == "" || account == undefined) {
            return false;
        }

        if (filter == "debit") {
            $("#table-body-display").empty();
            let data = transactions;
            var load_data = [];
            $.each(data, function (index) {
                if (parseFloat(data[index].amount) < 0) {
                    load_data.push(data[index]);
                } else {
                }
            });
            load_data_into_table(
                load_data,
                account_number,
                start_date,
                end_date
            );
        } else if (filter == "credit") {
            $("#table-body-display").empty();
            let data = transactions;
            var load_data = [];
            $.each(data, function (index) {
                if (parseFloat(data[index].amount) > 0) {
                    load_data.push(data[index]);
                } else {
                }
            });

            load_data_into_table(
                load_data,
                account_number,
                start_date,
                end_date
            );
        } else {
            let load_data = transactions;
            load_data_into_table(
                load_data,
                account_number,
                start_date,
                end_date
            );
        }
    });

    $("#all_transaction").click(function () {
        $("#table-body-display").empty();

        let data = transactions;

        load_data_into_table(transactions);
    });

    $("#debit_transaction").click(function () {
        $("#table-body-display").empty();
        // {{-- return false --}}

        let data = transactions;
        var load_data = [];
        $.each(data, function (index) {
            if (parseFloat(data[index].amount) < 0) {
                // {{-- alert(data[index].amount) --}}
                load_data.push(data[index]);
            } else {
            }
        });
        load_data_into_table(load_data, account_number, start_date, end_date);
    });

    function load_data_into_table(data, account_number, start_date, end_date) {
        $("#table-body-display tr").remove();
        $(".account_transaction_display").hide();
        $(".account_transaction_display_table").hide();
        $("#account_transaction_retry_btn").hide();
        $("#account_transaction_loader").show();

        $(".display_account_number").text(account_number);
        $(".display_search_date_range").text(start_date + " to " + end_date);

        $("#table-body-display").html("");

        var table = $(".account_transaction_display_table").DataTable({
            destroy: true,
            // dom: "Bfrtip",
            // buttons: ["copy", "excel", "pdf"],
        });

        table.clear().draw();

        if (data.length > 0) {
            $("#pdf_print").html(`
                        <a href="print-account-statement?account_number=${account_number}&start_date=${start_date}&end_date=${end_date}" target="_blank">
                            <img src="{{ asset('assets/images/pdf.png') }}" alt="" style="width: 22px; height: 25px;">
                        </a>
                    `);

            $("#excel_print").html(`
                        <a href="{{ url('print-account-statement') }}">
                            <img src="{{ asset('assets/images/excel.png') }}" alt="" style="width: 22px; height: 25px;">
                        </a>
                    `);
            $.each(data, function (index) {
                let amount = ``;
                if (parseFloat(data[index].amount) > 0) {
                    amount = `<b class='text-success'>
                                        <i class="fe-arrow-up text-success mr-1"></i>
                                        ${formatToCurrency(
                                            parseFloat(data[index].amount)
                                        )}
                                    </b>
                                    `;
                } else {
                    amount = `<b class='text-danger'>
                                        <i class="fe-arrow-down text-danger mr-1"></i>
                                        ${formatToCurrency(
                                            parseFloat(data[index].amount)
                                        )}
                                    </b>
                                    `;
                }

                let attachment = ``;

                if (data[index].imageCheck == "1") {
                    attachment = `<a href="#" data-value='${data[index].batchNumber}' class="attachment-icon" >
                     <i class="fe-file-text d-block text-center text-success"></a>`;
                } else {
                    attachment = `<i class="fe-file-text d-block text-center text-danger">`;
                }

                let sysDate = new Date(data[index].postingSysDate);
                let dd = String(sysDate.getDate()).padStart(2, "0");
                let mm = String(sysDate.getMonth() + 1).padStart(2, "0"); //January is 0!
                let yyyy = sysDate.getFullYear();

                table.row
                    .add([
                        data[index].documentReference,
                        dd + "/" + mm + "/" + yyyy,
                        amount,
                        `${formatToCurrency(
                            parseFloat(data[index].runningBalance)
                        )}`,
                        data[index].narration,
                        data[index].contraAccount,
                        data[index].batchNumber,
                        attachment,
                    ])
                    .order([0, "desc"])
                    .column(0)
                    .visible(false, false)
                    .draw(false);
            });
            $(".attachment-icon").on("click", function (e) {
                e.preventDefault();
                const docId = $(this).attr("data-value");
                getTransDocument(docId);
            });
        } else {
        }

        $("#account_transaction_loader").hide();
        $("#account_transaction_retry_btn").hide();
        $(".account_transaction_display_table").show();
        $(".account_transaction_display").show();
    }
    function getAccountTransactions(account_number, start_date, end_date) {
        $("#search_transaction").text("Loading ...");
        $.ajax({
            type: "POST",
            url: "account-transaction-history",
            datatype: "application/json",
            data: {
                accountNumber: account_number,
                endDate: end_date,
                entrySource: "A",
                startDate: start_date,
                transLimit: "20",
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.responseCode == "000") {
                    transactions = response.data;
                    if (response.data.length === 0) {
                        toaster(response.message, "warning", 3000);
                    }
                    $("#search_transaction").text("Search");
                    load_data_into_table(
                        transactions,
                        account_number,
                        start_date,
                        end_date
                    );

                    $("#account_transaction_loader").hide();
                    $("#account_transaction_retry_btn").hide();
                    $(".account_transaction_display_table").show();
                    $(".account_transaction_display").show();
                } else {
                    $("#search_transaction").text("Search");
                    $("#account_transaction_loader").hide();
                    $(".account_transaction_display").hide();
                    $(".account_transaction_display_table").hide();
                    $("#account_transaction_retry_btn").show();
                    toaster(response.message, "warning");
                }
            },
            error: function (xhr, status, error) {
                $("#search_transaction").text("Search");
                $("#account_transaction_loader").hide();
                $(".account_transaction_display").hide();
                $(".account_transaction_display_table").hide();
                $("#account_transaction_retry_btn").show();
                setTimeout(function () {
                    getAccountTransactions(
                        account_number,
                        start_date,
                        end_date
                    );
                }, $.ajaxSetup().retryAfter);
            },
        });
    }
    function getTransDocument(batchNumber) {
        $.ajax({
            type: "POST",
            url: "account-trans-document-api",
            datatype: "application/json",
            data: { batchNumber },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.responseCode == "000") {
                    const data = response.data;
                    $.each(data, (i) => {
                        console.log(i);
                        Object.entries(data[i]).forEach(([key, value], j) => {
                            if (key.includes("image")) {
                                let active = j === 0 ? "active" : "";
                                let img = `<div class="carousel-item ${active}">
                                <img class="d-block w-100" src="data:image/jpg;base64,${value}" alt="slide-${j}">
                                </div>`;
                                $(".carousel-inner").append(img);
                                let indicator = `<li data-target="#attachment_carousel" data-slide-to="${j}" class="${active}"></li>
                              `;
                                $(".carousel-indicators").append(indicator);
                            }
                        });
                    });
                    $("#attachment_modal").modal("show");
                } else {
                    $("#search_transaction").text("Search");
                }
            },
        });
    }
});
