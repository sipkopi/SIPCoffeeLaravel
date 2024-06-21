@include('front.id.atas')

    <main>
      <!-- Banner  -->
      <section class="banner" data-background="{{asset('assets')}}/images/bg/banner1.jpg">
        <div class="banner__shape d-none d-xxl-block wow bounceInRight" data-wow-duration=".6s"
            data-wow-delay=".8s">
            <img src="{{asset('assets')}}/images/banner/02.png" alt="shape">
        </div>
       
        <div class="banner__leaf wow slideInLeft d-none d-md-block" data-wow-duration="1s" data-wow-delay="1s">
            <img src=" {{asset('assets')}}/images/shape/leaf.png" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="banner__image wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".2s">
                        <img src="{{asset('assets')}}/images/banner/bl.jpg" alt="image">
                        <div class="banner__image-text">
                            <img src="{{asset('assets')}}/images/banner/Sip Coffee (2).png" alt="strock-text">
                        </div>
                    </div>
                </div>

                 <style>
                            h1.wow.fadeInUp {
    font-size: 40px;
   
    margin: 0;
    padding: 0;
}



                        </style>
                <div class="col-xl-8">
                    <div class="banner__content">
                        <h4 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">SIP Coffee</h4>
                        <h1 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Memajukan Sektor Perkebunan Kopi bersama SIP Coffee<span class="primary-color"></span></h1>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-4">
                                <a href="/tentang" class="btn-one wow fadeInUp" data-wow-duration="1.5s"
                                    data-wow-delay=".5s"><span>Hubungi Kami </span> <i
                                        class="fa-solid fa-angles-right"></i></a>
                            </div>
                            <div class="col-md-8">
                                <div class="banner__content-con wow fadeInUp" data-wow-duration="1.6s"
                                    data-wow-delay=".6s">
                                    <img src="{{asset('assets')}}/images/icon/arrow-long.png" alt="arrow">
                                    <p>
                                       Sistem Ketertelusuran pada SIP Coffee memungkinkan pelacakan setiap tahap produksi  kopi mulai dari penanaman, perawatan, panen, hingga siap jual.
                                        SIP Coffee tidak hanya  membantu dalam memastikan kualitas produk kopi pada Kopi Ekspor Khas Bondowoso, 
                                        tetapi juga dalam memenuhi persyaratan sertifikasi internasional seperti Fair Trade, Rainforest Alliance, dan Organik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <!-- Banner -->

	<div id="colorlib-about">
			<div class="container">
				<div class="row text-center">
					<h2 class="bold">Produk </h2>
				</div>
                <br>
                
				<div class="row">
					<div class="col-md-5 animate-box">
						
						<div class="item">
								<img style="border-radius: 10px;" height="500" width="500" class="img-responsive about-img" src="{{asset('assets')}}/images/banner/ppd.png" alt="Gambar tidak ada">
							</div>
					
					</div>
					<div class="col-md-7 col-md-push-1 animate-box">
						<div class="about-desc">
							<div class="item">
								<h2><span>Arabika Blue Mountain</span></h2>
							</div>
                            <br>
                            <br>
					
							<div class="desc">
								<div class="rotate">
									<h2 class="heading">Produk</h2>
								</div>  
								
								<div class="col-md-8 ">
									<p>Rasa kopi Arabika Blue Mountain Bondowoso dikenal sebagai salah satu yang terbaik di dunia. Secangkir kopi ini sering kali memiliki keasaman yang seimbang, tubuh yang lembut, dan citarasa yang kompleks. Anda mungkin menemukan sentuhan buah-buahan, bunga, serta sedikit keasaman yang menyegarkan.</p>
								</div>
                                <br>
								<div class="d-flex justify-content-between">
									
									
								</div>
								<br>
								<a href="/inventaris" class="btn btn-primary btn-outline">Lihat Produk</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>


<style>
@font-face {
  font-family: 'icomoon';
  src: url("../fonts/icomoon/icomoon.eot?srf3rx");
  src: url("../fonts/icomoon/icomoon.eot?srf3rx#iefix") format("embedded-opentype"), url("../fonts/icomoon/icomoon.ttf?srf3rx") format("truetype"), url("../fonts/icomoon/icomoon.woff?srf3rx") format("woff"), url("../fonts/icomoon/icomoon.svg?srf3rx#icomoon") format("svg");
  font-weight: normal;
  font-style: normal; }

  




#colorlib-about {
  padding: 8em 0;
  clear: both;
  position: relative; }
  @media screen and (max-width: 768px) {
    #colorlib-services,
    #colorlib-contact,
    #colorlib-work,
    #colorlib-blog,
    #colorlib-testimony,
    #colorlib-progress,
    #colorlib-contact,
    #colorlib-about {
      padding: 3.5em 0; } }

      
.bold {
  position: absolute;
z-index: -100;

  left: 0;
  right: 0;
  font-size: 250px;
  color: #f0f0f0;
  font-weight: 700; }
  @media screen and (max-width: 768px) {
    .bold {
      font-size: 60px; } }

.rotate {
  position: absolute;
  top: .9em;
  left: -50px; }
  .rotate .heading {
    font-family: "Karla", Arial, sans-serif;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1em;
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(90deg);
    -webkit-transform-origin: left top 0;
    -moz-transform-origin: left top 0;
    -ms-transform-origin: left top 0;
    -o-transform-origin: left top 0;
    transform-origin: left top 0;
    position: relative; }
    .rotate .heading:after {
      position: absolute;
      top: 8px;
      right: -40px;
      content: '';
      background: #000;
      width: 40px;
      height: 1px; }

    
.about-desc {
  padding-top: 3em; }
  .about-desc h2 {
    line-height: 1.3; 
    
}
    .about-desc h2 span {
      display: block;
      margin-bottom: 0;
      color: #000;
      font-size: 50px;
      font-weight:normal;
      font-family: "Playfair Display", Georgia, serif; }
  .about-desc .desc {
    padding-left: 6em;
    position: relative; }
  .about-desc .rotate {
    position: absolute;
    top: 7px;
    left: 30px; }
    .about-desc .rotate .heading {
      font-family: "Karla", Arial, sans-serif;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1em;
      -webkit-transform: rotate(90deg);
      -moz-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
      -o-transform: rotate(90deg);
      transform: rotate(90deg);
      -webkit-transform-origin: left top 0;
      -ms-transform-origin: left top 0;
      transform-origin: left top 0;
      position: relative; }
      .about-desc .rotate .heading:after {
        position: absolute;
        top: 8px;
        right: -40px;
        content: '';
        background: #000;
        width: 40px;
        height: 1px; }

        

        .btn {
  margin-right: 4px;
  margin-bottom: 4px;
  font-size: 13px !important;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 2px;
  -webkit-border-radius: 1px;
  -moz-border-radius: 1px;
  -ms-border-radius: 1px;
  border-radius: 1px;
  -webkit-transition: 0.5s;
  -o-transition: 0.5s;
  transition: 0.5s;
  padding: 8px 20px; }
  .btn.btn-md {
    padding: 8px 20px !important; }
  .btn.btn-lg {
    padding: 18px 36px !important; }
  .btn:hover, .btn:active, .btn:focus {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline: none !important; }

.btn-primary {
  background: #9BEC00;
  color: #fff;
  border: 2px solid #9BEC00; }
  .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
    background: #9BEC00 !important;
    border-color: #9BEC00 !important; }
  .btn-primary.btn-outline {
    background: transparent;
    color: #4d4d4d;
    border: 1px solid #d9d9d9; }
    .btn-primary.btn-outline:hover, .btn-primary.btn-outline:focus, .btn-primary.btn-outline:active {
      background: #9BEC00;
      color: #fff; }

      .btn-outline {
  background: none;
  border: 2px solid gray;
  font-size: 16px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s; }
  .btn-outline:hover, .btn-outline:focus, .btn-outline:active {
    -webkit-box-shadow: none;
    box-shadow: none; }
</style>
        <!-- Work -->
        <section class="work pt-130 pb-130 bg-image" data-background="{{asset('assets')}}/images/bg/banner1.jpg">
            <div class="container">
                <div class="pb-65 bor-bottom mb-65">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="section-header m-0">
                                <h5 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s"><img
                                        src="{{asset('assets')}}/images/icon/leaf.svg" alt="image"> Transformasi</h5>
                                <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Transformasi Positif dalam Industri Kopi </h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="wow fadeInUp" data-wow-duration="1.6s" data-wow-delay=".6s">Meningkatkan transparansi dan keberlanjutan dalam industri kopi.
                                 Memberdayakan produsen untuk mengurangi kemiskinan dan melindungi lingkungan. 
                                Memastikan hasil panen berkualitas dan memperkuat industri kopi global."</p>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1.2s"
                        data-wow-delay=".2s">
                        <div class="work__item">
                            <div class="work__item-icon">
                                <img src="{{asset('assets')}}/images/icon/search (3) (1).png" alt="icon">
                                <span>01</span>
                            </div>
                            <h3>Ketertelusuran rantai pasokan kopi global</h3>
                            <p>Kami memperbaiki masalah rantai pasokan yang rusak dengan meningkatkan transparansi data dalam industri kopi.</p>
                            <a class="" href=""><i
                                    class=""></i></a>
                            <div class="work__item-leaf">
                                <img src="{{asset('assets')}}/images/shape/work-leaf.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1.4s"
                        data-wow-delay=".4s">
                        <div class="work__item">
                            <div class="work__item-icon">
                                <img src="{{asset('assets')}}/images/icon/product (1).png" alt="icon">
                                <span>02</span>
                            </div>
                            <h3>Produktivitas Pertanian Kopi 
                            </h3>
                            <p>
                                Kami memberdayakan produsen kopi untuk mengentaskan kemiskinan sambil melindungi lingkungan. Manusia, Bumi, Keuntungan.</p>
                            <a class="" href=""><i
                                    class=""></i></a>
                            <div class="work__item-leaf">
                                <img src="{{asset('assets')}}/images/shape/work-leaf.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1.6s"
                        data-wow-delay=".6s">
                        <div class="work__item">
                            <div class="work__item-icon">
                                <img src="{{asset('assets')}}/images/icon/list (1).png" alt="icon">
                                <span>03</span>
                            </div>
                            <h3>rantai pasokan kopi yang inklusif dan dapat ditelusuri.</h3>
                            <p>Mendukung bisnis dengan digitalisasi dan verifikasi rantai pasokan global melalui 
                                teknologi berbasis manusia dan solusi lapangan.</p>
                            <a class="" href=""><i
                                    class=""></i></a>
                            <div class="work__item-leaf">
                                <img src="{{asset('assets')}}/images/shape/work-leaf.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1.8s"
                        data-wow-delay=".8s">
                        <div class="work__item">
                            <div class="work__item-icon">
                                <img src="{{asset('assets')}}/images/icon/monitoring (1).png" alt="icon">
                                <span>04</span>
                            </div>
                            <h3>Monitor Pertumbuhan Tanaman Secara Real-Time</h3>
                            <p>membantu petani dalam merespons perubahan kondisi tanaman 
                                dengan cepat dan memastikan hasil panen yang berkualitas.
                            </p>
                            <a class="" href=""><i
                                    class=""></i></a>
                            <div class="work__item-leaf">
                                <img src="{{asset('assets')}}/images/shape/work-leaf.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Work-->

        <!-- Achievement  -->
        <div class="achievement-two mt-130">
            <div class="container">
                <div class="achievement p-5" data-background="{{asset('assets')}}/images/bg/dt-7.jpg">
                    <div class="row g-4 align-items-center justify-content-between">
                        <div class="col-lg-5 achievement__bor-right wow fadeInUp" data-wow-duration="1.2s"
                            data-wow-delay=".2s">
                            <div class="achievement__item">
                                <h2 class="text-white pt-3 pb-3">Our trees
                                    have been monitored</h2>
                            </div>
                        </div>
                        <div class="col-lg-2 achievement__bor-right wow fadeInUp" data-wow-duration="1.4s"
                            data-wow-delay=".4s">
                            <div class="achievement__item text-center">
                                <img src="{{asset('assets')}}/images/icon/achieve1.png" alt="icon">
                                <h5>Trees planted</h5>
                                <span class="count">6,472,068</span>
                            </div>
                        </div>
                        <div class="col-lg-2 achievement__bor-right wow fadeInUp" data-wow-duration="1.6s"
                            data-wow-delay=".6s">
                            <div class="achievement__item text-center">
                                <img src="{{asset('assets')}}/images/icon/achieve2.png" alt="icon">
                                <h5>Families helped</h5>
                                <span class="count">38,768</span>
                            </div>
                        </div>
                        <div class="col-lg-2 wow fadeInUp" data-wow-duration="1.8s" data-wow-delay=".8s">
                            <div class="achievement__item text-center">
                                <img src="{{asset('assets')}}/images/icon/achieve3.png" alt="icon">
                                <h5>CO2 captured (tonne)</h5>
                                <span class="count">1,193,210</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Achievement -->
        
  <!-- Blog -->
  <section class="blog pt-130 pb-130">
    <div class="blog__shape d-none fall__animation d-sm-block">
        <img src="{{asset('assets')}}/images/shape/blog.png" alt="shape">
    </div>
    <div class="container">
        <div class="blog__head-wrp mb-65">
            <div class="section-headerr m-0 ">
                <h5 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">
                       </h5>
                <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Kontribusi Kami Dalam <br>Meningkatkan 
                    Nilai Ekspor Kopi
                </h2>
            </div>
           
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-xl-8 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".2s">
                <div class="blog__item-left">
                    <div class="swiper blog__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row g-4">
                                    <div class="col-md-5">
                                        <div class="blog__item-left-content">
                                            
                                            <h3><a href="blog-single.html">Pelacakan</a></h3>
                                            <p>kami merinci perjalanan kopi dari kebun kopi yang subur hingga ke cangkir Anda. 
                                                Kami berkomitmen untuk melacak setiap langkah produksi dengan seksama,
                                                 memastikan keamanan pangan yang tinggi dan memenuhi dengan teliti persyaratan peraturan yang ketat.</p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="image">
                                            <img src="{{asset('assets')}}/images/blog/im-1.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row g-4">
                                    <div class="col-md-5">
                                        <div class="blog__item-left-content">
                                           
                                            <h3><a href="blog-single.html">Inklusif</a></h3>
                                            <p>kami melibatkan semua pelaku rantai pasokan, dari petani hingga distributor, 
                                                untuk memastikan kualitas kopi yang superior dan keberlanjutan. Keterlibatan ini juga menciptakan peluang ekonomi yang adil, 
                                                mendukung pembangunan sosial dan ekonomi di komunitas-komunitas pertanian kopi kami.</p>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="image">
                                            <img src="{{asset('assets')}}/images/blog/im-2.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row g-4">
                                    <div class="col-md-5">
                                        <div class="blog__item-left-content">
                                           
                                            <h3><a href="blog-single.html">Peningkatan kualitas</a></h3>
                                            <p>kami mendukung para petani kopi dengan meningkatkan produktivitas dan pendapatan mereka. 
                                                Tidak hanya itu, kami juga berkomitmen pada ketahanan terhadap dampak perubahan iklim.
                                                 Dengan demikian, kontribusi kami bertujuan untuk meningkatkan keberlanjutan dan kesejahteraan dalam sektor pertanian kopi.</p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="image">
                                            <img src="{{asset('assets')}}/images/blog/im-3.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog__item-left-dot-wrp">
                        <div class="dot blog__dot"></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<!-- Blog -->


        <!-- Involved area start here -->
        <section class="involve-two pt-130 pb-130">
            <div class="involve-two__shape d-none d-md-block animation__rotate">
                <img src="{{asset('assets')}}/images/logo/1.png" alt="shape">
            </div>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-xl-6">
                        <div class="involve-two__image">
                            <img src="{{asset('assets')}}/images/banner/raisa3.jpg" alt="image">
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-two__right-item">
                            <div class="section-header mb-4">
                                <h5 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s"><img
                                        src="{{asset('assets')}}/images/icon/leaf.svg" alt="image"> Potensi</h5>
                                <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Potensi Kopi Bondowoso</h2>
                                <p class="wow fadeInUp" data-wow-duration="1.6s" data-wow-delay=".6s">Kopi arabika Bondowoso semakin diminati di pasar internasional karena meningkatnya produktivitas perkebunan dan kualitas citarasa alami yang khas.
                                 Kabupaten ini, dikenal sebagai "republik kopi," memiliki ekspor kopi terbesar, dengan varietas paling populer seperti kopi ijen raung. 
                                 Citarasa khas kopi arabika Bondowoso mencakup rasa asam dan manis yang lemah, serta aroma jahe yang unik. Dalam menghadapi persaingan bisnis yang semakin ketat, petani kopi dan
                                  barista berupaya mempertahankan nama baik kopi tersebut dengan memperbarui citarasa tanpa merusak rasa aslinya, termasuk dengan menawarkan kopi-kopi dengan rasa tambahan yang inovatif.</p>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-5 wow fadeInUp" data-wow-duration="1.8s" data-wow-delay=".8s">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets')}}/images/banner/narray.png" alt="image">
                                        <h4 class="ml-20">Narray Coffe</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 wow fadeInUp" data-wow-duration="1.8s" data-wow-delay=".8s">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets')}}/images/logo/logorr.png" alt="image">
                                        <h4 class="ml-20">Sekolah Kopi Raisa </h4>
                                    </div>
                                </div>
                            </div>
                            <ul class="wow mt-4 fadeInDown" data-wow-duration="1.2s" data-wow-delay=".2s">
                                <li class="mb-20"><img class="pe-2" src="{{asset('assets')}}/images/icon/leaf.svg" alt="icon">
                                    Berkelanjutan
                                </li>
                                <li class="mb-20"><img class="pe-2" src="{{asset('assets')}}/images/icon/leaf.svg" alt="icon">
                                    Terintegrasi
                                </li>
                                <li><img class="pe-2" src="{{asset('assets')}}/images/icon/leaf.svg" alt="icon">
                                    Terdata Dari Awal
                                </li>
                            </ul>
                            <div class="about_info d-flex align-items-center pt-60 wow fadeInUp"
                                data-wow-duration="1.9s" data-wow-delay=".9s">
                                <a href="/kontak" class="btn-one"><span>Hubungi Kami</span> <i
                                        class="fa-solid fa-angles-right"></i></a>
                                <span class="bor-left d-none d-sm-block mx-4"></span>
                                <div class="info d-flex flex-wrap align-items-center">
                                    <i class="fa-solid fa-phone-volume ring-animation"></i>
                                    <div class="about_info_con">
                                        <span class="d-block text-capitalize">Kontak Kami</span>
                                        <a href="https://wa.me/085856867561">+62 8585 6867 561</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Involved area end here -->

       
        <section class="statistic-area sub-bg pt-130 pb-130">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-6">
                        <div class="image">
                            <img src="{{asset('assets')}}/images/banner/flow.png" alt="image">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="section-header">
                            
                            <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Dunia Memerlukan Inovasi Holistik untuk Mencapai Pertumbuhan Ekonomi yang Berkelanjutan.</h2>
                            <p class="wow fadeInUp" data-wow-duration="1.6s" data-wow-delay=".6s">Dalam konteks perdagangan kopi, inovasi holistik memainkan peran sentral dalam upaya mencapai pertumbuhan ekonomi yang berkelanjutan. 
                                Ini melibatkan usaha untuk meningkatkan pendapatan para petani kopi dengan mengimplementasikan praktik pertanian yang lebih efisien, sambil mengutamakan keberlanjutan lingkungan melalui pengurangan penggunaan pestisida dan herbisida,
                                 serta perbaikan manajemen limbah. Selain itu, terdapat juga penekanan pada transparansi dalam rantai pasokan kopi, yang diperoleh melalui pemanfaatan teknologi untuk pelacakan asal-usul kopi.
                                  Dengan demikian, inovasi ini memiliki potensi besar untuk membentuk ekosistem perdagangan kopi yang adil, ramah lingkungan, dan berkelanjutan.</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog  -->
        <section class="blog-two pt-130">
            <div class="blog-two__shape sway__animation">
                <img src="{{asset('assets')}}/images/shape/blog.png" alt="shape">
            </div>
            <div class="container">
                <div class="blog__head-wrp mb-65">
                    <div class="section-header m-0">
                        <h5 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s"><img
                                src="{{asset('assets')}}/images/icon/leaf.svg" alt="image"> Berita Kopi</h5>
                        <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".4s">Berita Tentang Dunia Kopi
                            <br>
                            
                        </h2>
                    </div>
               
                </div>
            </div>
            <div class="swiper blog-two__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="donation__item blog-two__item bor">
                            <div class="blog-two__image mb-85">
                                <div class="image">
                                    <img src="{{asset('assets')}}/images/blog/leoo1.jpg" alt="image">
                                    <div class="blog-two__info">
                                        <h4>15 <br> JUNI</h4>
                                        <span>2023</span>
                                    </div>
                                </div>
                            </div>
                            <h3><a href="https://erawisata.com/kuliner/cafe-hits-di-bondowoso/">Ketahui lebih banyak karakteristik kopi arabica Java Ijen Raung</a></h3>
                            <a class="blog-two__item-arrow" href="https://erawisata.com/kuliner/cafe-hits-di-bondowoso/"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="donation__item blog-two__item bor">
                            <div class="blog-two__image mb-85">
                                <div class="image">
                                    <img src="{{asset('assets')}}/images/blog/leoo2.jpg" alt="image">
                                    <div class="blog-two__info">
                                        <h4>22 <br> MARET</h4>
                                        <span>2024</span>
                                    </div>
                                </div>
                            </div>
                            <h3><a href="https://www.journaluniversity.com/ciri-kopi-arabika-bondowoso/">Ciri Kopi Arabika Bondowoso Yang Berkualitas Tinggi</a>
                            </h3>
                            <a class="blog-two__item-arrow" href="https://www.journaluniversity.com/ciri-kopi-arabika-bondowoso/"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="donation__item blog-two__item bor">
                            <div class="blog-two__image mb-85">
                                <div class="image">
                                    <img src="{{asset('assets')}}/images/banner/fah.jpg" alt="image">
                                    <div class="blog-two__info">
                                        <h4> 16 <br> JUNI</h4>
                                        <span>2023</span>
                                    </div>
                                </div>
                            </div>
                            <h3><a href="https://www.antaranews.com/berita/3592740/gubernur-khofifah-bondowoso-penghasil-kopi-terbesar-di-jawa-timur">Gubernur Khofifah: Bondowoso penghasil kopi terbesar di Jawa Timur</a>
                            </h3>
                            <a class="blog-two__item-arrow" href="https://www.antaranews.com/berita/3592740/gubernur-khofifah-bondowoso-penghasil-kopi-terbesar-di-jawa-timur"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="donation__item blog-two__item bor">
                            <div class="blog-two__image mb-85">
                                <div class="image">
                                    <img src="{{asset('assets')}}/images/blog/kopi-RAISA.jpg" alt="image">
                                    <div class="blog-two__info">
                                        <h4>7 <br> JULI</h4>
                                        <span>2022</span>
                                    </div>
                                </div>
                            </div>
                            <h3><a href="https://timesindonesia.co.id/peristiwa-daerah/417558/raisa-sekolah-kopi-untuk-siswa-dan-warga-bondowoso#google_vignette">RAISA, Sekolah Kopi untuk Siswa dan Warga Bondowoso</a>
                            </h3>
                            <a class="blog-two__item-arrow" href="https://timesindonesia.co.id/peristiwa-daerah/417558/raisa-sekolah-kopi-untuk-siswa-dan-warga-bondowoso#google_vignette"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Blog  -->
    </main>

    @include('front.id.bawah')

    <!-- Back to top area start here -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top area end here -->

    <!-- Jquery 3. 7. 1 Min Js -->
    <script src="{{asset('assets')}}/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap min Js -->
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <!-- Swiper bundle min Js -->
    <script src="{{asset('assets')}}/js/swiper-bundle.min.js"></script>
    <!-- Counterup min Js -->
    <script src="{{asset('assets')}}/js/jquery.counterup.min.js"></script>
    <!-- Wow min Js -->
    <script src="{{asset('assets')}}/js/wow.min.js"></script>
    <!-- Magnific popup min Js -->
    <script src="{{asset('assets')}}/js/magnific-popup.min.js"></script>
    <!-- Nice select min Js -->
    <script src="{{asset('assets')}}/js/nice-select.min.js"></script>
    <!-- Isotope pkgd min Js -->
    <script src="{{asset('assets')}}/js/isotope.pkgd.min.js"></script>
    <!-- Waypoints Js -->
    <script src="{{asset('assets')}}/js/jquery.waypoints.js"></script>
    <!-- Script Js -->
    <script src="{{asset('assets')}}/js/script.js"></script>
</body>

</html>