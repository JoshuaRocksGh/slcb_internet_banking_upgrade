{{-- <section class="col-md-7 px-3"> --}}

<div class="site-card h-100 " id="transaction_summary" style="display:none">
    <div class="container">

        <div class="row justify-content-center">
            <br>
            <div class="table-responsive card table_over_flow">
                <table class="table mb-0 table-bordered table-striped  ">

                    <tbody>
                        <tr class="success_gif show-on-success" style="display: none">
                            <td class="text-center bg-white" colspan="2">
                                <img src="{{ asset('land_asset/images/statement_success.gif') }}" style="zoom: 0.5"
                                    alt="">
                            </td>
                        </tr>
                        <tr class="show-on-success" style="display: none">
                            <td class="text-center bg-white" colspan="2">
                                <span class="text-success font-13 text-bold " id="success-message"></span>
                            </td>
                        </tr>
                        <tr class=" show-on-success" style="display: none">
                            <td class="text-center bg-white" colspan="2">
                                <div class="row" style="place-content: space-evenly">
                                    <button class="btn my-1 btn-primary" onclick="location.reload()"> make another
                                        transfer
                                    </button>
                                    <button class="btn my-1 btn-primary" id="save_as_beneficiary" style="display: none">
                                        save as beneficiary
                                    </button>
                                    @if ($currentPath === "Same Bank")
                                    <button class="btn my-1 btn-primary"> make reccuring </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sender Details:</td>
                            <td>
                                <span class="d-block font-13 text-primary text-bold display_from_account_name"
                                    id="display_from_account_name"> </span>
                                <span class="d-block font-13 text-primary text-bold display_from_account_no"
                                    id="display_from_account_no"></span>
                                <span class="font-13 text-primary h3 account_currency"
                                    id="display_from_account_currency">
                                </span>
                                &nbsp;
                                <span class="font-13 text-primary h3 display_from_account_balance"
                                    id="display_from_account_balance"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>Receiver Details:</td>
                            <td>
                                <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                    id="display_to_account_name"> </span>

                                <span class="d-block font-13 text-primary text-bold display_to_account_no"
                                    id="display_to_account_no"> </span>
                                @if ($currentPath !== 'International Bank' && $currentPath !== "Local Bank")
                                <span class="d-block font-13 text-primary text-bold display_to_account_currency"
                                    id="display_to_account_currency"></span>
                                @endif
                                @if ($currentPath === 'Local Bank')
                                <span class="d-block font-13 text-primary text-bold display_to_bank_name"> </span>
                                <span class="d-block font-13 text-primary text-bold display_to_account_address">
                                </span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Amount:</td>
                            <td>
                                <span class="font-13 text-success h3 account_currency" id="display_currency">
                                </span>
                                &nbsp;
                                <span class="font-13 text-success h3 display_transfer_amount"
                                    id="display_transfer_amount"></span>

                            </td>
                        </tr>
                        @if ($currentPath === 'Local Bank')
                        <tr>
                            <td>Transfer Type:</td>
                            <td>

                                <span class="font-13 text-primary h3 display_to_transfer_type"></span>

                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>Transfer Fee</td>
                            <td>
                                <span class="font-13 text-danger h3 account_currency" id="display_currency">
                                </span>
                                &nbsp;
                                <span class="font-13 text-danger h3 display_transfer_fee"
                                    id="display_transfer_fee">0.00</span>

                            </td>
                        </tr>

                        <tr>
                            <td>Purpose:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_purpose" id="display_purpose"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>Category:</td>
                            <td>
                                <span class="font-13 text-primary h3 display_category" id="display_category"></span>

                            </td>
                        </tr>
                        @if ($currentPath === 'Standing Order')
                        <tr>
                            <td>Start Date: </td>
                            <td>
                                <span class="font-13 text-primary h3 display_so_start_date"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>End Date: </td>
                            <td>
                                <span class="font-13 text-primary h3 display_so_end_date"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Frequency: </td>
                            <td>
                                <span class="font-13 text-primary h3 display_frequency_so""></span>
                            </td>
                        </tr>
                            @endif
                            <tr>
                                <td>Transfer Date: </td>
                                <td>
                                    <span class=" font-13 text-primary h3"
                                    id="display_transfer_date">{{ date('d F, Y') }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Posted By: </td>
                            <td>
                                <span class="font-13 text-primary h3"
                                    id="display_posted_by">{{ session()->get('userAlias') }}</span>
                            </td>
                        </tr>
                        <tr class="hide-on-success bg-info text-white">

                            <td colspan="2">

                                {{-- <div class="alert alert-info form-control col-md-12" role="alert"> --}}
                                <div class="custom-control custom-checkbox ">
                                    <input type="checkbox" class="custom-control-input" name="terms_and_conditions"
                                        name="terms_and_conditions" id="terms_and_conditions">
                                    <label class="custom-control-label " for="terms_and_conditions">
                                        <b>
                                            By checking this box, you agree to
                                            abide by the Terms and Conditions
                                        </b>
                                    </label>
                                </div>


                                {{-- </div> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- @include("snippets.pinCodeModal") --}}
            <br>
            <div class="form-group text-center hide-on-success">

                <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button"> <i
                            class="mdi mdi-reply-all-outline"></i>&nbsp;Back</button>
                    &nbsp; </span>
                <span>
                    &nbsp;
                    <button class="btn btn-primary btn-rounded " type="button" id="confirm_transfer_button">
                        <span id="confirm_transfer">Confirm
                            Transfer</span>
                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                            aria-hidden="true" style="display: none"></span>
                        <span id="spinner-text" style="display: none">Loading...</span>
                    </button>
                </span>

                <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button" id="print_receipt"
                        onclick="window.print()" style="display: none">Print
                        Receipt
                    </button></span>
            </div>
        </div>
    </div>
</div>
{{-- </section> --}}