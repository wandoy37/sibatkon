@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Bahan</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('bahan.create') }}" class="btn btn-primary btn-round mb-4">
                <i class="fas fa-plus"></i>
                Bahan
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Bahan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <th>No</th>
                                <th>Nama Bahan/Sampel</th>
                                <th>Harga</th>
                                <th>Volume</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($bahans as $bahan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $bahan->nama }}</td>
                                        <td>{{ $bahan->harga_rupiah }}</td>
                                        <td>{{ $bahan->volume }}</td>
                                        <td>{{ $bahan->keterangan }}</td>
                                        <td>
                                            <form action="{{ route('bahan.destroy', $bahan->id) }}" method="POST"
                                                class="form-inline justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('bahan.edit', $bahan->id) }}"
                                                        class="btn btn-outline-primary">Edit</a>
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus bahan ini ?')">
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
