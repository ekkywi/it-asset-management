@extends("app.layouts.app")

@section("title")
    Tambah Pengguna {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route("pengguna") }}"><i class="fas fa-users"></i> Pengguna</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-plus"></i> Tambah Data Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Tambah Data Jabatan</h1>
            <p class="section-lead">Form penambahan data jabatan</p>

            <div class="card custom-card">
                <div class="card-header">
                    <h4>Informasi Jabatan</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route("pengguna.simpan-pengguna") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" type="text">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password">
                        </div>
                        <div class="form-group">
                            <label>Bagian</label>
                            <select class="form-control" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="position_id">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Peran</label>
                            <select class="form-control" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Login Aplikasi</label>
                            <select class="form-control" name="login_application">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-info" type="reset">Hapus</button>
                                <button class="btn btn-danger" onclick="window.location='{{ route("pengguna") }}'" type="button">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
