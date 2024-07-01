@extends('home.layouts.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">TERBAGI</h2>
                        <p data-aos="fade-up">
                            Terwujudnya Pelayanan Prima Berbasis Digital kunci dalam industri konstruksi
                            modern dengan digitalisasi proses permohonan pengujian
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#section_permohonan_pengujian"
                            class="btn-get-started">
                            DAFTAR PERMOHONAN PENGUJIAN
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url({{ asset('landing_page') }}/assets/img/hero-carousel/hero-carousel-1.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('landing_page') }}/assets/img/hero-carousel/hero-carousel-2.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('landing_page') }}/assets/img/hero-carousel/hero-carousel-3.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('landing_page') }}/assets/img/hero-carousel/hero-carousel-4.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('landing_page') }}/assets/img/hero-carousel/hero-carousel-5.jpg)">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Permohonan Pengujian Section ======= -->
        <section id="section_permohonan_pengujian" class="get-started section-bg">
            <div class="container">

                <div class="row justify-content-between gy-4">

                    {{-- <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up"> --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>PERMOHONAN PENGUJIAN</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('registrasi.pengujian.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        use Illuminate\Support\Str;
                                        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                                        $randomString = substr(str_shuffle($characters), 0, 6);
                                    @endphp
                                    <input type="text" name="code_form" value="{{ $randomString }}" hidden>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="py-2">Identitas Pemohon</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Pemohon</label>
                                                <input type="text" name="nama_pemohon"
                                                    class="form-control @error('nama_pemohon') is-invalid @enderror"
                                                    value="{{ old('nama_pemohon') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nomor HP/WhatsApp Pemohon</label>
                                                <input type="text" name="no_hp_pemohon"
                                                    class="form-control @error('no_hp_pemohon') is-invalid @enderror"
                                                    value="{{ old('no_hp_pemohon') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Alamat Pemohon</label>
                                                <input type="text" name="alamat_pemohon"
                                                    class="form-control @error('alamat_pemohon') is-invalid @enderror"
                                                    value="{{ old('alamat_pemohon') }}">
                                                <input type="text" name="email_pemohon"
                                                    class="form-control @error('email_pemohon') is-invalid @enderror"
                                                    value="-" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="my-4">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="py-2">Bahan Konstruksi</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Bahan</label>
                                                <select class="form-select @error('bahan_id') is-invalid @enderror"
                                                    name="bahan_id">
                                                    <option value="">--pilih jenis bahan--</option>
                                                    @foreach ($bahans as $bahan)
                                                        <option value="{{ $bahan->id }}"
                                                            {{ old('bahan_id') == $bahan->id ? 'selected' : '' }}>
                                                            {{ $bahan->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Quantitiy / Banyaknya</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" name="quantity"
                                                        class="form-control @error('quantity') is-invalid @enderror"
                                                        value="{{ old('quantity') }}">
                                                    <span class="input-group-text">Sampel</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan Lain</label>
                                                <input type="text" name="keterangan_lain"
                                                    class="form-control @error('keterangan_lain') is-invalid @enderror"
                                                    value="{{ old('keterangan_lain') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Uraian Pengujian</label>
                                                <textarea class="form-control @error('uraian_pengujian') is-invalid @enderror" name="uraian_pengujian"
                                                    rows="2">{{ old('uraian_pengujian') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Keperluan Pengujian</label>
                                                <input type="text" name="keperluan_pengujian"
                                                    class="form-control @error('keperluan_pengujian') is-invalid @enderror"
                                                    value="{{ old('keperluan_pengujian') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="my-4">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="py-2">
                                                <h4>Pelaksana / Kontraktor</h4>
                                                <small>
                                                    Laporan pengujian dibuat untuk
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="kontraktor_nama"
                                                    class="form-control @error('kontraktor_nama') is-invalid @enderror"
                                                    value="{{ old('kontraktor_nama') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" name="kontraktor_alamat"
                                                    class="form-control @error('kontraktor_alamat') is-invalid @enderror"
                                                    value="{{ old('kontraktor_alamat') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="py-2">
                                                <h4>Pernyataan</h4>
                                                <ul>
                                                    <li>Setelah laporan ini diterbitkan, kmi tidak akan minta di adakannya
                                                        perubahan pada laporan <span
                                                            class="text-decoration-underline fw-bold">mengenai
                                                            tanda-tanda contoh maupun alamat peminta uji.</span>
                                                    </li>
                                                    <li>
                                                        <span>Sisa contoh</span>
                                                        <div class="form-check form-check-inline">
                                                            <input
                                                                class="form-check-input @error('sisa_contoh') is-invalid @enderror"
                                                                type="radio" name="sisa_contoh"
                                                                value="akan di ambil lagi"
                                                                {{ old('sisa_contoh') == 'akan di ambil lagi' ? 'checked' : '' }}>
                                                            <label class="form-check-label">akan di ambil lagi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input
                                                                class="form-check-input @error('sisa_contoh') is-invalid @enderror"
                                                                type="radio" name="sisa_contoh"
                                                                value="tidak diambil lagi"
                                                                {{ old('sisa_contoh') == 'tidak diambil lagi' ? 'checked' : '' }}>
                                                            <label class="form-check-label">tidak diambil lagi</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="py-2">
                                                <h4>Surat Permohonan</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                @error('dokumen')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input class="form-control" name="dokumen" type="file"
                                                    accept="application/pdf">
                                                <i class="text-decoration-underline">Max Size : 2mb</i>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="my-4">
                                            <div class="py-4 d-grid">
                                                <button type="submit" class="btn btn-outline-primary btn-lg">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="my-4" id="survey">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="my-4">
                                    Bagaimana Pendapat Saudara Tentang Prosedur Pendaftaran Pengujian Bahan Konstruksi di
                                    UPTD Laboratorium Bahan Konstruksi?
                                </h5>
                                <form action="{{ route('survey.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban"
                                                value="tidak mudah" id="tidak_mudah" required>
                                            <label class="form-check-label" for="tidak_mudah">
                                                Tidak Mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban"
                                                value="kurang mudah" id="kurang_mudah" required>
                                            <label class="form-check-label" for="kurang_mudah">
                                                Kurang Mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban" value="mudah"
                                                id="mudah" required>
                                            <label class="form-check-label" for="mudah">
                                                Mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban"
                                                value="sangat mudah" id="sangat_mudah" required>
                                            <label class="form-check-label" for="sangat_mudah">
                                                Sangat Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Saran & Masukan</label>
                                        <textarea class="form-control" name="saran_masukan" required rows="2"></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa-solid fa-share-from-square"></i>
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
