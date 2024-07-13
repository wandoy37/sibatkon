@extends('dashboard.layouts.app')


@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Akun</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.layouts.alert')
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('akun.update', $akun->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama', $akun->nama) }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $akun->email) }}">
                        </div>
                        <div class="form-group">
                            <label>NIP/NIK</label>
                            <input type="text" class="form-control form-control @error('nip') is-invalid @enderror"
                                name="nip" value="{{ old('nip', $akun->nip) }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Password Baru</label>
                            @error('password')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" type="button">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-900">Password Confirmation</label>
                            @error('password_confirmation')
                                <span class="text-danger font-italic">
                                    <i class="fas fa-exclamation"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="input-group mb-3" id="show_hide_confirmation">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Password Confirmation">
                                <div class="input-group-append">
                                    <span class="input-group-text" type="button">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round">
                                <i class="fas fa-sync"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#show_hide_confirmation span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_confirmation input').attr("type") == "text") {
                    $('#show_hide_confirmation input').attr('type', 'password');
                    $('#show_hide_confirmation i').addClass("fa-eye-slash");
                    $('#show_hide_confirmation i').removeClass("fa-eye");
                } else if ($('#show_hide_confirmation input').attr("type") == "password") {
                    $('#show_hide_confirmation input').attr('type', 'text');
                    $('#show_hide_confirmation i').removeClass("fa-eye-slash");
                    $('#show_hide_confirmation i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
@endpush
