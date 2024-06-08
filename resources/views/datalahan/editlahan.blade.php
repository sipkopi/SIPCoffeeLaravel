@extends('layout.body')
@section('konten')


<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>

 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



                    <div class="card mb-4">
                    <h3 class="card-header">Edit Data Lahan</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    {{-- <form id="formAccountSettings" action="/data/lahan/update/{{$main->kode_lahan}}" method="POST" enctype="multipart/form-data" data-kode-lahan="{{ $main->kode_lahan }}"> --}}
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
                              name="kodelahan" value="{{$main->kode_lahan}}" required readonly
                              autofocus />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">User</label>
                            <select name="user" placeholder=""  class="select2 form-select">
                              
                            <option value="{{$main->user}}">{{$main->user}}</option>
                            <option hidden value=""></option>
                            @foreach ($alluser as $p)
                        
                            <option value="{{$p->user}}">{{$p->nama}}</option>
                            @endforeach
                                </select>
                          </div>

                          <div class="mb-3 col-md-6">
                          <label for="emailLarge" class="form-label">Varietas Pohon</label>
                          <input type="text" name="vari" value="{{$main->varietas_pohon}}" oninput="validateInput(this)" required class="form-control" />
                          <span id="error-message" style="color: cyan;"></span>  
                        </div>

                          <div class="row mb-3 mt-1">

                              <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Total Bibit ( Pohon )</label>
                              <input type="number" name="bibit" value="{{$main->total_bibit}}" required class="form-control" />
                                </div>

                                <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Luas Lahan ( M ² )</label>
                                  <input type="number" name="luas" value="{{$main->luas_lahan}}" required class="form-control" />
                                </div>

                                 <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Ketinggian Tanam ( Meter )</label>
                                  <input type="number" name="tinggi" value="{{$main->ketinggian_tanam}}" required class="form-control" />
                                </div>

                                </div>

                          <div class="mb-3 ">
                            <label for="flatpickr-datetime" class="form-label">Tanggal</label>
                            <input
                              class="form-control"
                              type="text"
                              value="{{$main->tanggal}}" required
                              placeholder="YYYY-MM-DD HH:MM" 
                              name="tgl" 
                              id="flatpickr-date"
                               />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Latitude</label>
                            <input class="form-control" type="text" value="{{$main->latitude}}" required name="latitude" placeholder="" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Longtitude</label>
                            <input class="form-control" type="text" value="{{$main->longtitude}}" required name="longtitude" placeholder="" />
                          </div>

                        </div>
                        <div class="mt-5 text-end">
                          
                          <button type="submit" id="accountActivation" class="btn btn-primary me-3">Edit Data</button>
                          <a class="btn btn-danger" href="/data/lahan">Kembali </a>

                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>

<!-- CUSTOM hanya Huruf -->
<script>
  function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890!#^&*.?/|\)({}}''"",<>:;]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }
</script>
<!-- CUSTOM hanya Huruf -->

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






{{-- CUSTOM COBA EDIT --}}

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
                var kode_lahan = "{{ $main->kode_lahan }}";
                var url = "{{ route('simpan.lahan', ['kode_lahan' => ':kode_lahan']) }}".replace(':kode_lahan', kode_lahan);
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
                            window.location.href = "{{ route('lahan') }}";
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


@endsection