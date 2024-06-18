@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Buat Check List</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('permohonan.pengujian.index') }}" class="btn btn-outline-info btn-round mb-4">
                <i class="fas fa-chevron-circle-left"></i>
                Kembali
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Form Check List Material Pengujian</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('checklist.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Diterima Tanggal</label>
                            <input type="date"
                                class="form-control form-control @error('diterima_tanggal') is-invalid @enderror"
                                name="diterima_tanggal">
                        </div>

                        <input type="text" name="formulir_id" value="{{ $permohonan->id }}" hidden>

                        <div class="form-group">
                            <label>Pekerjaan Mix Design / Job Mix</label>
                            <input type="text" class="form-control form-control @error('job_mix') is-invalid @enderror"
                                name="job_mix">
                        </div>
                        <div class="form-group">
                            <label>SPU No</label>
                            <input type="text" class="form-control form-control @error('no_spu') is-invalid @enderror"
                                name="no_spu">
                        </div>
                        <div class="form-group">
                            <label>Untuk Proyek/Paker Pekerjaan</label>
                            <br>
                            <a href="{{ asset('storage/' . $permohonan->dokumen) }}" target="_blank"
                                class="text-decoration-none">
                                <i class="far fa-eye"></i>
                                Lihat Lampiran
                            </a>
                        </div>
                        <div class="form-group">
                            <label>Pelaksana / Kontraktor</label>
                            <input type="text" class="form-control form-control"
                                value="{{ $permohonan->kontraktor_nama }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tahun Anggaran</label>
                            <div class="input-group">
                                <input type="text" id="datepicker"
                                    class="form-control @error('tahun_anggaran') is-invalid @enderror"
                                    name="tahun_anggaran">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <input type="text" name="penerima_id" value="{{ Auth::user()->id }}"hidden>

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
        $('#datepicker').datetimepicker({
            format: 'YYYY',
        });
    </script>
@endpush
