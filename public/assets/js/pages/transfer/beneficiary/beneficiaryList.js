function getBeneficiaryList() {
    $.ajax({
        tpye: "GET",
        url: "transfer-beneficiary-list",
        datatype: "application/json",
        success: function (response) {
            if (response.responseCode == "000") {
                const data = response.data;
                // $("#beneficiary_list_loader").hide();
                // $("#beneficiary_list_retry_btn").hide();
                sameBankBeneficiaries = [];
                otherBankBeneficiaries = [];
                internationalBeneficiaries = [];
                $.each(data, function (i) {
                    if (
                        data[i].BENEF_TYPE === "SAB" ||
                        data[i].TRANS_TYPE === "SAM"
                    ) {
                        sameBankBeneficiaries.push(data[i]);
                    } else if (
                        data[i].BENEF_TYPE === "OTB" ||
                        data[i].TRANS_TYPE === "OTR"
                    ) {
                        otherBankBeneficiaries.push(data[i]);
                    } else if (
                        data[i].BENEF_TYPE === "INTB" ||
                        data[i].TRANS_TYPE === "INT"
                    ) {
                        internationalBeneficiaries.push(data[i]);
                    }
                });
                drawBeneficiaryTable();
            } else {
                $("#beneficiary_table").hide();
                $("#beneficiary_list_loader").hide();
                $("#beneficiary_list_retry_btn").show();
            }
        },
    });
}
function beneficiarySaved() {
    $("#edit_modal").modal("hide");
    Swal.fire({
        width: 300,
        title: "<h2 class='text-success font-16 font-weight-bold'>Beneficiary Saved</h2>",
        imageUrl: "assets/images/animations/sprinkles.gif",
        imageHeight: 100,
        confirmButtonColor: "#1abc9c",
    });
    getBeneficiaryList();
}
function beneficiaryDeleted() {
    Swal.fire({
        width: 300,
        title: "<h2 class='text-danger font-16 font-weight-bold'>Beneficiary Deleted</h2>",
        imageUrl: "assets/images/animations/delete-message.gif",
        imageHeight: 100,
        confirmButtonColor: "#dc3545",
    });
    getBeneficiaryList();
}
function drawBeneficiaryTable() {
    let table = $("#beneficiary_list")
        .DataTable({
            destroy: true,
            columnDefs: [
                {
                    targets: "_all",
                    orderable: false,
                },
            ],
        })
        .clear();
    let noBeneficiaries = noDataAvailable.replace("Data", "Beneficiaries");
    let data = [];

    $("#beneficiary_list tbody").empty();
    const currentType = $(".current-type").attr("data-value");
    if (currentType === "SAB") {
        data = sameBankBeneficiaries;
    } else if (currentType === "OTB") {
        data = otherBankBeneficiaries;
    } else if (currentType === "INTB") {
        data = internationalBeneficiaries;
    }

    if (data.length < 1) {
        $("#beneficiary_list tbody")
            .append(`<td colspan="100%" class="text-center">
        ${noBeneficiaries} </td>`);
        return;
    }
    $.each(data, (index) => {
        beneData = JSON.stringify(data[index]);
        table.row
            .add([
                data[index].NICKNAME,
                data[index].BEN_ACCOUNT,
                data[index].EMAIL,
                data[index].BANK_NAME,

                `<a class='edit-beneficiary' style="display:flex; place-content:center;" href="#" data-value='${beneData}'> <span class="fe-edit noti-icon text-info"></span></a>`,
            ])
            .draw("full-reset");
    });
    let editButtons = document.querySelectorAll(".edit-beneficiary");
    editButtons.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            const editButton = e.currentTarget;
            const beneficiaryData = JSON.parse(
                $(editButton).attr("data-value")
            );
            editBankBeneficiary(beneficiaryData, currentType);
        });
    });
}

$(document).ready(function () {
    $("#beneficiary_list_loader").show();
    getBeneficiaryList();
    $("#add_beneficiary").on("click", () => {
        addBankBeneficiary($(".current-type").attr("data-value"));
    });

    let beneficiaryType = document.querySelectorAll(".beneficiary-type");
    beneficiaryType.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            const currentType = e.currentTarget;
            $(".beneficiary-type").removeClass("current-type");
            $(currentType).addClass("current-type");
            $("#beneficiary_type_title").text(
                $(currentType).attr("data-title") + " "
            );
            drawBeneficiaryTable();
        });
    });
});
