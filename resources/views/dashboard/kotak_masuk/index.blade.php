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
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pemohon</th>
                                <th>Jenis Bahan</th>
                                <th>Pelaksana / Kontraktor</th>
                                <th>Lampiran</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($permohonans as $permohonan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $permohonan->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $permohonan->nama_pemohon }}</td>
                                        <td>{{ $permohonan->bahan->nama }}</td>
                                        <td>{{ $permohonan->kontraktor_nama }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $permohonan->dokumen) }}" target="_blank"
                                                class="text-decoration-none">
                                                <i class="fas fa-file-alt"></i>
                                                Surat Permohonan
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('kotak.masuk.show', $permohonan->code_form) }}"
                                                class="btn btn-outline-primary">
                                                <i class="far fa-eye"></i>
                                            </a>
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
