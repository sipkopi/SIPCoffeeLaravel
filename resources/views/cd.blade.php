<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coming Soon</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	{{-- <link rel="icon" type="image/png" href="{{asset('cdown')}}/images/icons/favicon.ico"/> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('cdown')}}/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
				Coming Soon
			</h3>

			<p class="txt-center l1-txt2 p-b-60">
				Our website is under construction
			</p>

			<div class="flex-w flex-c cd100 p-b-21">
				<div class="flex-col-c-m size2 how-countdown">
					<span id="days" class="l1-txt3 p-b-9">0</span>
					<span class="s1-txt1">Days</span>
				</div>
			
				<div class="flex-col-c-m size2 how-countdown">
					<span id="hours" class="l1-txt3 p-b-9">0</span>
					<span class="s1-txt1">Hours</span>
				</div>
			
				<div class="flex-col-c-m size2 how-countdown">
					<span id="minutes" class="l1-txt3 p-b-9">0</span>
					<span class="s1-txt1">Minutes</span>
				</div>
			
				<div class="flex-col-c-m size2 how-countdown">
					<span id="seconds" class="l1-txt3 p-b-9">0</span>
					<span class="s1-txt1">Seconds</span>
				</div>
			</div>

			<a class="flex-c-m ssshover s1-txt2 size3 mb-3 how-btn" href="https://sip-kopi.gitbook.io/sip-kopi">More Sip kopi</a>
<style>
	.ssshover{
		border: 2px #fff solid;
color: #fff !important;

	}
	.ssshover:hover{
		border: none;
		color: #fff;
		background-color: #ffffff5e ;
		
	}
</style>
			<button class="flex-c-m ssshover s1-txt2 size3 how-btn"  data-toggle="modal" data-target="#subscribe">
				Follow us for update now!
			</button>

		</div>

		<span class="s1-txt3 txt-center">
			@ 2024 SIP-KOPI
		</span>
		
	</div>


	<!-- Modal Login -->
	<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="modal-subscribe where1-parent bg0 bor2 size4 p-t-54 p-b-100 p-l-15 p-r-15">
				<button class="btn-close-modal how-btn2 fs-26 where1 trans-04">
					<i class="zmdi zmdi-close"></i>
				</button>

				<div class="wsize1 m-lr-auto">
					<h3 class="m1-txt1 txt-center p-b-36">
						<span class="bor1 p-b-6">Subscribe</span>
					</h3>

					<p class="m1-txt2 txt-center p-b-40">
						Follow us for update now!
					</p>

					<form class="contact100-form validate-form">
						<div class="wrap-input100 m-b-10 validate-input" data-validate = "Name is required">
							<input class="s1-txt4 placeholder0 input100" type="text" name="name" placeholder="Name">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 m-b-20 validate-input" data-validate = "Email is required: ex@abc.xyz">
							<input class="s1-txt4 placeholder0 input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
						</div>

						<div class="w-full">
							<button class="flex-c-m s1-txt2 size5 how-btn1 trans-04">
								Get Updates
							</button>
						</div>
					</form>

					<p class="s1-txt5 txt-center wsize2 m-lr-auto p-t-20">
						And don’t worry, we hate spam too! You can unsubcribe at anytime.
					</p>
				</div>
			</div>

		</div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // fungsi untuk menampilkan popup
    function showPopup() {
        // menampilkan popup menggunakan sweetalert
        Swal.fire({
			icon: "info",
            title: "Perbaikan?",
            text: "Harap Tunggu Waktu yang telah ditentukan"
        }).then(function() {
            // event listener pada tombol "OK" pada popup
            var audio = new Audio('{{asset('cdown')}}/images/ff.mp3'); // Pastikan path file audio sudah benar
            audio.play();
        });
    }

    // atur waktu tampilan popup dalam milidetik (1000 ms = 1 detik)
    var popupDelay = 10; // 5 detik dalam milidetik

    // atur event yang memicu tampilan popup
    window.onload = function() {
        setTimeout(function() {
            showPopup();
        }, popupDelay);
    }
</script>
<!--===============================================================================================-->	
	<script src="{{asset('cdown')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('cdown')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('cdown')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('cdown')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('cdown')}}/vendor/countdowntime/moment.min.js"></script>
	<script src="{{asset('cdown')}}/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="{{asset('cdown')}}/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	{{-- <script src="{{asset('cdown')}}/vendor/countdowntime/countdowntime.js"></script> --}}
	<script>
		// Tanggal pembukaan
		var openingDate = new Date('2024-05-03T23:59:00Z');
		
		function updateCountdown() {
			var currentDate = new Date();
			var difference = openingDate - currentDate;
		
			var days = Math.floor(difference / (1000 * 60 * 60 * 24));
			var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((difference % (1000 * 60)) / 1000);
		
			document.getElementById('days').innerText = days;
			document.getElementById('hours').innerText = hours;
			document.getElementById('minutes').innerText = minutes;
			document.getElementById('seconds').innerText = seconds;
		}
		
		// Update setiap 1 detik
		setInterval(updateCountdown, 1000);
		</script>
	


<!--===============================================================================================-->
	<script src="{{asset('cdown')}}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('cdown')}}/js/main.js"></script>

</body>
</html>