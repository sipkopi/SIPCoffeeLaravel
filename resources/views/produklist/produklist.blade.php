@php
function formatRupiah($number){
    return 'Rp: ' . number_format($number, 0, ',', '.');
}
@endphp
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Produk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/magnific-popup.css">

	<link rel="stylesheet" href="{{asset('asetproduk')}}/css/style.css">


	<!-- Modernizr JS -->
	<script src="{{asset('asetproduk')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>


	<div id="colorlib-page">

		<div id="colorlib-about">
			<div class="container">
				<div class="row text-center">
					<h2 class="bold">Produk </h2>
				</div>
				<div class="row">
					<div class="col-md-5 animate-box">
						
						<div class="item">
								<img style="border-radius: 10px;" height="500" width="500" class="img-responsive about-img" src="{{$main->gambar1}}" alt="Gambar tidak ada">
							</div>
					
					</div>
					<div class="col-md-6 col-md-push-1 animate-box">
						<div class="about-desc">
							<div class="item">
								<h2><span>{{$main->varietas_kopi}}</span></h2>
							</div>
					
							<div class="desc">
								<div class="rotate">
									<h2 class="heading">Produk</h2>
								</div>
								
								<div class="col-3">
									<p>{{$main->deskripsi}}</p>
								</div>
								<div class="d-flex justify-content-between">
									<div class="btn btn-primary me-2 btn-outline">{{ formatRupiah($main->harga) }}</div>
									<div class="btn btn-primary me-2 btn-outline">Stok: {{ $main->stok }}</div>
									
								</div>
								<br>
								<a href="https://api.whatsapp.com/send?phone=nohp" class="btn btn-primary btn-outline">Hubungi Petani</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div id="colorlib-services">
			<div class="container">
				<div class="row text-center">
					<h2 class="bold">Informasi</h2>
				</div>
				<div class="row ">
					<div class="col-md-12 ">
						<div class="">
							<div class="one-third">
								<div class="row">
									<div class="col-md-12 col-md-offset-0 animate-box intro-heading">
										<span></span>
										<h2>Beberapa Informasi Tentang produk</h2>
									</div>
								</div>
								<div class="row ">
									<div class="col-md-12">
										<div class="rotate">
											<h2 class="heading">Informasi</h2>
										</div>
									</div>


										<div class="d-flex col-6 col-md-6">
										<div class="services animate-box">
											<h3>> Pemilik</h3>
											<ul>
												 <li class="me-4">Nama: <span> {{$main->nama}}</span></li>
												<li class="me-4">Email: <span> {{$main->email}}</span></li>
												<li class="me-4">NoHp: <span> {{$main->nohp}}</span></li> 
												
											</ul>
                                           
										</div>
										<div class="services text-dark animate-box">
											<h3>> Data Produk Kopi</h3>
											<ul>
											<li class=" text-dark me-4">Varietas: <span> {{$main->varietas_kopi}}</span></li>
												<li class=" text-dark me-4">Metode Pngolahan: <span> {{$main->metode_pengolahan}}</span></li>
                                                <li class=" text-dark me-4">Tanggal Panen: <span> {{$main->tgl_panen}}</span></li>
												<li class=" text-dark me-4">Tanggal Roasting: <span> {{$main->tgl_roasting}}</span></li>
												<li class=" text-dark me-4">Tanggal EXPIRED: <span> {{$main->tgl_exp}}</span></li>
												<li class=" text-dark me-4">Berat: <span> {{$main->berat}} Gram</span></li> 
                                            </ul>
										</div>
									</div>



									<div class="d-flex col-6 col-md-6">
										<div class="services animate-box">
											<h3>> Data Lahan</h3>
											<ul>
												<li class=" text-dark me-4">Varietas Pohon: <span> {{$main->varietas_pohon}}</span></li>
												<li class=" text-dark me-4">Total Bibit: <span> {{$main->total_bibit}}</span></li>
												<li class=" text-dark me-4">Luas Lahan: <span> {{$main->luas_lahan}}</span></li>
												<li class=" text-dark me-4">Ketinggian Tanam: <span> {{$main->ketinggian_tanam}} MDPL</span></li>
												<li class=" text-dark me-4">Tanggal Tanam: <span> {{$main->tanggal}}</span></li> 
                                            </ul>
										</div>

										<div class="services animate-box">
											<h3>> Peremajaan</h3>
											<ul>
												 <li class=" text-dark me-4" >Melakukan: <span> {{$main->luas_lahan}}perlakuan</span></li>
												<li class=" text-dark me-4">Tangal: <span> {{$main->tanggal}}</span></li>
												<li class=" text-dark me-4">Kebutuhan: <span> {{$main->kebutuhan}} Liter</span></li>
												<li class=" text-dark me-4">Pupuk: <span> {{$main->pupuk}}</span></li> 
                                            </ul>
										</div>
									</div>



								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<div class="testmaps mb-5 container">
    <div class="mt-4 mb-4 text-center">
    <h1>Lokasi</h1>
    </div>

    <div class="card">
    <div class="card-body ">
            <!-- Tambahkan elemen div untuk menampung peta -->
            <div id="map" style="height: 400px; border-radius: 10px;"></div>
        </div>
    </div>
</div>

<style>
        /* Tambahkan border radius pada kartu */
        .card {
            border-radius: 15px;
        }
    </style>

		<footer class="mt-2">
			<div id="footer">
				<div class="container">

					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart4" aria-hidden="true"></i> by <a style="color:#d37800;" href="https://sipkopi.com" target="_blank">SIP-KOPI</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
	</div>



    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTaoH68tDGImpq4oMAjrkdIRof1jM8s_w&callback=initMap">
</script>

<script>
    // Fungsi untuk menginisialisasi peta
    function initMap() {
        // Lokasi default (contoh: Jakarta, Indonesia)
        var myLatLng = {lat: {{$main->latitude}}, lng: {{$main->longtitude}}};

        // Buat peta dengan lokasi default
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });

        // Tambahkan marker pada peta
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Lokasi Anda'
        });
    }
</script>

	<!-- jQuery -->
	<script src="{{asset('asetproduk')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('asetproduk')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{asset('asetproduk')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{asset('asetproduk')}}/js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="{{asset('asetproduk')}}/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('asetproduk')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('asetproduk')}}/js/magnific-popup-options.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="{{asset('asetproduk')}}/js/main.js"></script>

	</body>
</html>