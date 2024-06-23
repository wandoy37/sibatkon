@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Verifikasi Permohonan</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
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
                                                <i class="fas fa-file-alt"></i>
                                                Lampiran
                                            </a>
                                        </td>
                                        <td>
                                            @if ($permohonan->status == 'ceklist')
                                                <span class="badge badge-primary" style="font-size: 16px;">
                                                    Belum Disetujui
                                                </span>
                                            @endif
                                            @if ($permohonan->status == 'pengujian')
                                                <span class="badge badge-success" style="font-size: 16px;">Setuju</span>
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
                                                        href="{{ route('generate.permohonan.pengujian', $permohonan->code_form) }}"
                                                        target="_blank">
                                                        <i class="fas fa-eye"></i>
                                                        Lihat Permohonan Pengujian
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('material.create', $permohonan->code_form) }}">
                                                        <i class="fas fa-eye"></i>
                                                        Lihat Checklist
                                                    </a>
                                                    @if ($permohonan->status == 'ceklist')
                                                        <form
                                                            action="{{ route('update.setujui.permohonan', $permohonan->code_form) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-link"
                                                                onclick="return confirm('Anda yakin ingin melakukan persetujuan pengujian ?')">
                                                                Setujui Permohonan
                                                            </button>
                                                        </form>
                                                    @endif
                                                    {{-- @if ($permohonan->status == 'pengujian')
                                                        <a class="dropdown-item" href="/">
                                                            <i class="fas fa-eye"></i>
                                                            Surat Perintah Uji
                                                        </a>
                                                    @endif --}}
                                                </ul>
                                            </div>
                                            {{-- <a href="{{ route('kotak.masuk.show', $permohonan->code_form) }}"
                                                class="btn btn-outline-primary">
                                                <i class="far fa-eye"></i>
                                            </a> --}}
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
