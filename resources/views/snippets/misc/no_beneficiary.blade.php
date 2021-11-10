@php
$noSavedBeneficiaries = "<div class='nodata row text-center'><img class='col-12 mb-2 mx-auto'
        src='assets/images/placeholders/add_files.svg' alt='no data available' style='max-width:100px'><span
        class='no-data-text col-12 mx-auto text-info'>You have no saved beneficiaries</span></div>"
@endphp
<script>
    var noSavedBeneficiariesOption = '<option disabled data-content="' + @json($noSavedBeneficiaries) + '"> </option>'
</script>