@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Tambah Kasi Pengujian</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('kasi-pengujian.index') }}" class="btn btn-outline-info btn-round mb-4">
                <i class="fas fa-chevron-circle-left"></i>
                Kembali
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kasi-pengujian.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control form-control @error('nip') is-invalid @enderror"
                                name="nip" value="{{ old('nip') }}">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control form-control @error('jabatan') is-invalid @enderror"
                                name="jabatan" value="{{ old('jabatan') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round">
                                <i class="fas fa-save"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
