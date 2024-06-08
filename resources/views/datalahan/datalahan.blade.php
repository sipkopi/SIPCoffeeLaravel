@extends('layout.body')
@section('konten')

<?php
$query = DB::select("SELECT * FROM data_lahan");
$lastCode = "KL0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->kode_lahan;
}

$lastNumber = (int)substr($lastCode, 2);
$newNumber = $lastNumber + 1;

if ($newNumber < 10) {
    $newCode = "KL000" . $newNumber;
} elseif ($newNumber < 100) {
    $newCode = "KL00" . $newNumber;
} else {
    $newCode = "KL0" . $newNumber;
}

?>

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

    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>



  <!-- alert data berhasil -->
  <div class="alert alert-success" role="alert" style="display: none;">Data Lahan Telah Ditambahkan!</div>


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




<div class="card">
        <div class="card-header">
 <div class=" d-flex flex-column mb-3 flex-md-row justify-content-between align-items-center"> <!-- Menambahkan class align-items-center -->
    <h2>Data Lahan</h2>
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
  <table id="table-user" class="table table-hover display">
    <thead class="table-light">
      <tr>
        <th>Kode Lahan</th>
        <th>User</th>
        <th>Varietas Pohon</th>
        <th>Total Bibit</th>
        <th>Luas Lahan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0 mb-5">
      @foreach ($alldata as $p)
        <tr>
          {{-- <th scope="row">{{$loop->iteration}}</th> --}}
          <td class="p-3">{{$p->kode_lahan}}</td>
          <td>{{$p->user}}</td>
          <td>{{$p->varietas_pohon}}</td>
          <td>{{$p->total_bibit}} Pohon</td>
          <td>{{$p->luas_lahan}} M²</td>
            <!-- <img src="gambar" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px;"> -->
        
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#largeModal{{$p->kode_lahan}}">
                <i class="ti ti-list-details me-1"></i></i> Detail Data</button>
                <a class="dropdown-item ssedtt" href="/data/lahan/edit/{{$p->kode_lahan}}"  
                  ><i class="ti ti-pencil me-1"></i> Edit</a>
                  
                  <a class="dropdown-item vvdelete ssdele" href="javascript:void(0);"
                data-KP="{{$p->kode_lahan}}"
                data-vari="{{$p->varietas_pohon}}">
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


                    <!-- Detail Modal -->
                    @foreach ($alldata as $p)
                      <div class="modal fade" id="largeModal{{$p->kode_lahan}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3">Detail Lahan</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <br>
                            <hr class="my-0" />
                            <div class="modal-body">

                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Kode Lahan</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->kode_lahan}}" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">User</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->user}}" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Varietas Pohon</label>
                                  <input type="email" value="{{$p->varietas_pohon}}" readonly class="form-control" placeholder="" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">

                              <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Total Bibit ( Pohon )</label>
                                  <input type="number" value="{{$p->total_bibit}}" readonly class="form-control" placeholder="" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Luas Lahan ( M ² )</label>
                                  <input type="text" value="{{$p->luas_lahan}}" readonly class="form-control" placeholder="" />
                                </div>
 
                                </div>
                               
                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal</label>
                                  <input type="text" value="{{$p->tanggal}}" readonly class="form-control" placeholder="" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Ketinggian Tanam ( M )</label>
                                  <input type="datetime" class="form-control" value="{{$p->ketinggian_tanam}}" readonly placeholder="" />
                                </div>
                                </div>

                                <div class="col mb-3 mt-4">
                                  <h5 for="" class="text-center">Lokasi</h5>
                                  <div id="mapkode_lahan" style="width: 100%; height: 400px; border-radius:10px;"></div>
                                </div>
                                
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTaoH68tDGImpq4oMAjrkdIRof1jM8s_w&callback=initMap" async defer>
                                </script>
                                
                                <script>
                                  // Fungsi untuk menginisialisasi peta
                                  function initMap() {
                                    // Lokasi dari latitude dan longitude yang kamu berikan
                                    var latitude = {{$p->latitude}};
                                    var longitude = {{$p->longtitude}};
                                    
                                    // Buat objek LatLng
                                    var myLatLngkode_lahan = { lat: latitude, lng: longitude };
                                
                                    // Buat peta dengan lokasi default
                                    var mapkode_lahan = new google.maps.Map(document.getElementById('mapkode_lahan'), {
                                      zoom: 12,
                                      center: myLatLngkode_lahan
                                    });
                                
                                    // Tambahkan marker pada peta
                                    var markerkode_lahan = new google.maps.Marker({
                                      position: myLatLngkode_lahan,
                                      map: mapkode_lahan,
                                      title: 'Lokasi Anda'
                                    });
                                  }
                                </script>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Tutup
                              </button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach

<!-- Detail Maps key  -->


<!-- Detail Maps key  -->

<!-- Detail Modal -->


    <!--  Modal Tambah-->

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          <form  method="POST" action="/data/lahan/save" enctype="multipart/form-data">
                            @csrf

                            
                            
                            <div class="modal-header">
                              <h3 class="modal-title fw-bold" id="exampleModalLabel3">Tambah Data Lahan</h3>
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
                          
                                <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Kode Lahan</label>
                                  <input type="text" name="lahan" required readonly class="form-control" value="{{ $newCode }}" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                <label for="dobLarge" class="form-label">User</label>
                                <select name="user" class="select2 form-select">
                                  @foreach ($alluser as $p)
                                  {{-- {{$p->varietas_pohon}} --}}
                                  <option value="{{$p->user}}">{{$p->nama}}</option>
                                  @endforeach
                                </select>
                                </div>

                                <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Varietas Pohon</label>
                                  <input type="text" id="inputHuruf" oninput="validateInput(this)" name="vari" required class="form-control" />
                                  <span id="error-message" class="text-danger"></span>
                                </div>

                              </div>

                              <div class="row g-2 mb-3">
                              <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Total Bibit ( Pohon )</label>
                              <input type="number" name="bibit" required class="form-control" placeholder="100" />
                                </div>
                                <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Luas Lahan ( M ² )</label>
                                  <input type="number" name="luas" required class="form-control" placeholder="400" />
                                </div>

                                 <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Ketinggian Tanam ( MDPL )</label>
                                  <input type="number" name="tinggi" required class="form-control" placeholder="100" />
                                </div>
                                </div>
                                
                                <div class="col mb-3">
                                <label for="emailLarge" class="form-label">Tanggal</label>
                                  <input type="text"  class="form-control" placeholder="YYYY-MM-DD" name="tgl" id="flatpickr-date" />
                                </div>
                                
                              
                                <div class="row g-2 mb-3">
                                  <div class="col mb-0">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" id="inputAngka" oninput="validateInputangka(this)" name="latitude" required class="form-control" placeholder=""  />
                                    <span id="error-angka"class="text-danger" ></span>
                                </div>
                                <div class="col mb-0">
                                    <label for="longtitude" class="form-label">Longtitude</label>
                                    <input type="text" id="inputAngkaa" oninput="validateInputangkaa(this)" name="longtitude" class="form-control" placeholder=""  />
                                    <span id="error-angkaa"class="text-danger" ></span>
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

<!-- CUSTOM hanya angka -->
<script>
  function validateInputangka(inputElement) {
      const inputAngka = inputElement.value;
      const forbiddenCharacters = /[@qwertyuiopasdfghjklzxcvbnm,{}><?!#^&*+$%?;:{}()/''"\=_\[\]]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputAngka)) {
        document.getElementById('error-angka').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, huruf/abjad, dan karakter lainnya.';
        inputElement.value = inputAngka.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-angka').textContent = '';
      }
    }

    function validateInputangkaa(inputElement) {
      const inputAngkaa = inputElement.value;
      const forbiddenCharacters = /[@qwertyuiopasdfghjklzxcvbnm,{}><?!#^&*+$%?;:{}()/''"\=_\[\]]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputAngkaa)) {
        document.getElementById('error-angkaa').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, huruf/abjad, dan karakter lainnya.';
        inputElement.value = inputAngkaa.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-angkaa').textContent = '';
      }
    }

</script>

<!-- CUSTOM hanya Huruf -->
<script>
  function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890.,{}><?!#^&*-+$%?;:{}()/''"\=_\[\]]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }

    
</script>




<!-- CUSTOM hanya Huruf -->



<!-- CUSTOM TABLE -->
    <script>

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

<!-- CUSTOM TABLE -->


<!-- ALERT HAPUS -->
<script>
$(document).ready(function() {
    $('.vvdelete').click(function() {
        var kode_lahan = $(this).data('kp');
        var varietas_pohon = $(this).data('vari');

        Swal.fire({
    title: 'Apakah Anda yakin ingin menghapus data ' + varietas_pohon + '?',
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
                    url: '/hapus-data/' + kode_lahan,
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
                                window.location.href = "{{ route('lahan') }}";
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

<!-- ALERT HAPUS -->

@endsection