function saveBeneficiary(data) {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "save-transfer-beneficiary-api",
        datatype: "application/json",
        data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (res) => {
            siteLoading("hide");
            if (res.responseCode === "000") {
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
