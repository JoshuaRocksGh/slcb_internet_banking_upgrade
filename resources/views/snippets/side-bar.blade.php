<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu pt-3" style="background-image: linear-gradient( #ffffff, #ffffff);">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id=" side-menu">
                <li>
                    <a href="{{ url('home') }}">
                        <i class="mdi mdi-home-outline"></i>
                        <span> Home</span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarMyAccount" data-toggle="collapse">
                        <i class="mdi mdi-book-account-outline"></i>
                        <span> Account</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMyAccount">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{ url('account-enquiry') }}">Account Enquiry</a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li>
                    <a href="#sidebarTransfer" data-toggle="collapse">
                        <i class="mdi mdi-rotate-3d-variant"></i>
                        <span> Transfers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTransfer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('own-account') }}">Own Account</a>
                            </li>
                            <li>
                                <a href="{{ url('same-bank') }}">Same Bank</a>
                            </li>
                            <li>
                                <a href="{{ url('local-bank') }}">Other Bank</a>
                            </li>
                            <li>
                                <a href="{{ url('international-bank') }}">International Bank</a>
                            </li>
                            <li>
                                <a href="{{ url('standing-order') }}">Standing Order</a>
                            </li>
                            @if (config('app.corporate'))
                                <li>
                                    <a href="{{ url('bulk-transfer') }}">Bulk Transfer </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('transfer-status') }}">Transfer Status</a>
                            </li>
                            <li>
                                <a href="{{ url('beneficiary-list') }}">Beneficiaries</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarBeneficiary" data-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span>Payments </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBeneficiary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('payments') }}">Make Payment</a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('cardless-payment') }}">Cardless</a>
                            </li> --}}
                            <li>
                                <a href="{{ url('salone-link') }}">Salone Link</a>
                            </li>
                            <li>
                                <a href="{{ url('qr-payment') }}">
                                    <span> QR Payment</span>
                                </a>
                            </li>

                            @if (config('app.corporate'))
                                <li>
                                    <a href="{{ url('bulk-salone-link') }}">Bulk Salone Link</a>
                                </li>

                                <li>
                                    <a href="{{ url('schedule-payment') }}">Schedule Payment</a>
                                </li>
                                <li>
                                    <a href="{{ url('bulk-upload-payment') }}">Bulk Upload (Mobile Money)</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('payment-beneficiary-list') }}">Beneficiaries</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarLoans" data-toggle="collapse">
                        <i class="mdi mdi-briefcase-check-outline"></i>
                        <span> Loans </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarLoans">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('loan-request') }}">Loan Request</a>
                            </li>
                            <li>
                                <a href="#">Loan Payment</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#investmentSetting" data-toggle="collapse">
                        {{-- {{ url('my-investments') }} --}}
                        <i class="fas fa-hand-holding-usd"></i>
                        <span> Investments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="investmentSetting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('fixed-deposit') }}">Fixed Deposit</a>
                            </li>
                            <li>
                                <a href="{{ url('my-investments') }}">Current Investment</a>
                            </li>
                        </ul>

                    </div>
                </li>
                <li>
                    <a href="#sidebarAccountServices" data-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Account Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAccountServices">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('cheque-book-request') }}">Cheque Book Request </a>
                            </li>
                            <li>
                                <a href="{{ url('confirm-cheque') }}">Cheque Status</a>
                            </li>
                            <li>
                                <a href="#sidebarChequeApprovals" data-toggle="collapse">
                                    <span>Cheque Approvals</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarChequeApprovals">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ url('cheque-approvals-pending') }}">Pending</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('cheque-approvals-approved') }}">Approved</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('cheque-approvals-rejected') }}">Rejected</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarRequests" data-toggle="collapse">
                                    <span> Requests </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarRequests">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ url('request-for-letter') }}">Request For Letter</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('request-statement') }}">Statement Request</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('request-draft') }}">Request bank draft</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ url('open-additional-account') }}">Open additional account</a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('complaint') }}">
                                    <span>Make Complaint</span>
                                </a>
                            </li> --}}

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarTasks" data-toggle="collapse">
                        <i class="far fa-credit-card"></i>
                        <span> Card Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('request-atm') }}">Request Card</a>
                            </li>
                            <li>
                                <a href="{{ url('activate-card') }}">Activate Card</a>
                            </li>
                            <li>
                                <a href="{{ url('block-debit-card') }}">Block Debit Card</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ url('budgetting') }}">
                        <i class="fas fa-file-invoice-dollar"></i> <span> Budgetting</span>
                    </a>
                </li>
                @if (config('app.corporate'))
                    <li>
                        <a href="#approvals" data-toggle="collapse">
                            <i class="mdi mdi-checkbox-multiple-marked-outline"></i>
                            <span> Approvals </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="approvals">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ url('approvals-pending') }}">Pending</a>
                                </li>
                                <li>
                                    <a href="{{ url('approvals-approved') }}">Approved</a>
                                </li>
                                <li>
                                    <a href="{{ url('approvals-rejected') }}">Rejected</a>
                                </li>
                                {{-- <li>
                                    <a href="#">All</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                @endif
                <li><a href="#sidebarSetting" data-toggle="collapse">
                        <i class="mdi mdi-cog-outline"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSetting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('set-transaction-limit') }}">Set Transaction Limits</a>
                            </li>
                            @if (config('app.corporate'))
                                <li>
                                    <a href="{{ url('update-company-info') }}">Update Company Information</a>
                                </li>
                            @endif
                            @if (!config('app.corporate'))
                                <li>
                                    <a href="{{ url('change-pin') }}">Pin Setup</a>
                                </li>
                            @endif
                        </ul>
                    </div>

                </li>
                <li>
                    <a href="#locatorSetting" data-toggle="collapse">

                        <i class="mdi mdi-map-marker-outline"></i>
                        <span> Locator </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="locatorSetting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('branch-locator') }}">Branch</a>
                            </li>
                            <li>
                                <a href="">Atm</a>
                            </li>
                            <li>
                                <a href="">Agent</a>
                            </li>
                        </ul>

                    </div>
                </li>

                <li>
                    <a href="logout" id="sidebar_logout">
                        <i data-feather="power" class="icon-dual-activity"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
