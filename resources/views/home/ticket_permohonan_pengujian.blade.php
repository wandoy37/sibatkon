@extends('home.layouts.app')

@section('title', 'Ticket Permohonan Pengujian ' . '#' . $formulir->code_form)

@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('landing_page/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <div class="alert alert-warning text-center" role="alert">
                Screenshot / Catat Kode Ticket Permohonan Pengujian Anda !!!
            </div>
        </div>
    </div><!-- End Breadcrumbs -->


    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>TICKET PERMOHONAN PENGUJIAN</h3>
                        </div>
                        <div class="card-body">
                            <p style="font-size: 28px;">#Ticket : {{ $formulir->code_form }}</p>
                            <i>Lampiran </i>
                            <a href="{{ asset('storage/' . $formulir->dokumen) }}" target="_blank"
                                class="text-decoration-none">
                                <i class="fa-regular fa-eye"></i>
                                Lihat
                            </a>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('generate.permohonan.pengujian', $formulir->code_form) }}" target="_blank"
                                    class="text-decoration-none text-primary text-center">
                                    <i class="fa-solid fa-print"></i>
                                    <i>Cetak Formulir Permohonan Pengujian</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
