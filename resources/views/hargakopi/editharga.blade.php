@extends('layout.body')
@section('konten')

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>

 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<div class="card mb-4">
                    <h3 class="card-header">Edit Data Peremajaan</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                      <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="d-flex align-items-start align-items-sm-center mb-2 gap-4">
                      </div>
                        <div class="row">

                          <div class="mb-3 ">
                            <label for="firstName" class="form-label">Kode Peremajaan</label>
                            <input
                              class="form-control"
                              type="text"
                              name="kodeperemajaan" value="{{$main->id}}" required readonly
                              autofocus />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Nama Varietas</label>
                            <input type="text" class="form-control"  value="{{$main->nama_varietas}}" required name="namav" />
                          </div>

                          <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label">Harga ( /KG )</label>
                          <input id="harga" class="form-control" type="text" name="harga" value="{{$main->harga}}" required />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Sumber</label>
                            <input type="text" class="form-control"  value="{{$main->sumber}}" required name="sumber" />
                          </div>


                        </div>
                        <div class="mt-5 text-end">
                          
                          <button type="submit" id="accountActivation" class="btn btn-primary me-3">Simpan Data</button>
                          <a class="btn btn-danger" href="/data/harga/kopi">Kembali </a>
                          
                          
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>





<!-- CUSTOM SIMPAN -->
<script>
  $(document).ready(function() {
      $('#editForm').submit(function(e) {
          e.preventDefault();
  
          Swal.fire({
          title: 'Apakah Anda yakin ingin mengedit data?',
          icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              // cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Edit Data!',
              cancelButtonText: 'Tidak',
          showClass: {
            popup: 'animate_animated animate_tada'
          },
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-danger '
          },
          buttonsStyling: false
          }).then((result) => {
              if (result.isConfirmed) {
                  // Jika pengguna menekan tombol "Ya", lanjutkan dengan penyimpanan data
                  var id = "{{ $main->id }}";
                  var url = "{{ route('simpan.hargakopi', ['id' => ':id']) }}".replace(':id', id);
                  var formData = new FormData($(this)[0]);
  
                  $.ajax({
                      url: url,
                      type: 'POST',
                      data: formData,
                      async: false,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          // Tindakan setelah penyimpanan berhasil
                          Swal.fire({
                              icon: 'success',
                              title: 'Sukses!',
                              text: response.message,
                              showConfirmButton: false,
                              timer: 1700
                          }).then(() => {
                              // Setelah 1.7 detik, arahkan kembali ke halaman /data/lahan
                              window.location.href = "{{ route('hargakopi') }}";
                          });
                      },
                      error: function(xhr, status, error) {
                          // Tindakan jika ada kesalahan
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: xhr.responseText
                          });
                      }
                  });
              }
          });
  
          return false;
      });
  });
  
  </script>
<!-- CUSTOM SIMPAN -->


@endsection