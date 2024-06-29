@extends('home.layouts.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('landing_page') }}/assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Profil</h2>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-6 about-img"
                        style="background-image: url({{ asset('storage/img/' . $profil->foto_sejarah) }});"></div>

                    <div class="col-lg-8">
                        <h4>UPTD <span>.</span></h4>
                        <h2>LABORATORIUM BAHAN KONSTRUKSI</h2>
                        <div class="our-story">
                            {{-- <h4>Est 1988</h4> --}}
                            <h3>SEJARAH</h3>
                            <p>
                                {{ $profil->sejarah }}
                            </p>
                            {{-- <ul>
                                <h4>STRATEGI</h4>
                                <li>
                                    <i class="bi bi-check-circle"></i>
                                    <span>Meningkatkan kualitas sumber daya manusia (SDM).</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle"></i>
                                    <span>Menyediakan Sarana dan prsarana laboratorium yang memadai.</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle"></i>
                                    <span>Mengelola laboratorium secara teransparan dan akuntabel.</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle"></i>
                                    <span>Meningkatkan kapasitas kelembagaan.</span>
                                </li>
                            </ul>

                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Watch
                                    Video</a>
                            </div> --}}
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Visi dan Misi ======= -->
        <section id="alt-services-2" class="alt-services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-5 d-flex flex-column justify-content-center">

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-brightness-high flex-shrink-0"></i>
                            <div>
                                <h3><a href="" class="stretched-link">Visi</a></h3>
                                <h5>
                                    {{ $profil->visi }}
                                </h5>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center">

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-brightness-high flex-shrink-0"></i>
                            <div>
                                <h3><a href="" class="stretched-link">Misi</a></h3>
                                <h5>
                                    {{ $profil->misi }}
                                </h5>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>


                </div>

            </div>
        </section><!-- End Visi dan Misi -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>STRUKTUR ORGANISASI</h2>
                </div>

                <div class="row gy-5">
                    <div class="col-lg-12">
                        <img src="{{ asset('storage/img/' . $profil->struktur_organisasi) }}"
                            class="img-fluid img-thumbnail" alt="">
                    </div>
                </div>
            </div>
        </section><!-- End Our Team Section -->



    </main><!-- End #main -->
@endsection
