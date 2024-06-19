@extends('layout.body')
@section('konten')


<script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>
 
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
    <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

    
<!-- /edit kopi -->

<div class="card mb-4">
                    <h3 class="card-header">Edit Data Kopi</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                      <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="d-flex align-items-start align-items-sm-center mb-2 gap-4">
                      </div>
                        <div class="row">

                          <div class="mb-3 ">
                            <label for="firstName" class="form-label">Kode Lahan</label>
                            <input
                              class="form-control"
                              type="text"
                              name="kdkopi" value="{{$main->kode_kopi}}" required readonly
                              autofocus />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Kode Peremajaan</label>
                            <select name="pere" class="select2 form-select">
                            <option hidden value="{{$main->kode_peremajaan}}">{{$main->kode_peremajaan}}</option>
                            <option value=""></option>
                            <?php
                            $data = DB::table('data_peremajaan')->select('kode_peremajaan')->get();
                            if (count($data) > 0) {
                              foreach ($data as $data) {
                                echo "<option value='" . $data->kode_peremajaan . "'>" . $data->kode_peremajaan . "</option>";
                              }
                            } else {
                              echo "<option value=''>Data lahan tidak tersedia</option>";
                            }
                            ?>
                                </select>
                          </div>

                          <div class="mb-3 col-md-6">
                          <label for="emailLarge" class="form-label">Varietas Kopi</label>
                            <input class="form-control" type="text" name="vari" id="inputHuruf" oninput="validateInput(this)" value="{{$main->varietas_kopi}}" required />
                          
                          </div>

                          <div class="row mb-3 mt-1">

                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Metode Pengolahan</label>
                              <select id="defaultSelect" name="metode" class="form-select">
                                    <option value="{{$main->metode_pengolahan}}">{{$main->metode_pengolahan}}</option>
                                    <option value=""></option>
                                    <option value="Natural">Natural</option>
                                    <option value="Full Wash">Full Wash</option>
                                    </select>
                              </div>
    
                              <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Stok Produk</label>
                                <input type="number" placeholder="750" required name="stok" value="{{$main->stok}}"  class="form-control"  />
                              </div>
    
    
                              <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Berat</label>
                                <input class="form-control" type="number" name="berat" value="{{$main->berat}}" required />
                              </div>

                          </div>

                          <div class="row mb-3 mt-1">

                              <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Tanggal Panen</label>
                                  <input type="text" name="tglpan" value="{{$main->tgl_panen}}" required id="flatpickr-date" class="form-control" placeholder="" />
                                </div>
                                <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Tanggal Roasting</label>
                                  <input type="text" name="tglroas" value="{{$main->tgl_roasting}}" required id="flatpickr-datee" class="form-control" placeholder="" />
                                </div>

                                 <div class="col mb-0">
                                 <label for="emailLarge" class="form-label">Tgl Expired</label>
                                  <input type="text" name="tglexp" value="{{$main->tgl_exp}}" required id="flatpickr-dateee" class="form-control" placeholder="" />
                                </div>

                                </div>

                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Harga Kopi ( /Gram )</label>
                                  <input type="text" name="harga" required value="{{$main->harga}}" class="form-control" placeholder="125000" />
                                </div>

                          <div class="mb-3">
                          <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea type="text" name="desk" class="form-control mt-1 mb-4"  rows="4">{{$main->deskripsi}}</textarea>
                          </div>

                          <div class="mb-3 col-md-6 mt-3 mb-4">
  <h6 for="exampleFormControlTextarea1">Gambar 1</h6>
  <div class="d-flex align-items-start align-items-sm-center mb-4 gap-4">
    <img
      src="{{$main->gambar1}}"
      alt="Gambar Produk"
      class="d-block w-px-200 h-px-200 rounded"
      name="upload1" 
      id="uploadedAvatar" />
    <div class="button-wrapper">
      <label for="upload1" class="btn btn-primary me-2 mb-3" tabindex="0"> <!-- Ganti "for" ke "upload1" -->
        <span class="d-none d-sm-block">Upload Foto Baru</span>
        <i class="ti ti-upload d-block d-sm-none"></i>
        <input
          type="file"
          id="upload1"
          name="upload11" 
          class="account-file-input"
          value="gambar1"
          hidden
          accept="image/png, image/jpeg" />
      </label>
      <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Reset</span>
      </button>
      <div class="text-muted">Diperbolehkan bentuk JPG, GIF or PNG. Maximum 5MB</div>
    </div>
  </div>
</div>



                        </div>
                        <div class="mt-5 text-end mb-2">
                          
                          <button type="submit" id="accountActivation" class="btn btn-primary me-3">Edit Data</button>
                          <a class="btn btn-danger" href="/data/kopi">Kembali </a>
                        </div>
                        </form>
                    </div>
                
                  </div>
<!-- /edit kopi -->

<!-- ALERT  EDIT -->
<script>
  $(document).ready(function() {
      $('#editForm').submit(function(e) {
          e.preventDefault();
  
          Swal.fire({
          title: 'Apakah Anda yakin ingin mengedit data {{ $main->kode_kopi }}?',
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
                  var kode_kopi = "{{ $main->kode_kopi }}";
                  var url = "{{ route('simpan.kopi', ['kode_kopi' => ':kode_kopi']) }}".replace(':kode_kopi', kode_kopi);
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
                              window.location.href = "{{ route('kopi') }}";
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
  
<!-- ALERT  EDIT -->



<!-- CUSTOM TANGGAL -->
<script>
  'use strict';
(function () {

  const flatpickrDate = document.querySelector('#flatpickr-date'),
   flatpickrDatepanen = document.querySelector('#flatpickr-datee'),
   flatpickrDateexp = document.querySelector('#flatpickr-dateee');

  if (flatpickrDate) {
    flatpickrDate.flatpickr({
      monthSelectorType: 'static'
    });
  }

  if (flatpickrDatepanen) {
    flatpickrDatepanen.flatpickr({
      monthSelectorType: 'static'
    });
  }

  if (flatpickrDateexp) {
    flatpickrDateexp.flatpickr({
      monthSelectorType: 'static'
    });
  }
})();
</script>
<!-- CUSTOM TANGGAL -->



<script>

// TIDAK BOLEH INPUT ANGKA
function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890!#^&*]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }


// UPDATE GAMBAR 1
document.addEventListener('DOMContentLoaded', function () {
  (function () {
    // Update/reset user image on the account page
    const accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input');
    const resetFileInput = document.querySelector('.account-image-reset');

    if (accountUserImage) {
      const resetImage = accountUserImage.src;

      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
      };

      resetFileInput.onclick = () => {
        fileInput.value = '';
        accountUserImage.src = resetImage;
      };
    }
  })();
});



</script>



@endsection