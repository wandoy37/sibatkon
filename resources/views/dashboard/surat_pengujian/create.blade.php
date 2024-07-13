@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Buat Surat Pengujian</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('surat.pengujian.index') }}" class="btn btn-outline-info btn-round mb-4">
                <i class="fas fa-chevron-circle-left"></i>
                Kembali
            </a>
            @include('dashboard.layouts.alert')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('surat.pengujian.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Permohonan Pengujian</label>
                            <div class="select2-input">
                                <select id="basic" name="code_form" class="form-control">
                                    <option value="">--pilih permohonan pengujian--</option>
                                    @foreach ($formulirs as $formulir)
                                        <option value="{{ $formulir->code_form }}">{{ $formulir->code_form }} -
                                            {{ $formulir->bahan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Pilih Kasi</label>
                            <div class="select2-input">
                                <select id="basicKasi" name="kasi_pengujian_id" class="form-control">
                                    <option value="">--pilih kasi--</option>
                                    @foreach ($kasi_pengujians as $kasi)
                                        <option value="{{ $kasi->id }}">{{ $kasi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
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

@push('scripts')
    <script>
        $('#basic').select2({
            theme: "bootstrap"
        });
        $('#basicKasi').select2({
            theme: "bootstrap"
        });
    </script>
@endpush
