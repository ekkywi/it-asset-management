@extends("app.layouts.app")

@section("title")
    Daftar Pengguna {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-users"></i> Pengguna</div>
                <div class="breadcrumb-item active"><i class="fas fa-user"></i> Daftar Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Daftar Pengguna</h2>
            <p class="section-lead">Daftar pengguna aplikasi</p>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    <button class="btn btn-primary" data-target="#" data-toggle="modal">Tambah Data</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Bagian</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Token</th>
                            <th>Status Aktivasi</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Tanggal Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
