@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Tambah Bahan</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('bahan.index') }}" class="btn btn-outline-info btn-round mb-4">
                <i class="fas fa-chevron-circle-left"></i>
                Kembali
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('bahan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Bahan/Sampel</label>
                            <input type="text" class="form-control form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control form-control @error('harga') is-invalid @enderror"
                                name="harga" value="{{ old('harga') }}">
                        </div>
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="number" class="form-control form-control @error('volume') is-invalid @enderror"
                                name="volume" value="{{ old('volume') }}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text"
                                class="form-control form-control @error('keterangan') is-invalid @enderror"
                                name="keterangan" value="{{ old('keterangan') }}">
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
