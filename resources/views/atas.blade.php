<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sip Coffee</title>

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- Favicon img -->
    <link rel="shortcut icon" href="assets/images/logo/logo1.png">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- All min css -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

   
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-icon text-center d-flex flex-column align-items-center justify-content-center">
                    <img class="loading-logo" src="assets/images/preloader.svg" alt="icon">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Header -->
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
                            <img src="assets/images/logo/SIP-COFFEE (1).png" alt="logo">
                        </a>
                    </div>
                    <div class="header-bar d-xl-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="main-menu">
                        <li>
                            <a href="/ ">Beranda <i class=""></i></a>
                            <ul >
                            </ul>
                        </li>
                        <li>
                            <a href="/tentang">Tentang Kami <i class=""></i></a>
                            <ul >
                                
                            </ul>
                        </li>
                       
                        <li>
                            <a id="mega-menu-btn" href="/inventaris">Katalog <i class=""></i></a>
                          
                        </li>
                        <li>
                            <a href="/siptrace">SipTrace <i class=""></i></a>
                            
                        <li>
                            <a href="/kontak">Kontak</a>
                        </li>
                        {{-- <li class="m-0 menu-btn">
                            <a href="#"><span>Get App</span> <i class="fa-solid fa-angles-right"></i></a>
                        </li> --}}
                    </ul>
                    <div class="drop-down">
                        <div class="wrappper">
                        <img src="{{asset('assets')}}/images/icon/id.jpeg" alt="image" class="ic selectedImg"> <div class="selected">Indonesia</div>
                        </div>
                        <i class="ri-arrow-drop-down-fill arrow"></i>
                        <a href="/en/home">
                        <div class="listt">
                        <div class="itemm">
                        <img src="{{asset('assets')}}/images/icon/en.jpeg" alt="image" class="ic ">
                        <div class="text">English</div>
                        </div>
                        </div>
                        </a>
                        </div>

                       
                                            <style>
                           
                        @import url('https://fonts.googleapis.com/css?family=Poppins& display=swap');
                        {
                        margin: 0;
                        padding: 0;
                        }
                        
                         /* body {
                        D
                        font-family: 'Poppins', sans-serif;
                        background-color: #feca57;
                        min-height: 100vh;
                        display: grid;
                        place-items: center;
                         } */
                        
                        .drop-down {
                        
                        display: flex;
                        
                        
                        position: relative;
                        align-items: center;
                        justify-content: space-between;
                        background-color: #fff;
                        box-shadow: 4px 8px rgba(0,0,0,0.322);
                        width: 200px;
                        padding: 0.5rem 1rem; 
                        cursor: pointer;
                         border-radius: 5px;
                        
                        }
                        .arrow{
                        font-size: 30px;
                        }
                        .wrappper{
                        display: flex; gap: 0.5rem;
                        align-items: center;
                        }
                        img{
                        § 30px
                        height: 30px;
                        }
                        
                         .ic{
                            height:30px;
                            width: 30px;
                        }
                        
                        .listt{
                        background-color:#fff;
                        position: absolute;
                        top: 45px;
                        left: 0;
                        border-radius: 0 0 5px 5px;
                        box-shadow: 4px 8px rgba(0,0,0,0.322);
                        cursor: pointer;
                        max-height: 250px;
                        overflow-y: scroll;
                        width: 100%;
                        display:none;
                        }
                        
                        .show{
                            display:block;
                        }
                        .itemm{
                        display: flex;
                        align-items: center; padding: 0.5rem 1rem; gap: 0.5rem;
                        }
                        .itemm:hover{
                        background-color:
                        rgb(211,211,211);
                        }
                                        </style>
                          
                    
                </div>
            </div>
        </div>
    </header>
    <script>
        const dropdown = document.querySelector(".drop-down");
const list = document.querySelector(".listt");
const selected = document.querySelector(".selected");
const selectedImg = document.querySelector(".selectedImg");
dropdown.addEventListener("click", () => {
	list.classList.toggle("show");
});
list.addEventListener("click", (e) => {});
const img = e.target.querySelector("img");
const text = e.target.querySelector(".text");
selectedImg.src = img.src;
selected.innerHTML = text.innerHTML;
    </script>
    <!-- Header -->