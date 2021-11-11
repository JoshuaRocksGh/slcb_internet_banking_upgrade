<!-- Third Party js-->
{{-- <script src="{{ asset('land_asset/js/jquery.min.js') }}"></script> --}}


<script type="text/javascript">
    if (typeof jQuery === 'undefined') {
        var oScriptElem = document.createElement("script");
        oScriptElem.type = "text/javascript";
        oScriptElem.src = "http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js";
        document.head.insertBefore(oScriptElem, document.head.getElementsByTagName("script")[0])
    }
</script>
<script src="{{ asset('assets/js/vendor.min.js') }}" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script src="{{ asset('assets/js/app.min.js') }}" defer></script>
<script src="{{ asset('assets/js/functions/getAccounts.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

<script defer>
    function formatToCurrency(amount) {
        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    };
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>

<script defer>
    const ACCOUNT_NUMBER_LENGTH = 13
    $("input[type=number]").on("focus", function() {
        $(this).on("keydown", function(event) {
            if (event.keyCode === 38 || event.keyCode === 40) {
                event.preventDefault();
            }
        });
    });

    function transactionSuccessToaster(message, timer = 3000) {
        Swal.fire({
            title: "Transaction Successful",
            text: message,
            imageUrl: 'land_asset/images/statement_success.gif',
            imageHeight: "10rem",
            width: "20rem",
            imageAlt: 'success image',
            confirmButtonColor: "#0388cb",
            timer: timer
        })
    }

    function toaster(message, icon, timer = 3000) {
        let color = "#17a2b8"
        if (icon.constructor === String) {
            if (icon.toLowerCase() === "success") {
                color = "#1abc9c"
            } else if (icon.toLowerCase() === "warning") {
                color = "#fd7e14"
            } else if (icon.toLowerCase() === "error") {
                color = "#dc3545"
            }
            Swal.fire({
                html: `<span class="font-16 ">${message}</span>`,
                icon: icon,
                confirmButtonColor: color,
                width: 400,
                // timer: timer
            })
        }
    }

    function formatToCurrency(amount) {
        return parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    }

    function validateAll(...args) {
        for (arg of args) {
            if (arg === "" || arg === undefined || arg === null || arg == NaN) {
                return false
            }
        }
        return true
    }

    function somethingWentWrongHandler() {
        toaster("Something went wrong ... please hold on", "error", 3000)
        setTimeout(() => {
            location.reload();
        }, 3000);
    }

    function siteLoading(state) {
        if (state === "show") {
            $(".preloader").fadeIn(500);
            $("#preloader").css("background-color", "#FADADA")
            return
        }
        $(".preloader").fadeOut(500);
        $("#preloader").css("background-color", "#fff")
        return
    }

    //intitialize all form-control to bootstrap select
</script>


<script type='text/javascript'>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>

<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'>
</script>

<script>
    $.ajaxSetup({
        timeout: 3000,
        retryAfter: 5000
    });
</script>
