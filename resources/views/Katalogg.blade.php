<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sip Coffe</title>
    <!-- Favicon img -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/logo/logo1.png">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- All min css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <link href="{{asset('assets')}}/aos/aos.css" rel="stylesheet">
</head>

<body>

    <!-- Preloader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-icon text-center d-flex flex-column align-items-center justify-content-center">
                    <img class="loading-logo" src="{{asset('assets')}}/images/preloader.svg" alt="icon">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader area end -->

    <!-- Header area start here -->
    <header class="header">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="header-top-wrp">
                    <ul class="info">
                        <li><i class="fa-solid fa-paper-plane"></i> <a href="mailto:sipkopi.helpdesk@gmail.com">Sipkopi.helpdesk@gmail.com</a></li>
                        <li class="bor-left ms-4 ps-4"><i class="fa-solid fa-location-dot"></i> <a href="https://maps.app.goo.gl/rt2jWrGCu6ixBWmn7"> Jl. Raya Situbondo, Blindungan, Kabupaten Bondowoso, Jawa Timur 68211</a>
                        </li>
                    </ul>
                    <ul class="link-info">
                        <li class="bor-right"><a href="https://www.instagram.com/pkmpi.sipcoffee?igsh=MThibHRocnQwZHczOA=="><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="bor-right"><a href="https://www.linkedin.com/in/aditya-hari-kurniawan-64370924a/?trk=people_directory&originalSubdomain=id"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="https://youtube.com/@SIPKopi?si=h9WoAYIKHyVGoNn4"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-section">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo-menu">
                        <a href="/" class="logo">
                            <img src="{{asset('assets')}}/images/logo/SIP-COFFEE (1).png" alt="logo">
                        </a>
                    </div>
                    <div class="header-bar d-xl-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="main-menu">
                        <li>
                        <a href="/">Beranda <i class=""></i></a>
                            <ul >
                            </ul>
                        </li>
                        <li>
                            <a href="aboutt">Tentang Kami <i class=""></i></a>
                            <ul >
                                
                            </ul>
                        </li>
                       
                        <li>
                            <a id="mega-menu-btn" href="Katalog">Katalog <i class=""></i></a>
                           
                        </li>
                        <li>
                            <a href="sipTracee">SipTrace <i class=""></i></a>
                            
                        <li>
                            <a href="Kontak">Kontak</a>
                        </li>
                        <li class="m-0 menu-btn">
                            <a href="#"><span>Get App</span> <i class="fa-solid fa-angles-right"></i></a>
                        </li>
                    </ul>
                    <!-- Mega menu area start here -->
                    
                          
                    <!-- Mega menu area end here -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header area end here -->
    <style>


.top-bar span {
    flex: 1; /* Ini memastikan span mengambil semua ruang yang tersedia */
}

.top-bar .form-select {
    flex: 0; /* Ini memastikan form select hanya mengambil ruang yang dibutuhkannya */
}

.d-none {
            display: none;
        }


    </style>

    
    <main>
        
        <!-- Shop  -->
        <!-- Shop  -->
  

<
        <div class="shop pt-130 pb-130">
  <div class="container">
    <div class="row g-4">
        
      <div class="col-lg-8">
        <div class="top-bar sub-bg mb-4 d-flex flex-wrap justify-content-between align-items-center main-bg radius10 px-4 py-3">
        <input type="text" name="" placeholder="cari"  class="form-control form-control-lg shadow-none" id="search">
        <div class="table-responsive mt-5">
            <table class="table">

            </table>
        </div>
        <span id="selected-filter-text">all</span> 
          <select class="form-select ml-auto" id="portfolio-filters"> <!-- Memindahkan dropdown ke kanan dengan class ml-auto -->
            <option value="*">Semua</option>
            <option value=".latest">Terbaru</option>
            <option value=".update">Ter</option>
            <option value=".new">Terpopuler</option>
          </select>
        </div>

        <div class="product light">
          <div class="container">
            <div class="row g-4 portfolio-container">

              <div class="col-md-4 portfolio-item latest">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd-1.jpg" alt="image">
                  <div class="content">
                    <h4>Wood Bowls</h4>
                    <del>500k</del> <span>- 250k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 portfolio-item latest">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd-2.jpg" alt="image">
                  <div class="content">
                    <h4>Bamboo Trays</h4>
                    <del>300k</del> <span>- 150k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 portfolio-item update">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd.jpg" alt="image">
                  <div class="content">
                    <h4>Wood Frame</h4>
                    <del>300k</del> <span>- 150k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 portfolio-item update">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd-1.jpg" alt="image">
                  <div class="content">
                    <h4>Bamboo Utensils</h4>
                    <del>500k</del> <span>- 250k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 portfolio-item new">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd-2.jpg" alt="image">
                  <div class="content">
                    <h4>Wood Coasters</h4>
                    <del>300k</del> <span>- 150k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 portfolio-item new">
                <div class="item">
                  <img src="{{asset('assets')}}/images/shop/prd.jpg" alt="image">
                  <div class="content">
                    <h4>Bamboo Placemats</h4>
                    <del>300k</del> <span>- 150k</span>
                  </div>
                  <div class="icon">
                    <a href="https://wa.me/085856867561"><i class="fa-solid fa-phone"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

                    <div class="col-lg-4">
                        <div class="blog-slingle">
                            <div class="right-item sub-bg">
                                
                                <h4 class="mb-30">Produk Populer</h4>
                                <div class="recent-post p-0 bor-bottom pb-4 mb-4 sub-bg">
                                    <div class="img"><img src="{{asset('assets')}}/images/shop/prd-1.jpg" alt="image"></div>
                                    <div class="con">
                                        <h5><a href="">Code Gold</a></h5>
                                        <span>250k</span>
                                    </div>
                                </div>
                                <div class="recent-post p-0 bor-bottom pb-4 mb-4 sub-bg">
                                    <div class="img"><img src="{{asset('assets')}}/images/shop/prd.jpg" alt="image"></div>
                                    <div class="con">
                                        <h5><a href="">Code Brown</a></h5>
                                        <span>150k</span>
                                    </div>
                                </div>
                                <div class="recent-post p-0 bor-bottom pb-4 mb-4 sub-bg">
                                    <div class="img"><img src="{{asset('assets')}}/images/shop/prd-2.jpg" alt="image"></div>
                                    <div class="con">
                                        <h5><a href="">Code Black</a></h5>
                                        <span>150k</span>
                                    </div>
                                </div>
                                <h4 class="mb-30 mt-40"></h4>
                                <div class="swiper hot-items__slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="image">
                                                <img src="{{asset('assets')}}/images/shop/prd-1.jpg" alt="image">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image">
                                                <img src="{{asset('assets')}}/images/shop/prd.jpg" alt="image">
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
        <!-- Shop page area end here -->

    </main>

    <!-- Footer area start here -->
    <footer class="footer footer-two pt-130 bg-image " data-background="{{asset('assets')}}/images/bg/footer-two-bg.jpg">
        <div class="container">
            <div class="footer-two__wrp secondary-bg">
                <div class="row">
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">
                        <div class="footer__item px-4 pt-40 pb-40 footer-two__item primary-bg">
                            <a href="/" class="logo mb-30">
                                <img src="{{asset('assets')}}/images/logo/SIP-COFFEE.png" alt="logo">
                            </a>
                            <p class="mb-20 pb-20 bor-bottom">
                                Kualitas kopi semakin meningkat dengan inovasi, perhatian pada detail, dan dedikasi para ahli,
                                 Setiap langkah berkontribusi pada kelezatannya.</p>
                            <div class="social-icon">
                               
                                <a href="https://www.instagram.com/pkmpi.sipcoffee?igsh=MThibHRocnQwZHczOA=="><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/aditya-hari-kurniawan-64370924a/?trk=people_directory&originalSubdomain=id"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="https://youtube.com/@SIPKopi?si=h9WoAYIKHyVGoNn4"><i class="fa-brands fa-youtube"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 wow fadeInUp text-black " data-wow-duration="1.4s" data-wow-delay=".6s">
                        <div class="footer__item footer-two__item pt-60 pb-40 ">
                            <div class="footer__item-title ">
                                <h4>Tautan terkait</h4>
                                <span class="footer__item-title-line "></span><span
                                    class="footer__item-title-line2 "></span>
                            </div>
                            <ul>
                                <li class="pb-1"><a href="i/"><i
                                            class="fa-solid fa-chevron-right pe-1 primary-color"></i>
                                        Beranda
                                    </a>
                                </li>
                                <li class="pb-1"><a href="aboutt"><i
                                            class="fa-solid fa-chevron-right pe-1 primary-color"></i>
                                        Tentang Kami
                                    </a>
                                </li>
                                <li class="pb-1"><a href="Katalog"><i
                                            class="fa-solid fa-chevron-right pe-1 primary-color"></i>
                                       Katalog
                                    </a>
                                </li>
                                <li class="pb-1"><a href="sipT"><i
                                            class="fa-solid fa-chevron-right pe-1 primary-color"></i>
                                        Inovasi
                                    </a>
                                </li>
                                <li><a href="Kontak"><i
                                            class="fa-solid fa-chevron-right pe-1 primary-color"></i> Kontak Kami
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.6s" data-wow-delay=".4s">
                        <div class="footer__item footer-two__item pt-60 pb-40">
                            <div class="footer__item-title">
                                <h4>Kunjungi  Kami</h4>
                                <span class="footer__item-title-line"></span><span
                                    class="footer__item-title-line2"></span>
                            </div>
                            <ul>
                                <li class="pb-3"><a href="https://maps.app.goo.gl/rt2jWrGCu6ixBWmn7"><i
                                            class="fa-solid fa-location-dot pe-1 primary-color"></i>
                                            Jl. Raya Situbondo, Blindungan, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68211
                                    </a>
                                </li>
                                <li class="pb-3"><a href="https://wa.me/085856867561"><i
                                            class="fa-solid fa-phone-volume pe-1 primary-color"></i>
                                        +62-8585-6867-561
                                    </a></li>
                                <li><a href="mailto:sipkopi.helpdesk@gmail.com"><i class="fa-solid fa-envelope pe-1 primary-color"></i>
                                        Sipkopi.helpdesk@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.8s" data-wow-delay=".8s">
                        <div class="footer__item footer-two__item pt-60 pb-40 pe-4">
                            <div class="footer__item-title">
                                <h4>Lebih Dekat Dengan Kami</h4>
                                <span class="footer__item-title-line"></span><span
                                    class="footer__item-title-line2"></span>
                            </div>
                            <p class="text-white">Hubungi Email Kami Jika Ingin Melakukan Kerja sama
                            </p>
                            <div class="input-area mt-30">
                                <input type="text" placeholder="Your Email">
                                <button>
                                    <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright footer-two__copyright">
            <p>&copy; Copyright 2024 <a href="#0">Sip Coffe</a> All Rights Reserved</p>
        </div>
    </footer>
    <!-- Footer area end here -->

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
    {{-- <script src="{{asset('assets')}}/js/script.js"></script> --}}
    <script src="{{asset('assets')}}/js/js.js"></script>
    <script src="{{asset('assets')}}/aos/aos.js"></script>
    
</body>

</html>