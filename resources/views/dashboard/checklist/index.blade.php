@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Ceklist Material</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('checklist.create') }}" class="btn btn-primary btn-round mb-4">
                <i class="fas fa-plus"></i>
                Ceklist
            </a>
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
                                <th>No. Ticket</th>
                                <th>Diterima Tanggal</th>
                                <th>Petugas Penerima</th>
                                <th>Nama Pemohon</th>
                                <th>Pelaksana / Kontraktor</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($checklists as $checklist)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $checklist->formulir->code_form }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($checklist->diterima_tanggal)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>{{ $checklist->penerima->nama }}</td>
                                        <td>{{ $checklist->formulir->nama_pemohon }}</td>
                                        <td>{{ $checklist->formulir->kontraktor_nama }}</td>
                                        <td>
                                            <form action="{{ route('checklist.delete', $checklist->id) }}" method="POST"
                                                class="form-inline justify-content-center">
                                                @csrf
                                                @method('PATCH')
                                                <a class="btn btn-info"
                                                    href="{{ route('generate.cheeklist.material.pengujian', $checklist->formulir->code_form) }}"
                                                    target="_blank">
                                                    <i class="fas fa-print"></i>
                                                    Cetak
                                                </a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('material.create', $checklist->formulir->code_form) }}">
                                                    <i class="fas fa-plus"></i>
                                                    Material
                                                </a>
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
