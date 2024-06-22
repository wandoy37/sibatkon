@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Detail Permohonan</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12 my-2">
            <button type="submit" class="btn btn-success btn-round float-right btn-lg"
                onclick="return confirm('Anda yakin ingin menyetujui permohonan pengujian ini ?')">
                Setujui
            </button>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <small class="text-muted">Permohonan Pengujian Masuk Dari :</small>
                    <ul style="list-style-type: none;" class="my-4">
                        <li><span class="text-muted">Nama Pemohon : </span>{{ $permohonan->nama_pemohon }}</li>
                        <li><span class="text-muted">Alamat Pemohon : </span>{{ $permohonan->alamat_pemohon }}</li>
                    </ul>

                    <div class="row">
                        <div class="col-md-12">
                            <hr class="my-4">
                        </div>
                        <div class="col-md-4">
                            Tiket Permohonan
                            <br>
                            <span class="badge badge-info">{{ $permohonan->code_form }}</span>
                        </div>
                        <div class="col-md-4">
                            Dibuat Tanggal
                            <br>
                            <span class="badge badge-info">{{ $permohonan->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div class="col-md-4">
                            Keperluan Pengujian
                            <br>
                            <span class="font-weight-bold">{{ $permohonan->keperluan_pengujian }}</span>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-12">
                            <hr class="my-4">
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('surat.permohonan_pengujian', $permohonan->code_form) }}">
                                Surat Permohonan Pengujian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
