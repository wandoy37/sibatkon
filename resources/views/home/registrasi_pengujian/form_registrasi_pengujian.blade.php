@extends('home.layouts.app')

@section('title', 'Form Registrasi Pengujian')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>PERMOHONAN PENGUJIAN</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('registrasi.pengujian.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @php
                                    use Illuminate\Support\Str;
                                    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                                    $randomString = substr(str_shuffle($characters), 0, 6);
                                @endphp
                                <input type="text" name="code_form" value="{{ $randomString }}" hidden>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="py-2">Identitas Pemohon</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Pemohon</label>
                                            <input type="text" name="nama_pemohon"
                                                class="form-control @error('nama_pemohon') is-invalid @enderror"
                                                value="{{ old('nama_pemohon') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor HP/WhatsApp Pemohon</label>
                                            <input type="text" name="no_hp_pemohon"
                                                class="form-control @error('no_hp_pemohon') is-invalid @enderror"
                                                value="{{ old('no_hp_pemohon') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Pemohon</label>
                                            <input type="text" name="alamat_pemohon"
                                                class="form-control @error('alamat_pemohon') is-invalid @enderror"
                                                value="{{ old('alamat_pemohon') }}">
                                            <input type="text" name="email_pemohon"
                                                class="form-control @error('email_pemohon') is-invalid @enderror"
                                                value="-">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="py-2">Bahan Konstruksi</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Bahan</label>
                                            <select class="form-select @error('bahan_id') is-invalid @enderror"
                                                name="bahan_id">
                                                <option value="">--pilih jenis bahan--</option>
                                                @foreach ($bahans as $bahan)
                                                    <option value="{{ $bahan->id }}"
                                                        {{ old('bahan_id') == $bahan->id ? 'selected' : '' }}>
                                                        {{ $bahan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Quantitiy / Banyaknya</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="quantity"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    value="{{ old('quantity') }}">
                                                <span class="input-group-text">Sampel</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan Lain</label>
                                            <input type="text" name="keterangan_lain"
                                                class="form-control @error('keterangan_lain') is-invalid @enderror"
                                                value="{{ old('keterangan_lain') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Uraian Pengujian</label>
                                            <textarea class="form-control @error('uraian_pengujian') is-invalid @enderror" name="uraian_pengujian" rows="2">{{ old('uraian_pengujian') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Keperluan Pengujian</label>
                                            <input type="text" name="keperluan_pengujian"
                                                class="form-control @error('keperluan_pengujian') is-invalid @enderror"
                                                value="{{ old('keperluan_pengujian') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="py-2">
                                            <h4>Pelaksana / Kontraktor</h4>
                                            <small>
                                                Laporan pengujian dibuat untuk
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="kontraktor_nama"
                                                class="form-control @error('kontraktor_nama') is-invalid @enderror"
                                                value="{{ old('kontraktor_nama') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="kontraktor_alamat"
                                                class="form-control @error('kontraktor_alamat') is-invalid @enderror"
                                                value="{{ old('kontraktor_alamat') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="py-2">
                                            <h4>Pernyataan</h4>
                                            <ul>
                                                <li>Setelah laporan ini diterbitkan, kmi tidak akan minta di adakannya
                                                    perubahan pada laporan <span
                                                        class="text-decoration-underline fw-bold">mengenai
                                                        tanda-tanda contoh maupun alamat peminta uji.</span>
                                                </li>
                                                <li>
                                                    <span>Sisa contoh</span>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('sisa_contoh') is-invalid @enderror"
                                                            type="radio" name="sisa_contoh" value="akan di ambil lagi"
                                                            {{ old('sisa_contoh') == 'akan di ambil lagi' ? 'checked' : '' }}>
                                                        <label class="form-check-label">akan di ambil lagi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('sisa_contoh') is-invalid @enderror"
                                                            type="radio" name="sisa_contoh" value="tidak diambil lagi"
                                                            {{ old('sisa_contoh') == 'tidak diambil lagi' ? 'checked' : '' }}>
                                                        <label class="form-check-label">tidak diambil lagi</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="py-2">
                                            <h4>Surat Permohonan</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            @error('dokumen')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input class="form-control" name="dokumen" type="file"
                                                accept="application/pdf">
                                            <i class="text-decoration-underline">Max Size : 2mb</i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                        <div class="py-4 d-grid">
                                            <button type="submit" class="btn btn-outline-primary btn-lg">
                                                <i class="fa-solid fa-share-from-square"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
