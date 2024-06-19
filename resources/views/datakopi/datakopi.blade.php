@extends('layout.body')
@section('konten')

<?php

$query = DB::select("SELECT * FROM data_kopi");
$lastCode = "KP0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->kode_kopi;
}

$lastNumber = (int)substr($lastCode, 2);
$newNumber = $lastNumber + 1;

if ($newNumber < 10) {
    $newCode = "KP000" . $newNumber;
} elseif ($newNumber < 100) {
    $newCode = "KP00" . $newNumber;
} else {
    $newCode = "KP0" . $newNumber;
}
?>

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
<script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> 

<script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />

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



<style>

  .ssedtt{
  cursor:pointer;
  }
  
  </style>


<div class="card">
        <div class="card-header">
 <div class=" d-flex flex-column mb-3 flex-md-row justify-content-between align-items-center"> <!-- Menambahkan class align-items-center -->
    <h2>Data Kopi</h2>
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
        <th>Kode Kopi</th>
        <th>Kode Peremajaan</th>
        <th>Metode Pengolahan</th>
        <th>Tgl Panen</th>
        <th>Tgl EXP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0 mb-5">
      @foreach ($alldata as $p)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td class="p-3">{{$p->kode_kopi}}</td>
          <td>{{$p->kode_peremajaan}}</td>
          <td>{{$p->metode_pengolahan}}</td>
          <td>{{$p->tgl_panen}}</td>
          <td>{{$p->tgl_exp}}</td>
            <!-- <img src="gambar" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px;"> -->
          
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#largeModal{{$p->kode_kopi}}"
                  ><i class="ti ti-list-details me-1"></i></i> Detail Data</button>
                  <a class="dropdown-item ssedtt" href="/data/kopi/edit/{{$p->kode_kopi}}"
               
                  ><i class="ti ti-pencil me-1"></i> Edit Data</a>
                  <a class="dropdown-item ssdele" href="javascript:void(0);"
                  data-kode_kopi="{{$p->kode_kopi}}"
                  data-varietas_kopi="{{$p->varietas_kopi}}">
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
                      <div class="modal fade" id="largeModal{{$p->kode_kopi}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="exampleModalLabel3">Detail Kopi</h3>
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
                                  <label for="nameLarge" class="form-label">Kode Kopi</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->kode_kopi}}" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">Kode Peremajaan</label>
                                  <input type="text" readonly class="form-control" placeholder="" value="{{$p->kode_peremajaan}}" />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Varietas Kopi</label>
                                  <input type="email" value="{{$p->varietas_kopi}}" readonly class="form-control" placeholder="" />
                                </div>
                              </div>
                              <div class="row g-2 mb-3">

                              <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Metode Pengolahan</label>
                                  <input type="text" value="{{$p->metode_pengolahan}}" readonly class="form-control" placeholder="" />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Stok</label>
                                  <input type="number" value="{{$p->stok}}" readonly class="form-control" placeholder="" />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Berat ( GRAM )</label>
                                  <input type="number" value="{{$p->berat}}" readonly class="form-control" placeholder="" />
                                </div>
 
                                </div>
                               
                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal Panen</label>
                                  <input type="date" value="{{$p->tgl_panen}}" readonly class="form-control" placeholder="" />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal Roasting</label>
                                  <input type="date" value="{{$p->tgl_roasting}}" readonly class="form-control" placeholder="" />
                                </div>


                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tgl Expired</label>
                                  <input type="date" class="form-control" value="{{$p->tgl_exp}}" readonly placeholder="" />
                                </div>
                                </div>


                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Harga Kopi ( /Gram )</label>
                                  <input type="text" name="harga" readonly value="{{$p->harga}}" class="form-control" placeholder="125000" />
                                </div>

                                <div class="row g-2 mb-2 mt-2">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea type="text" class="form-control mt-1 mb-4" readonly rows="3">{{$p->deskripsi}}</textarea>
                                </div>

                                <div class="row g-2 mb-3 mt-3">
                                <div class="col-6 mb-0">
                                  <h5 for="" class="form">Gambar Produk</h5>
                                  <a href="{{$p->gambar1}}" target="_blank" class="btn btn-info" >Gambar Produk</a>
                                </div>

                                {{-- <div class="col-6 mb-0">
                                  <h6 for="" class="form">Gambar QR</h6>
                                  <button onclick="showAlerte()"target="_blank" class="btn btn-info me-2" >Lihat QR Code</button>
                                  <button type="button" onclick="showAlerte()" class="btn text-white btn-primary">Download QR Code</button>
                                </div> --}}

                                </div>

                                {{-- <div class="row mb-3 mt-5">
                                <h5 for="">Gambar QR</h5>
                                <div class="col mb-0">
                                <button onclick="showAlerte()"target="_blank" class="btn btn-info" >Lihat QR Code</button>
                                 <button type="button" onclick="showAlerte()" class="btn text-white btn-primary">Download QR Code</button>
                                 </div>

                                 <div class="col mb-0">
                                
                                </div>

                                </div> --}}
                                
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
<!-- Detail Modal -->


                    <!-- Modal Tambah -->
                      <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <form method="POST" action="/data/kopi/save" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel3">Tambah Data Kopi</h4>
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
                                  <label for="nameLarge" class="form-label">Kode Kopi</label>
                                  <input type="text" name="kdkopi" readonly value="{{ $newCode }}" class="form-control" placeholder="" />
                                </div>
                              </div>

                              <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="dobLarge" class="form-label">Kode Peremajaan</label>
                                  <select name="pere" class="select2 form-select">
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

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Varietas Kopi</label>
                                
                                  <input type="text" name="vari" required class="form-control" placeholder="Arabika" />
                                </div>

                              </div>

                              <div class="row g-2 mb-3">

                              <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal Panen</label>
                                  <input type="text" placeholder="YYYY-MM-DD" name="tglpan" required id="flatpickr-datee" class="form-control"  />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tanggal Roasting</label>
                                  <input type="text" placeholder="YYYY-MM-DD" name="tglroas" required id="flatpickr-date" class="form-control"  />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Tgl Expired</label>
                                  <input type="text" placeholder="YYYY-MM-DD" name="tglexp" required id="flatpickr-dateee" class="form-control"  />
                                </div>
 
                                </div>
                               
                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Berat ( Gram )</label>
                                  <input type="number" placeholder="750" required name="berat"  class="form-control"  />
                                </div>

                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Stok Produk</label>
                                  <input type="number" placeholder="750" required name="stok"  class="form-control"  />
                                </div>

                                <div class="col mb-0">
                                 <label for="emailLarge" class="form-label">Metode Pengolahan</label>
                                  <select name="metode"  class="select2 form-select">
                                <option value="Natural">Natural</option>
                                <option value="Full Wash">Full Wash</option>
                                </select>
                                </div> 
                                </div>

                                <div class="col mb-3">
                                  <label for="nameLarge" class="form-label">Harga Kopi ( /Gram )</label>
                                  <input type="text" name="harga" required class="form-control" placeholder="125000" />
                                </div>
                           

                                <div class="row g-2 mb-2">
                          <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
                          <textarea type="text" required class="form-control mt-1 mb-4"  name="desk" rows="3"></textarea>
                          </div>

                                <div class="row g-2 mb-3 mt-2">
                                <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Gambar 1 (Pastikan gambar PNG/JPG dan ukuran 1:1 (1000x1000) pixel)</label>
                                <input class="form-control" type="file" id="img" name="img1"/>
                                </div>
                                </div>

                                <div class="row g-2 mb-3">
                                <div class="col mb-0">
                                <div id="gambar-preview" ></div>
                                </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" name="submit"  class="btn btn-primary me-2">Tambah Data</button>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
<!-- Modal Tambah -->




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



<!-- ALERT HAPUS -->
<script>
  $(document).ready(function() {
      $('.ssdele').click(function() {
          var kode_kopi = $(this).data('kode_kopi');
          var varietas_kopi = $(this).data('varietas_kopi');
  
          Swal.fire({
      title: 'Apakah Anda yakin ingin menghapus data ' + kode_kopi + '?',
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
                      url: '/hapus-kopi/' + kode_kopi,
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
                                window.location.href = "{{ route('kopi') }}";
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




<!-- CUSTOM TANGGAL -->
<script>
  'use strict';

(function () {

  const flatpickrDate = document.querySelector('#flatpickr-datee'),
   flatpickrDatepanen = document.querySelector('#flatpickr-date'),
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





<!-- CUSTOM UPLOAD GAMBAR -->
<script>
          document.getElementById('img').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('gambar-preview').innerHTML = '<img src="' + e.target.result + '" width="300" height="300" />'; // Perhatikan perubahan tanda kutip di sini
                };
                reader.readAsDataURL(file);
            }
        });

</script>
  <!-- CUSTOM UPLOAD GAMBAR -->


  @endsection