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
                              name="kodeperemajaan" value="{{$main->kode_peremajaan}}" required readonly
                              autofocus />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Varietas Lahan</label>
                            <select name="kodelahan" class="select2 form-select">
                            <option hidden value="{{$main->kode_lahan}}">{{$main->kode_lahan}}</option>
                           
                              <option value="{{$main->kode_lahan}}"></option>
                              @foreach(DB::select("SELECT * FROM data_lahan") as $lahann)
                                  <option value="{{ $lahann->kode_lahan }}">{{ $lahann->kode_lahan }}</option>
                              @endforeach
                          </select>
                                </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="flatpickr-datetime" class="form-label">Tanggal</label>
                            <input
                              class="form-control"
                              type="text"
                              value="{{$main->tanggal}}" required
                              placeholder="YYYY-MM-DD" 
                              name="tgl" 
                              id="flatpickr-date"
                               />
                          </div>

                          <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label">Kebutuhan ( Liter )</label>
                            <input class="form-control" type="number" name="kebutuhan" value="{{$main->kebutuhan}}" required />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Pupuk</label>
                            <input type="text" class="form-control"  value="{{$main->pupuk}}" required name="pupuk" />
                          </div>

                          <div class="mb-3 ">
                            <label for="state" class="form-label">Perlakuan</label>
                            <input class="form-control" type="text" value="{{$main->perlakuan}}" required name="perlakuan" placeholder="" />
                          </div>

                        </div>
                        <div class="mt-5 text-end">
                          
                          <button type="submit" id="accountActivation" class="btn btn-primary me-3">Simpan Data</button>
                          <a class="btn btn-danger" href="/data/peremajaan">Kembali </a>
                          
                          
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>



<!-- CUSTOM TANGGAL -->
<script>
  'use strict';

(function () {

  const flatpickrDate = document.querySelector('#flatpickr-date');

  if (flatpickrDate) {
    flatpickrDate.flatpickr({
      monthSelectorType: 'static'
    });
  }

})();
</script>
<!-- CUSTOM TANGGAL -->

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
            popup: 'animate__animated animate__tada'
          },
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-danger '
          },
          buttonsStyling: false
          }).then((result) => {
              if (result.isConfirmed) {
                  // Jika pengguna menekan tombol "Ya", lanjutkan dengan penyimpanan data
                  var kode_peremajaan = "{{ $main->kode_peremajaan }}";
                  var url = "{{ route('simpan.pere', ['kode_peremajaan' => ':kode_peremajaan']) }}".replace(':kode_peremajaan', kode_peremajaan);
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
                              window.location.href = "{{ route('pere') }}";
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