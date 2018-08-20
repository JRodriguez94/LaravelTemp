<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
  window.App = {!! json_encode([
        'csrfToken' => csrf_token(),
        'api' => '/api/v1',
    ]) !!};

  $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
  activeOption = 'home';
</script>

@stack('scripts')

<script>
  var errorMessage = 'Ocurrió un error, intente de nuevo o recargue la pagina.';
  function swalSuccess(message) {
    swal({
      type: 'success',
      title: message,
    }).catch(swal.noop)
  }
  $(function () {
    $("#side-menu #" + activeOption).addClass('active');
    setTimeout(function () {
      $(".alert").slideUp(1000, function () {
        $(this).alert('close')
      });
    }, 2000);
  })
</script>