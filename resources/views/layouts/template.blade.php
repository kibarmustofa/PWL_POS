<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'PWL Laravel Starter Code') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('layouts.header')

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PWL - Starter Code</span>
    </a>
    @include('layouts.sidebar')
  </aside>

  <div class="content-wrapper">
    @include('layouts.breadcrumb')

    <section class="content">
      @yield('content')
    </section>
  </div>

  @include('layouts.footer')
</div>

<!-- Modal Ganti Avatar -->
<div class="modal fade" id="changeAvatarModal" tabindex="-1" role="dialog" aria-labelledby="changeAvatarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ganti Foto Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="avatarForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="text-center mb-4">
            <img src="{{ auth()->user()->foto_profil ? asset('storage/profile/' . auth()->user()->foto_profil) : asset('adminlte/dist/img/avatar.png') }}"
                 class="img-circle elevation-2" alt="Current Avatar" id="currentAvatar" width="120" height="120">
          </div>

          <div class="form-group mt-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="avatarInput" name="photo" accept="image/*">
              <label class="custom-file-label" for="avatarInput">Pilih file</label>
            </div>
            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB.</small>
          </div>

          <div class="alert alert-danger d-none" id="avatarError"></div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="saveAvatar">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

  $(function() {
    // Update nama file di label saat dipilih
    $('#avatarInput').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Reset form saat modal ditutup
    $('#changeAvatarModal').on('hidden.bs.modal', function() {
      $('#avatarForm').trigger('reset');
      $('.custom-file-label').text('Pilih file');
      $('#avatarError').addClass('d-none').html('');
    });

    // Submit form via AJAX
    $('#avatarForm').on('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      $('#avatarError').addClass('d-none').html('');
        console.log("{{ url('profile/update-avatar')}}");
        
      $.ajax({
        url: "{{ url('profile/update-avatar') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#saveAvatar').html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...').attr('disabled', true);
        },
        success: function(response) {
          const newPhotoUrl = response.photo_url;
          $('#avatarDropdown img').attr('src', newPhotoUrl);
          $('.dropdown-item img[alt="User Image"]').attr('src', newPhotoUrl);

          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response.message,
            timer: 2000,
            showConfirmButton: false
          });

          $('#changeAvatarModal').modal('hide');
        },
        error: function(xhr) {
          $('#saveAvatar').html('Simpan').attr('disabled', false);
          if (xhr.status === 422) {
            const errors = xhr.responseJSON.errors;
            if (errors.photo) {
              $('#avatarError').removeClass('d-none').html(errors.photo[0]);
            }
          } else {
            $('#avatarError').removeClass('d-none').html('Terjadi kesalahan. Silakan coba lagi.');
          }
        },
        complete: function() {
          $('#saveAvatar').html('Simpan').attr('disabled', false);
        }
      });
    });
  });
</script>
@stack('js')
</body>
</html>
