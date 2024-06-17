@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Bahan</h4>
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
                    <form action="{{ route('bahan.update', $bahan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nama Bahan</label>
                            <input type="text" class="form-control form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama', $bahan->nama) }}" placeholder="Default Input">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round">
                                <i class="fas fa-sync"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
