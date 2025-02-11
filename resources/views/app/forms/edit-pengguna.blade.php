@extends("app.layouts.app")

@section("title")
    Edit Pengguna {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route("user") }}"><i class="fas fa-users"></i> Pengguna</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-edit"></i> Edit Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Edit Data Pengguna</h1>
            <p class="section-lead">Form pengeditan data pengguna</p>

            <div class="card custom-card">
                <div class="card-header">
                    <h4>Informasi Pengguna</h4>
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

                    <form action="{{ route("user.update", $user->id) }}" method="POST">
                        @csrf
                        @method("PUT")

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a aria-controls="informasi-pribadi" aria-selected="true" class="nav-link active" data-toggle="tab" href="#informasi-pribadi" id="informasi-pribadi-tab" role="tab">Informasi Pribadi</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="keamanan" aria-selected="false" class="nav-link" data-toggle="tab" href="#keamanan" id="keamanan-tab" role="tab">Keamanan</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="aplikasi" aria-selected="false" class="nav-link" data-toggle="tab" href="#aplikasi" id="aplikasi-tab" role="tab">Aplikasi</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div aria-labelledby="informasi-pribadi-tab" class="tab-pane fade show active" id="informasi-pribadi" role="tabpanel">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="name" type="text" value="{{ $user->name }}">
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
                            </div>

                            <div aria-labelledby="keamanan-tab" class="tab-pane fade" id="keamanan" role="tabpanel">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" type="text" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" value="{{ $user->password }}">
                                </div>
                            </div>

                            <div aria-labelledby="aplikasi-tab" class="tab-pane fade" id="aplikasi" role="tabpanel">
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
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-danger" onclick="window.location='{{ route("user") }}'" type="button">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
