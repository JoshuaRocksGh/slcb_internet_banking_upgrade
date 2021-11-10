function deleteBeneficiary(beneficiaryId) {
    $.ajax({
        type: "DELETE",
        url: "delete-payment-beneficiary-api",
        datatype: "application/json",
        data: { beneficiaryId },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (res) => {
            console.log(res);
            if (res.responseCode === "000") {
                $("#edit_modal").modal("hide");
                beneficiaryDeleted();
            } else {
                toaster(res.message, "error");
            }
        },
        error: (err) => {
            console.log(err);
            toaster(err.statusText, "error");
        },
    });
}

function saveBeneficiary(data) {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "save-payment-beneficiary-api",
        datatype: "application/json",
        data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (res) => {
            siteLoading("hide");
            if (res.responseCode === "000") {
                $("#edit_modal").modal("hide");
                beneficiarySaved();
            } else {
                toaster(res.message, "error");
            }
        },
        error: (err) => {
            siteLoading("hide");

            toaster(err.statusText, "error");
        },
    });
}
//Adding Beneficiary
async function addPaymentBeneficiary(currentType) {
    await prepareBeneficiaryForm(currentType, "Add");
    $("#delete_btn").hide();
}

async function prepareBeneficiaryForm(currentType, mode) {
    $("#edit_modal").attr("data-mode", mode.toUpperCase());
    $("#edit_modal").attr("data-type", currentType.toUpperCase());
    console.log(currentType);
    const { description, paySubTypes, label } = pageData["pay_" + currentType];
    $("#beneficiary_form_title").text(`${mode} ${description} Beneficiary`);
    $("#subtype_label").text(label.toLowerCase() + " :");
    $("#payment_label").text(paySubTypes[0].paymentLabel.toLowerCase() + " :");
    $("#payment_label_input").attr(
        "placeholder",
        "Enter " + paySubTypes[0].paymentLabel.toLowerCase()
    );
    $.each(paySubTypes, (i) => {
        const { paymentCode, paymentDescription } = paySubTypes[i];
        const option = `<option value='${paymentCode}' >${paymentDescription} </option>`;
        $("#payment_subtype").append(option);
    });
    $("#payment_subtype")
        .on("change", function () {
            const i = document.getElementById("payment_subtype").selectedIndex;

            const type = $("#edit_modal").attr("data-type");
            let img = "assets/images/add.png";
            console.log(i);
            if (pageData["pay_" + type].paySubTypes[i].paymentLogo) {
                img =
                    "data:image/jpg;base64," +
                    pageData["pay_" + type].paySubTypes[i].paymentLogo;
            }
            $("#payment_type_image").css("background-image", `url("${img}")`);
        })
        .trigger("change");
    $("#edit_modal").modal("show");
}

//editting beneficiary
async function editPaymentBeneficiary(data, type) {
    await prepareBeneficiaryForm(type, "Edit");
    $("#payment_label_input").val(data.ACCOUNT);
    $(`#payment_subtype option[value="${data.PAYEE_NAME}"]`)
        .prop("selected", true)
        .trigger("change");
    $("#beneficiary_name").val(data.NICKNAME);
    if (!pageData.beneficiary) {
        pageData.beneficiary = {};
    } // prepopulate bene form
    pageData.beneficiary.Id = data.BENE_ID;
    $("#edit_modal").modal("show");
}

function initBeneficiaryForm() {
    $("#save_btn").click(function () {
        if (!pageData.beneficiary) pageData.beneficiary = {};
        pageData.beneficiary.account = $("#payment_label_input").val();
        pageData.beneficiary.nickname = $("#beneficiary_name").val();
        pageData.beneficiary.payeeName = $("#payment_subtype").val();
        pageData.beneficiary.paymentType = $("#edit_modal").attr("data-type");
        pageData.beneficiary.mode = $("#edit_modal").attr("data-mode");

        if (
            !pageData.beneficiary.account ||
            !pageData.beneficiary.nickname ||
            !pageData.beneficiary.payeeName
        ) {
            toaster("All fields required", "warning");
            return;
        }
        saveBeneficiary(pageData.beneficiary);
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
                deleteBeneficiary(pageData.beneficiary.Id);
            }
        });
    });
}

$(document).ready(function () {
    pageData.initialModalHtml = $("#edit_modal").html();
    initBeneficiaryForm();
    $("#edit_modal").on("hidden.bs.modal", (e) => {
        $("#edit_modal").html(pageData.initialModalHtml);
        initBeneficiaryForm();
        delete pageData.beneficiary;
    });
});
