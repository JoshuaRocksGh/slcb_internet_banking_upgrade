<div class="site-card px-4 h-100">


    {{-- =============================================================== --}}
    {{-- Sender Account Info --}}
    {{-- =============================================================== --}}

    <h3 class="text-primary transfer-detail-header">Sender Account Info</h3>
    <hr class="mt-0">
    <div class="row ">
        <p class="col-md-5 transfer-detail-text">Sender Name:</p>
        <span class="text-primary display_from_account display_from_account_name col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">Sender Account:</p>
        <span class="text-primary display_from_account display_from_account_no col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">Available Balance:</p>
        <span class="text-primary display_from_account display_from_account_balance col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">Account Currency:</p>
        <span class="text-primary display_from_account display_from_account_currency col-md-7"></span>
    </div>


    {{-- =============================================================== --}}
    {{-- Receiver Account Info --}}
    {{-- =============================================================== --}}

    <h3 class="text-primary transfer-detail-header">Receiver Account Info</h3>
    <hr class="mt-0">
    <div class="row">
        @if ($currentPath === 'Local Bank')
        <p class="col-md-5 transfer-detail-text">Bank Name:</p>
        <span class="text-primary display_to_account display_to_bank_name col-md-7"></span>
        @endif
        <p class="col-md-5 transfer-detail-text">Receiver Name:</p>
        <span class="text-primary display_to_account display_to_account_name col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">Receiver Account:</p>
        <span class="text-primary display_to_account display_to_account_no col-md-7"></span>
        @if ($currentPath !== 'Own Account')
        @if ($currentPath !== 'Local Bank' && $currentPath !== 'International Bank')
        <p class="col-md-5 transfer-detail-text">Account Currency:</p>
        <span class="text-primary display_to_account display_to_account_currency col-md-7"></span>

        @endif
        <p class="col-md-5 transfer-detail-text">Receiver Email:</p>
        <span class="text-primary display_to_account display_to_receiver_email col-md-7"></span>
        @endif
        {{-- <p class="col-md-5 transfer-detail-text">Account Currency:</p>
            <span class="text-primary display_to_account display_to_account_currency col-md-7"></span> --}}

        @if ($currentPath === 'Local Bank' || $currentPath === 'International Bank')

        <p class="col-md-5 transfer-detail-text">Receiver Address:</p>
        <span class="text-primary display_to_account display_to_account_address col-md-7"></span>

        @endif

    </div>

    {{-- =============================================================== --}}
    {{-- Transfer Info --}}
    {{-- =============================================================== --}}

    <h3 class="text-primary transfer-detail-header">Transfer Info</h3>
    <hr class="mt-0">
    <div class="row">
        @if ($currentPath === 'Local Bank')
        <p class="col-md-5 transfer-detail-text">Transfer Type:</p>
        <span class="text-primary display_to_account display_to_transfer_type col-md-7"></span>
        @endif
        <p class="col-md-5 transfer-detail-text">Transfer Amount:</p>
        <span class="row col-md-7">
            <span class="text-danger display_transfer_currency col-md-4"></span>
            <span class="text-danger display_transfer_amount col-md-8"></span>

        </span>
        @if ($currentPath === 'Standing Order')

        <p class="col-md-5 transfer-detail-text ">Start Date:</p>
        <span class="text-primary display_so_start_date col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">End Date:</p>
        <span class="text-primary display_so_end_date col-md-7"></span>

        <p class="col-md-5 transfer-detail-text">Frequency:</p>
        <span class="text-primary display_frequency_so col-md-7"></span>
        @endif
        {{-- <p class="col-md-5 transfer-detail-text">Currency Rate:</p>
            <span class="text-primary display_midrate col-md-7"></span>

            <p class="col-md-5 transfer-detail-text">Converted Amount:</p>
            <span class="text-primary display_converted_amount col-md-7"></span> --}}

        <div class="col-12 mt-0 mb-2">
            <hr style="margin-top: 2px; margin-bottom: 5px;">

            <hr style="margin-top: 2px; margin-bottom: 5px;">
        </div>

        <p class="transfer-detail-text text-primary col-md-5">Transaction Fee:</p>
        <span class="text-danger transfer-detail-text text-bold col-md-7">0.00</span>
    </div>
</div>