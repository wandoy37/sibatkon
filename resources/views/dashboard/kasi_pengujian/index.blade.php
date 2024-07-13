@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Kasi Pengujian</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('kasi-pengujian.create') }}" class="btn btn-primary btn-round mb-4">
                <i class="fas fa-plus"></i>
                Kasi Pengujian
            </a>
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Kasi Pengujian</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kasi_pengujians as $kp)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $kp->nama }}</td>
                                        <td>{{ $kp->nip }}</td>
                                        <td>{{ $kp->jabatan }}</td>
                                        <td>
                                            <form action="{{ route('kasi-pengujian.destroy', $kp->id) }}" method="POST"
                                                class="form-inline justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('kasi-pengujian.edit', $kp->id) }}"
                                                        class="btn btn-outline-primary">Edit</a>
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
