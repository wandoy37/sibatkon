@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Update Profil</h4>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-12">
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sejarah</label>
                                    <textarea name="sejarah" class="form-control" rows="3">
                                        {!! old('sejarah', $profil->sejarah) !!}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto_sejarah">Upload Foto</label>
                                    <input type="file" class="form-control-file" name="foto_sejarah" id="foto_sejarah">
                                    <br>
                                    <!-- Display the old uploaded file if it exists -->
                                    @if ($profil->foto_sejarah)
                                        <img id="current-image" src="{{ asset('storage/img/' . $profil->foto_sejarah) }}"
                                            alt="Current Image" style="max-width: 200px; margin-top: 10px;">
                                        <p>Current file: {{ $profil->foto_sejarah }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Visi</label>
                                    <input type="text" name="visi" class="form-control"
                                        value="{{ old('visi', $profil->visi) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Misi</label>
                                    <input type="text" name="misi" class="form-control"
                                        value="{{ old('misi', $profil->misi) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr class="my-4">
                                <div class="form-group">
                                    <label for="struktur_organisasi">Upload Struktur Organisasi</label>
                                    <input type="file" class="form-control-file" name="struktur_organisasi"
                                        id="struktur_organisasi">
                                    <br>
                                    <!-- Display the old uploaded file if it exists -->
                                    @if ($profil->struktur_organisasi)
                                        <img id="current-struktur-organisasi"
                                            src="{{ asset('storage/img/' . $profil->struktur_organisasi) }}"
                                            alt="Current Image" style="max-width: 100%; margin-top: 10px;">
                                        <p>Current file: {{ $profil->struktur_organisasi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="fas fa-sync"></i>
                                    Update Profil
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('foto_sejarah').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('current-image');
                if (!img) {
                    img = document.createElement('img');
                    img.id = 'current-image';
                    img.style.maxWidth = '200px';
                    img.style.marginTop = '10px';
                    event.target.parentNode.appendChild(img);
                }
                img.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>

    <script>
        document.getElementById('struktur_organisasi').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('current-struktur-organisasi');
                if (!img) {
                    img = document.createElement('img');
                    img.id = 'current-struktur-organisasi';
                    img.style.maxWidth = '100%';
                    img.style.marginTop = '10px';
                    event.target.parentNode.appendChild(img);
                }
                img.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endpush
