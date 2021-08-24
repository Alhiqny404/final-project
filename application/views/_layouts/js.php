<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?=assets_dashboard() ?>js/bootstrap.bundle.min.js"></script>
<script src="<?=assets_dashboard() ?>js/metisMenu.min.js"></script>
<script src="<?=assets_dashboard() ?>js/waves.min.js"></script>
<script src="<?=assets_dashboard() ?>js/jquery.slimscroll.min.js"></script>
<!-- Sweet-Alert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

<!-- App js -->
<script src="<?=assets_dashboard() ?>js/app.js"></script>
<script src="<?=assets_dashboard() ?>js/custom-functions.js"></script>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>