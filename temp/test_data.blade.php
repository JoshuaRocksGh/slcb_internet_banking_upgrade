@extends('layouts.master')

@section('styles')
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css" />
@endsection

@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <!-- <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                                <li class="breadcrumb-item active">Contacts</li>
                                            </ol>
                                        </div> -->
                    <h4 class="page-title">SELL USL PINS</h4>
                    <b><i>Below are Available Pins for Sale. Please select any to Sell to the Prospective Student</i></b>
                    <br><br>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table mb-0 dt-responsive table table-bordered table-striped" id="transTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pin</th>
                                    <!-- <th>REFERENCE</th> -->
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    {{-- <th>Period</th>
                                                    <th>Amount</th>
                                                    <th>Date</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($pins))
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($pins as $pin)
                                        @php
                                            $p = $pin->Pin;
                                        @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ substr($p, 0, 5) . '##########' . substr($p, -5) }}</td>
                                            <td>{{ $pin->PinCost }}</td>
                                            <td>{{ $pin->Status }}</td>
                                            <td>{{ $pin->GeneratedDate }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm pin_btn"
                                                    data-pin="{{ json_encode($pin) }}" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                    View Details
                                                </button>
                                            </td>


                                        </tr>

                                        @php
                                            $count = $count + 1;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->

        </div>
        <!-- end row -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">PIN DETAILS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('pay-usl-pins') }}" method="post">
                                    @csrf
                                    <h4><span class="text-primary">Bank Name: &nbsp;</span> <span
                                            class="bank_name"></span></h4>
                                    <h4><span class="text-primary">Account Name: &nbsp;</span> <span
                                            class="account_name"></span></h4>
                                    <h4><span class="text-primary">Account Number: &nbsp;</span> <span
                                            class="account_number"></span></h4>
                                    <h4><span class="text-primary">Amount: &nbsp;</span> <span
                                            class="pin_cost"></span></h4>
                                    <h3><span class="text-primary">Pin: &nbsp;</span> <span class="pin_code"></span>
                                    </h3>
                                    <h4><span class="text-primary">Status: &nbsp;</span> <span
                                            class="pin_status"></span></h4>
                                    <h4><span class="text-primary">Generated Date: &nbsp;</span> <span
                                            class="pin_generated_date"></span></h4>
                                    <legend></legend>
                                    <hr>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <label for="">Campus ID</label><br>
                                            <input type="text" class="form-control" name="campus_id" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="">Buyer Name</label><br>
                                            <input type="text" class="form-control" name="buyer_name" required>
                                            <input type="hidden" class="form-control _account_number" name="account_number">
                                            <input type="hidden" class="form-control _pin" name="pin">
                                            <input type="hidden" class="form-control _pin_cost" name="pin_cost">
                                            <input type="hidden" class="form-control _pin_status" name="bank_status">
                                            <input type="hidden" class="form-control _bank_name" name="bank_name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Buyer Telephone</label><br>
                                            <input type="text" class="form-control" name="buyer_telephone" required>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Post Payment </button>

                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script> -->
    <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script> -->
    <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <!-- <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script> -->
    <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <script type="text/javascript">
        ! function(e) {
            "use strict";
            var i = function() {};
            i.prototype.init = function() {
                e("#datefrom").flatpickr({
                    altInput: !0,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d"
                }), e("#dateto").flatpickr({
                    altInput: !0,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d"
                })
            }, e.FormPickers = new i, e.FormPickers.Constructor = i
        }(window.jQuery),
        function(e) {
            "use strict";
            e.FormPickers.init()
        }(window.jQuery);

        function formatToCurrency(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        }
        $(document).ready(function() {
            $('#transTable').DataTable({
                dom: 'Bfrtip',
                lengthChange: !1,
                //buttons: ["print", "csv","pdf"],
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });



            $('.pin_btn').click(function() {
                let pin = $(this).data('pin')
                let p = pin.Pin;

                $('.bank_name').text('')
                $('.account_name').text('')
                $('.account_number').text('')
                $('.pin_cost').text('')
                $('.pin_code').text('')
                $('.pin_status').text('')
                $('.pin_generated_date').text('')

                $('.bank_name').text(pin.BankName)
                $('.account_name').text(pin.AccountName)
                $('.account_number').text(pin.AccountNumber)
                $('.pin_cost').text(formatToCurrency(parseFloat(pin.PinCost)))
                $('.pin_code').text(p[0] + p[1] + p[2] + p[3] + p[4] + p[0] + '#########' + p.slice(-4))
                $('.pin_status').text(pin.Status)
                $('.pin_generated_date').text(pin.GeneratedDate)

                $('._bank_name').val(pin.BankName)
                $('._account_name').val(pin.AccountName)
                $('._account_number').val(pin.AccountNumber)
                $('._pin_cost').val(pin.PinCost)
                $('._pin').val(pin.Pin)
                $('._pin_status').val(pin.Status)

                console.log(pin)

            })




        });
    </script>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("formcode").value;
            document.getElementById("amount").value = x;
        }


        $("#transSearch").submit(function(event) {
            var x = document.getElementById("datefrom").value;
            var y = document.getElementById("dateto").value;

            if (x === '') {
                alert("Please specify the start date");
                return false;
            } else if (y === '') {
                alert("Please specify the end date");
                return false;
            } else {
                return true;
            }
            // event.preventDefault();
        });

        function validate() {
            var x = document.getElementById("datefrom").value;
            var y = document.getElementById("dateto").value;

            alert(x);
            if (x === '') {
                {{-- alert('hmmmm'); --}}
                return false;
            } else if (y === '') {
                return false;
            } else {
                return true;
            }
        }
    </script>
@endsection
