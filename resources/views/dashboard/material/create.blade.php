@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Check List Material Pengujian</h4>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-12">
            <a href="{{ route('checklist.index') }}" class="btn btn-outline-info btn-round mb-4">
                <i class="fas fa-chevron-circle-left"></i>
                Kembali
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Check List Material Pengujian</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Diterima Tanggal</label>
                        <input type="text" class="form-control" value="{{ $checklist->diterima_tanggal }}">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan Mix Design / Job Mix</label>
                        <input type="text" class="form-control" value="{{ $checklist->job_mix }}">
                    </div>
                    <div class="form-group">
                        <label>SPU No</label>
                        <input type="text" class="form-control" value="{{ $checklist->no_spu }}">
                    </div>
                    <div class="form-group">
                        <label>Untuk Proyek/Paker Pekerjaan</label>
                        <br>
                        <a href="{{ asset('storage/' . $formulir->dokumen) }}" target="_blank" class="text-decoration-none">
                            <i class="far fa-eye"></i>
                            Lihat Lampiran
                        </a>
                    </div>
                    <div class="form-group">
                        <label>Pelaksana / Kontraktor</label>
                        <input type="text" class="form-control" value="{{ $formulir->kontraktor_nama }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun Anggaran</label>
                        <input type="text" class="form-control" value="{{ $checklist->tahun_anggaran }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel List Materials --}}
        <div class="col-lg-12">
            @if ($formulir->status == 'pengajuan')
                <div class="my-4">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#modal_create">
                        <i class="fas fa-plus"></i>
                        Material
                    </button>
                </div>
                @include('dashboard.material.modal_create')
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <th>No</th>
                                <th>Jenis Bahan / Asal Material</th>
                                <th>Ex.</th>
                                <th>Volume</th>
                                <th>Satuan</th>
                                <th>Kelengkapan</th>
                                <th>Keterangan</th>
                                @if ($formulir->status == 'pengajuan')
                                    <th>Aksi</th>
                                @endif
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($checklist->materials as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->material }}</td>
                                        <td>{{ $item->ex }}</td>
                                        <td>{{ $item->volume }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->kelengkapan }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        @if ($formulir->status == 'pengajuan')
                                            <td>
                                                <form action="{{ route('delete.material', $item->id) }}" method="POST"
                                                    class="form-inline justify-content-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus material ini ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($formulir->status == 'pengajuan')
            <div class="col-lg-12 d-flex justify-content-end">
                <form action="{{ route('permohonan.update.status', $formulir->code_form) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-outline-info btn-round"
                        onclick="return confirm('Anda yakin ingin melakukan verifikasi ceklist pengujian ?')">
                        <i class="fas fa-info"></i>
                        Verifikasi Ceklist Material
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endpush
