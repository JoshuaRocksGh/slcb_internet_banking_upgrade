<!-- Center modal content -->
<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1054">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pinCodeModal">
            <div class="modal-header text-center ">
                ENTER TRANSACTION PIN </div>
            <form action="#" class="body transfer_pin_modal" autocomplete="off" aria-autocomplete="off">
                <input type="text" name="user_pin" maxlength="4" autocomplete="off" aria-autocomplete="off"
                    class="form-control key hide_on_print" id="user_pin"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <button class="btn btn-info" type="submit" id="transfer_pin" data-dismiss="modal">Submit</button>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<style>
    .pinCodeModal {
        max-width: 25rem;
        border-radius: 1.2rem;
    }

    .pinCodeModal .modal-header {
        font-weight: bold;
        align-self: center;
        padding: 2rem 0 0 0;
        padding: 2rem 0 1rem 0;
        color: #525151;
        font-size: 1.2rem;

    }

    .pinCodeModal .btn {
        width: 100%;
        font-size: 1.2rem;
        padding: 0.75rem 0.9rem;
    }

    .pinCodeModal .body {
        padding: 0;
        text-align: -moz-center;
        text-align: -webkit-center;
    }

    .pinCodeModal .body .form-control {
        border-radius: 0.8rem;
        /* border: 4px solid #4d90fe; */
        border: 4px solid #17a2b8;

        margin-bottom: 2rem;
        box-shadow: inset 0 0 10px 0px #dedede;
        height: 50px;
        text-align: center;
        font-size: 75px;
    }
</style>
<style>
    @font-face {
        font-family: 'password';
        font-style: normal;
        font-weight: 400;
        src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
    }
</style>