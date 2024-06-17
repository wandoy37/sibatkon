@extends('home.layouts.app')

@section('title', 'Ticket Permohonan Pengujian ' . '#' . $formulir->code_form)

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="alert alert-warning text-center" role="alert">
                        Screenshot / Catat Kode Ticket Permohonan Pengujian Anda !!!
                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
