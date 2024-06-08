@extends('layout.body')
@section('konten')


<?php

$query = DB::select("SELECT * FROM data_peremajaan");
$lastCode = "KPR0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->kode_peremajaan;
}

$lastNumber = (int)substr($lastCode, 3);
$newNumber = $lastNumber + 1;

if ($newNumber < 10) {
    $newCode = "KPR000" . $newNumber;
} elseif ($newNumber < 100) {
    $newCode = "KPR00" . $newNumber;
} else {
    $newCode = "KPR0" . $newNumber;
}
?>

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />


     <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="{{asset('assetsadmin')}}/js/ui-modals.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>




  <!-- alert data berhasil -->
  <div class="alert alert-success" role="alert" style="display: none;">Data Baru Telah Ditambahkan!</div>


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
    <h2>Data Peremajaan</h2>
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
        <th>No</th>
        <th>Kode Pere</th>
        <th>Kode_Lahan</th>
        <th>Perlakuan</th>
        <th>Tanggal</th>
        <th>Kebutuhan</th>
        <th>Pupuk</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0 mb-5">
      @foreach ($alldata as $p)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td class="p-3">{{$p->kode_peremajaan}}</td>
          <td class="p-3">{{$p->kode_lahan}}</td>
          <td>{{$p->perlakuan}}</td>
          <td>{{$p->tanggal}}</td>
          <td>{{$p->kebutuhan}} Liter</td>
          <td>{{$p->pupuk}}</td>

          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item ssedtt" href="/data/pere/edit/{{$p->kode_peremajaan}}"
                  ><i class="ti ti-pencil me-1"></i> Edit Data
                </a>
                <a class="dropdown-item vvdelete ssdele" href="javascript:void(0);"
                data-kp="{{$p->kode_peremajaan}}" >
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
                            <form method="POST" action="/data/pere/save" enctype="multipart/form-data">
                              @csrf
                            <div class="modal-header">
                              <h3 class="modal-title fw-bold" id="exampleModalLabel3">Tambah Data Peremajaan</h3>
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
                                  <label for="nameLarge" class="form-label">Kode Peremajaan</label>
                                  <input type="text" name="kodepere" value="{{ $newCode }}" required readonly class="form-control" placeholder="" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">Kode Lahan</label>
                                  <select name="kodelahan" class="select2 form-select">
                                    <?php
                                      $data = DB::table('data_lahan')->select('kode_lahan', 'varietas_pohon')->get();
                                      if (count($data) > 0) {
                                        foreach ($data as $data) {
                                          echo "<option value='" . $data->kode_lahan . "'>" . $data->kode_lahan . " " . $data->varietas_pohon . "</option>";
                                        }
                                      } else {
                                        echo "<option value=''>Data lahan tidak tersedia</option>";
                                      }
                                      ?>
                                </select>
                                </div>
                                <div class="col mb-0">
                                <label for="flatpickr-datetime" class="form-label">Tanggal</label>
                                  <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="tgl" id="flatpickr-date" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                              <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Kebutuhan ( Liter )</label>
                                  <input type="number" name="kebutuhan" placeholder="100" required class="form-control"/>
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Nama Pupuk</label>
                                  <input type="text" id="inputAngka" oninput="validateInputangka(this)" name="pupuk" required class="form-control"  placeholder="NPK 8000" />
                                  <span id="error-angka"class="text-danger" ></span>
                                </div>
 
                                </div>
                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Perlakuan</label>
                                  <textarea class="form-control" id="inputAngkaa" oninput="validateInputangkaa(this)" name="perlakuan" placeholder="Penyiraman" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  <span id="error-angkaa"class="text-danger" ></span>
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


<script>
  // validasi
    function validateInputangka(inputElement) {
      const inputAngka = inputElement.value;
      const forbiddenCharacters = /[-@.,{}><?!#^&*+$%?;:{}()/''"\=_\[\]]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputAngka)) {
        document.getElementById('error-angka').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, dan karakter khusus lainnya lainnya.';
        inputElement.value = inputAngka.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-angka').textContent = '';
      }
    }

    function validateInputangkaa(inputElement) {
  const inputAngkaa = inputElement.value;
  const forbiddenCharacters = /[-@1234567890.,{}><?!#^&*+$%?;:{}()/''"\=_\[\]]/g; // Karakter yang tidak diinginkan, tambahkan \[\] ke dalam ekspresi reguler

  if (forbiddenCharacters.test(inputAngkaa)) {
    document.getElementById('error-angkaa').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, dan karakter khusus lainnya lainnya.';
    inputElement.value = inputAngkaa.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
  } else {
    document.getElementById('error-angkaa').textContent = '';
  }
}

</script>

 <!-- CUSTOM pRINT -->
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
    <!-- CUSTOM pRINT -->

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



<!-- ALERT HAPUS -->
<script>
$(document).ready(function() {
    $('.vvdelete').click(function() {
        var kode_peremajaan = $(this).data('kp');

        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data ' + kode_peremajaan + '?',
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
                    type: 'DELETE',
                    url: '/hapus-data/pere/' + kode_peremajaan,
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
                                window.location.href = "{{ route('pere') }}";
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