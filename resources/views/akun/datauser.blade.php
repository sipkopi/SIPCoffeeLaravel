@extends('layout.body')
@section('konten')

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />

                  <!-- build:js assets/vendor/js/core.js -->
     <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="{{asset('assetsadmin')}}/js/ui-modals.js"></script>
    <!-- <script src="{{asset('assetsadmin')}}/js/pages-account-settings-account.js"></script> -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>

  <!-- alert data berhasil -->
  <div class="alert alert-success" role="alert" style="display: none;">Data Akun Telah Ditambahkan!</div>


<script>
    $(document).ready(function() {
        // Tangkap parameter alert dari URL dan tampilkan alert jika ada
        var urlParams = new URLSearchParams(window.location.search);
        var alertParam = urlParams.get('alert');
        if (alertParam === 'success') {
            $('.alert').fadeIn().delay(5000).fadeOut(); // Tampilkan alert, kemudian hilangkan setelah 5 detik
        }
    });
</script>

<script>
  function showAlerte() {
      Swal.fire({
          title: 'Fitur Segera Hadir!',
          text: 'Bersabar Yah...',
          icon: 'error',
          showConfirmButton: false,
          timer: 2500
      });
  }
  </script>

<style>

  .ssedtt{
  cursor:pointer;
  }
  
  </style>

<div class="card">
        <div class="card-header">
 <div class=" d-flex flex-column mb-3 flex-md-row justify-content-between align-items-center"> <!-- Menambahkan class align-items-center -->
    <h2>Data User</h2>
    <div >

    
        <div class="btn btn-label-primary dropdown-toggle me-2" data-bs-toggle="dropdown" ><i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></div>
        <button type="button" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#tambahModal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span></button>

        <div class="dropdown-menu">
         <a class="dropdown-item" href="javascript:void(0);" id="printTable"
         ><i class="ti ti-copy me-1" ></i>Copy</a>
         <a class="dropdown-item ssedtt" href="javascript:void(0);" id="csvTable"
         ><i class="ti ti-file-spreadsheet me-1" ></i>Exel</a>
         <a class="dropdown-item ssedtvt" href="javascript:void(0);" id="excelTable"
          ><i class="ti ti-file-text me-1"></i>CSV</a>
          <a class="dropdown-item ssdele" href="javascript:void(0);" id="pdfTable"
          ><i class="ti ti-file-description me-1"></i>Pdf</a>
          <a class="dropdown-item " href="javascript:void(0);"  id="copyTable"
          ><i class="ti ti-printer me-1" ></i>Print</a>
        </div>
    </div>
</div>


<div class="table-responsive text-nowrap mb-2">
  <table id="table-user" class="table table-hove display">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0 mb-5">
      @foreach ($alldata as $p)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td class="p-3">{{$p->user}}</td>
          <td>{{$p->nama}}</td>
          <td>{{$p->email}}</td>

          <td>{{$p->level}}</td>
            <!-- <img src="gambar" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px;"> -->
          
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#largeModal{{$p->user}}"
                  ><i class="ti ti-list-details me-1"></i></i> Detail Data</button>
                <a class="dropdown-item ssedtt" href="/akun/edit/{{$p->user}}"
               
                  ><i class="ti ti-pencil me-1"></i> Edit Data</a>
                  <a class="dropdown-item ssdele" href="javascript:void(0);"
                data-user="{{$p->user}}"
                data-nama="{{$p->nama}}">
                <i class="ti ti-trash me-1"></i> Hapus Data
                </a>
              </div>
            </div>
          </td>
        
        </tr>
  @endforeach
    </tbody>
  
  </table >
  </div>
  </div>


                        
    <!--  Modal Tambah-->

                      <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <form  method="POST" action="/data/akun/save" enctype="multipart/form-data">
                              @csrf
                            <div class="modal-header">
                              <h3 class="modal-title fw-bold" id="exampleModalLabel3">Tambah Akun</h3>
                              <br>
                             
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                              <hr class="my-0 mb-4" />
                            <div class="d-flex align-items-start align-items-sm-center mb-3 gap-4">
                        <img
                          src=""
                          alt="user-avatar"
                          name="uploadd"
                          class="d-block w-px-100 h-px-100 rounded"
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
                          
                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Username</label>
                                  <input type="text" name="user" required class="form-control" placeholder="namakamu12" />
                                </div>
                              </div>
                              
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">nama</label>
                                  <input type="text" id="inputHuruf" oninput="validateInput(this)" name="nama" required class="form-control" placeholder="namakamu" />
                                   <span id="error-message" style="color: cyan;"></span>
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Email</label>
                                  <input type="email" name="email" required class="form-control" placeholder="emailkamu@gmail.com" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                              <div class="col mb-0">
                                  
                              <label class="form-label" for="phoneNumber">No HP</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">ID (+62)</span>
                              <input
                                type="number"
                                 required
                                name="nohp"
                                class="form-control"
                                placeholder="" />
                            </div>
                              
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Password</label>
                                  <input type="text" name="pass" required class="form-control" placeholder="" />
                                </div>
 
                                </div>
                                
                                <input type="datetime-local" id="tgl" hidden name="tgl" />

                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Level</label>
                                  <input type="text"  class="form-control bg-secondary text-white" name="level" readonly placeholder="Petani" value="Petani" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Lokasi</label>
                                  <input type="text" name="lokasi" required class="form-control"  placeholder="Jember" />
                                </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                            
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Close
                              </button>
                              
                              <button type="submit" name="submit"  class="btn btn-primary me-2">Tambah Data</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                      <!--  Modal Tambah-->

                      <script>
                        // Fungsi untuk mengatur nilai elemen input datetime-local menjadi tanggal dan waktu saat ini
                        function setDateTime() {
                            var now = new Date(); // Mendapatkan tanggal dan waktu saat ini
                            var year = now.getFullYear();
                            var month = (now.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
                            var day = now.getDate().toString().padStart(2, '0');
                            var hours = now.getHours().toString().padStart(2, '0');
                            var minutes = now.getMinutes().toString().padStart(2, '0');
                            var dateTimeString = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
                            document.getElementById('tgl').value = dateTimeString; // Mengatur nilai elemen input
                        }
                
                        // Panggil fungsi setDateTime saat halaman dimuat
                        setDateTime();
                    </script>


                      <!-- Detail Modal -->
                      @foreach ($alldata as $p)
                      <div class="modal fade" id="largeModal{{$p->user}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3">Detail Akun</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <br>
                            <hr class="my-0" />
                            <div class="modal-body">
                            <div class="d-flex align-items-start align-items-sm-center mb-3 gap-4">
                        <img
                          src="{{$p->gambar}}"
                          alt="user-avatar"
                          class="d-block w-px-100 h-px-100 rounded"
                          id="uploadedAvatar" />

                      </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Username</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->user}}" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">nama</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->nama}}" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Email</label>
                                  <input type="email" value="{{$p->email}}" readonly class="form-control" placeholder="" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                              <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Nomor Hp</label>
                                  <input type="number" value="62{{$p->nohp}}" readonly class="form-control" placeholder="" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Lokasi</label>
                                  <input type="text" value="{{$p->lokasi}}" readonly class="form-control" placeholder="" />
                                </div>
 
                                </div>
                               
                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Level</label>
                                  <input type="text" value="{{$p->level}}" readonly class="form-control" placeholder="" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal Regis</label>
                                  <input type="datetime" class="form-control" value="{{$p->tanggal_create}}" readonly placeholder="" />
                                </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Close
                              </button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                   


<style>
  .ssdele:hover{
    background-color:#DE3163;
    color:#eaeaea;
  }
  .ssedtt:hover{
    background-color:#53B956;
    color:#eaeaea;
  }
  .ssedtvt:hover{
    background-color:#EAE041;
    color: #fff;;
  }
  #table-controls {
    margin-bottom: 10px;
}

  /* Menyembunyikan tombol-tombol JS bawaan DataTables */
.dt-buttons {
    display: none;
    z-index: 100;
}

div.dataTables_length {
    float: left;
}
div.dataTables_filter {
    float: right;
}


div.dataTables_info {
    float: left;
}
div.dataTables_paginate {
    float: right;
}
  
</style>


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
      $('.ssdele').click(function() {
          var user = $(this).data('user');
          var nama = $(this).data('nama');
  
          Swal.fire({
      title: 'Apakah Anda yakin ingin menghapus data ' + nama + '?',
      text: "Tindakan ini tidak dapat dibatalkan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Hapus Data!',
      cancelButtonText: 'Tidak',
      showClass: {
          popup: 'animate__animated animate__tada'
      },
      customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
  }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      type: 'DELETE', // Ubah method menjadi DELETE
                      url: '/hapus-akun/' + user,
                      data: {
                          _token: '{{ csrf_token() }}'
                      },
                      success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 2500
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1800
                            }).then(() => {
                                window.location.href = "{{ route('admin') }}";
                            });
                        }
                    },
                      error: function(xhr, status, error) {
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: xhr.responseText
                          });
                      }
                  });
              }
          });
      });
  });
    </script>



    <script>

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Update/reset user image of account page
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



$(document).ready(function() {
    // Inisialisasi DataTables
    var table = $('#table-user').DataTable({
        "language": {
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "paginate": {
                "previous": "Sebelumnya",
                "next": "Selanjutnya"
            },
        },
        "format": {
            body: function (inner, coldex, rowdex) {
                if (!inner) return inner;
                var el = $.parseHTML(inner);
                var result = '';

                el.forEach(function (item) {
                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result += item.textContent;
                    } else {
                        result += item.innerText || item.textContent;
                    }
                });

                return result;
            },
        },
        "lengthMenu": [10, 25, 50],
        dom: '<"top"Blfr>t<"bottom"ip>',
    });

  
    // Hapus tombol-tombol JS yang ingin Anda sembunyikan
    $('.dt-button').remove();

    // Tambahkan fungsi klik untuk tombol dropdown menu ke tombol DataTables yang sudah ada
    $("#printTable").on('click', function() {
        table.button('0').trigger();
    });
    $("#csvTable").on('click', function() {
        table.button('1').trigger();
    });
    $("#excelTable").on('click', function() {
        table.button('2').trigger();
    });
    $("#pdfTable").on('click', function() {
        table.button('3').trigger();
    });
    $("#copyTable").on('click', function() {
        table.button('4').trigger();
    });
});
    </script>



@endsection