<!-- Modal -->
<style>
    .detail-card {
        border-radius: 15px;
        border: 1px rgb(247 247 247) solid;
        box-shadow: 2px 2px 1px #d3d3d3;
    }

    .total {
        box-shadow: 2px 2px 1px #35a4bf;
        border: none;
    }

    .d-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }
</style>
<div class="modal fade" id="payment_verification_modal" tabindex="-1" role="dialog"
    aria-labelledby="payment_verification_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 27rem;">
            <div class="modal-header">
                <div class="close mx-0">
                    <span aria-hidden="true"></span>
                </div>
                <h5 class="modal-title mx-auto font-weight-bold font-20 text-primary text-uppercase">Payment summary
                </h5>
                <button type="button" class="close mx-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class='mx-3 py-3 row justify-content-center mb-1 detail-card'>
                    <div class='account-icon'><span id="details_icon_text">A</span></div>
                    <div class='ml-3'>
                        <div class='font-16 font-weight-bold' id="details_recipient_name"></div>
                        <div class='font-14 text-center' id="details_recipient_number"></div>
                    </div>
                </div>
                <div class='mx-3 px-3 py-1 mb-1 detail-card'>
                    <div class='font-14 py-2 font-weight-bold text-primary'>Details</div>
                    <div class="d-item">
                        <span> from</span><span class="font-weight-bold" id="details_from_account"> </span>
                    </div>
                    <div class="d-item">
                        <span> To</span><span class="font-weight-bold" id="details_to_account"> </span>

                    </div>
                    <div class="d-item">
                        <span> Amount</span><span class="font-weight-bold" id="details_amount"> </span>
                    </div>
                    <div class="d-item">
                        <span> Narration</span><span class="font-weight-bold" id="details_narration"> </span>

                    </div>
                    <div class="d-item">
                        <span> Expense Type</span><span class="font-weight-bold" id="details_expense_type"> </span>
                    </div>
                    <div class="d-item">
                        <span> Transaction Fee</span><span class="font-weight-bold" id="details_trans_fee"> </span>
                    </div>

                </div>
                <div class='mx-3 px-3 py-1 detail-card total bg-info'>
                    <div class="d-item text-white my-1 font-weight-bold">
                        <span> TOTAL</span><span id="details_total_amount">SLL xxx</span>

                    </div>
                </div>
                <div class="alert mx-3 font-11 mb-1 px-3 rounded mt-4 alert-info" role="alert">
                    <i class="fas font-13 alert-link mr-1 fa-exclamation-circle"></i> <span>By proceeding you agree to
                        abide by our terms and conditions</span>
                </div>
                <div class='mx-3'>
                    <button type="button" data-dismiss="modal" id="confirm_transfer_button"
                        class="btn btn-info font-weight-bold btn-block btn-rounded py-2 mb-4">PROCEED</button>
                </div>

            </div>
        </div>
    </div>
</div>