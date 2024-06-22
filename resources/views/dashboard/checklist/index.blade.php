@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Daftar Check List Material Pengujian</h4>
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
                                <th>Diterima Tanggal</th>
                                <th>Pelaksana / Kontraktor</th>
                                <th>Tahun Anggaran</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($checklists as $checklist)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $checklist->diterima_tanggal }}</td>
                                        <td>{{ $checklist->formulir->kontraktor_nama }}</td>
                                        <td>{{ $checklist->tahun_anggaran }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-round"
                                                href="{{ route('material.create', $checklist->formulir->code_form) }}">
                                                <i class="fas fa-eye"></i>
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
