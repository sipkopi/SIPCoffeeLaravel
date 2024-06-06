@extends('layout.body')
@section('konten')

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
<script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   


                    <div class="card mb-4">
                    <h3 class="card-header">Edit User</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                      <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="d-flex align-items-start align-items-sm-center mb-4 gap-4">
                        <img
                          src="{{$main->gambar}}"
                          alt="user-avatar"
                          class="d-block w-px-100 h-px-100 rounded"
                          name="uploada"
                          id="uploadedAvatar" />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload Foto Baru</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              name="upload"
                              class="account-file-input"
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
                        <div class="row">
                          <div class="mb-3 ">
                            <label for="firstName" class="form-label">Username</label>
                            <input
                              class="form-control"
                              type="text"
                              name="user"
                              value="{{$main->user}}" readonly
                              placeholder="" required
                              autofocus />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Nama Lengkap</label>
                            <input class="form-control" id="inputHuruf" oninput="validateInput(this)" type="text" name="nama" value="{{$main->nama}}" required />
                            <span id="error-message" style="color: cyan;"></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="email"
                              value="{{$main->email}}" required
                              name="email"
                              placeholder="john.doe@example.com" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">No HP</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">ID (+62)</span>
                              <input
                                type="number"
                                value="{{$main->nohp}}" required
                                name="nohp"
                                class="form-control"
                                placeholder="" />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Lokasi</label>
                            <input type="text" class="form-control"  value="{{$main->lokasi}}" required name="lokasi" />
                          </div>
                          {{-- <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Password</label>
                            <input class="form-control" type="text" value="{{$main->pass}}"  required name="pass" placeholder="" />
                          </div> --}}

                        </div>
                        <div class="mt-5 text-end">
                          
                          <button type="submit"  id="accountActivation" class="btn btn-primary me-3">Simpan Data</button>
                          <a class="btn btn-danger" href="/akun/user">Kembali </a>
                          
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>

<script>

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
                  var user = "{{ $main->user }}";
                  var url = "{{ route('simpan.user', ['user' => ':user']) }}".replace(':user', user);
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
                              window.location.href = "{{ route('admin') }}";
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

