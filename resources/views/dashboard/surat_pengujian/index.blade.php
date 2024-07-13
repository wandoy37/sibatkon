@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Surat Pengujian</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('surat.pengujian.create') }}" class="btn btn-primary btn-round mb-4">
                <i class="fas fa-plus"></i>
                Surat Pengujian
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
                                <th>Nama Pemohon</th>
                                <th>Jenis Bahan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($formulirs as $formulir)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $formulir->code_form }}</td>
                                        <td>{{ $formulir->nama_pemohon }}</td>
                                        <td>{{ $formulir->bahan->nama }}</td>
                                        <td>
                                            <form action="{{ route('surat.pengujian.delete', $formulir->code_form) }}"
                                                method="POST" class="form-inline justify-content-center">
                                                @csrf
                                                @method('PATCH')
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('generate.perintah.uji', $formulir->code_form) }}"
                                                        class="btn btn-outline-primary" target="_blank">
                                                        <i class="fas fa-print"></i>
                                                        Cetak
                                                    </a>
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
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
