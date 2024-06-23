@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">List / Daftar Permohonan Pengujian</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Permohonan Pengujian</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                            width="100%">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pemohon</th>
                                <th>Jenis Bahan</th>
                                <th>Pelaksana / Kontraktor</th>
                                <th>Lampiran</th>
                                <th>Status Permohonan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($permohonans as $permohonan)
                                    <tr class="text-center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $permohonan->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $permohonan->nama_pemohon }}</td>
                                        <td>{{ $permohonan->bahan->nama }}</td>
                                        <td>{{ $permohonan->kontraktor_nama }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $permohonan->dokumen) }}" target="_blank"
                                                class="text-decoration-none">
                                                Lampiran
                                            </a>
                                        </td>
                                        <td class="text-uppercase">
                                            @if ($permohonan->status == 'pengajuan')
                                                <span class="badge badge-info" style="font-size: 16px;">
                                                    Perlu Diverifikasi
                                                </span>
                                            @endif
                                            @if ($permohonan->status == 'ceklist')
                                                <span class="badge badge-primary" style="font-size: 16px;">
                                                    Belum Disetujui
                                                </span>
                                            @endif
                                            @if ($permohonan->status == 'pengujian')
                                                <span class="badge badge-success" style="font-size: 16px;">
                                                    Setuju
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenu1" data-toggle="dropdown">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('generate.permohonan.pengujian', $permohonan->code_form) }}">
                                                        <i class="fas fa-print"></i>
                                                        Cetak Permohonan Pengujian
                                                    </a>
                                                    @if ($permohonan->checklist->isEmpty())
                                                        <a class="dropdown-item"
                                                            href="{{ route('checklist.create', $permohonan->code_form) }}">
                                                            <i class="fas fa-plus"></i>
                                                            Buat Check List
                                                        </a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ route('material.create', $permohonan->code_form) }}">
                                                            <i class="fas fa-eye"></i>
                                                            Lihat Checklist
                                                        </a>
                                                    @endif
                                                    {{-- @if ($permohonan->status == 'pengujian')
                                                        <a class="dropdown-item" href="/">
                                                            <i class="fas fa-eye"></i>
                                                            Surat Perintah Uji
                                                        </a>
                                                    @endif --}}
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endpush
