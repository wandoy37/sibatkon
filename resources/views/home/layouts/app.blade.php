<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TERBAGI - Terwujudnya Pelayanan Prima Berbasis Digital</title>
    <meta content="Terwujudnya Pelayanan Prima Berbasis Digital" name="description">
    <meta content="Terwujudnya Pelayanan Prima Berbasis Digital" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/logo_kaltim.png') }}" rel="icon">
    <link href="{{ asset('img/logo_kaltim.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing_page') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landing_page') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('landing_page') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('landing_page') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('landing_page') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('landing_page') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing_page') }}/assets/css/main.css" rel="stylesheet">

    <style>
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            /* Menghilangkan dekorasi tautan */
        }



        .logo-text {
            display: flex;
            flex-direction: column;
            /* Menempatkan teks di bawah h1 */
        }

        .logo-text h1,
        .logo-text small {
            margin: 0;
            /* Menghilangkan margin bawaan */
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Coat_of_arms_of_East_Kalimantan.svg/490px-Coat_of_arms_of_East_Kalimantan.svg.png"
                    style="max-width: 60px; max-height: 60px;" class="img-fluid" alt="">
                <div class="logo-text">
                    <h1>TERBAGI</h1>
                    <small class="text-white">Terwujudnya Pelayanan Prima Berbasis Digital</small>
                </div>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            @include('home.layouts.navbar')

        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>TERBAGI</h3>
                            <p>
                                Jl. Teuku Umar No. 1 <br>
                                75126, Samarinda<br><br>
                                <strong>Telp:</strong> 0541-2775705<br>
                                <strong>Email:</strong> uptdlbk.pukaltim@gmail.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Navigasi Links</h4>
                        <ul>
                            <li><a href="{{ route('home.index') }}">Home</a></li>
                            <li><a href="{{ route('home.profil') }}">Profil</a></li>
                            <li><a href="#section_permohonan_pengujian">Daftar Permohonan Pengujian</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright {{ date('Y') }}<strong>
                        <br>
                        <span>TERBAGI</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing_page') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('landing_page') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing_page') }}/assets/js/main.js"></script>

    @if (session('scroll_to_section'))
        <script>
            window.onload = function() {
                var sectionId = "{{ session('scroll_to_section') }}";
                var section = document.getElementById(sectionId);
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        </script>
    @endif

</body>

</html>
