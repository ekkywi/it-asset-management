@extends("app.layouts.app")

@section("title")
    Supplier Aset {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Daftar Supplier Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-info"></i> Informasi Aset</div>
                <div class="breadcrumb-item active"><i class="fas fa-boxes-packing"></i> Supplier Aset</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Supplier Aset</h2>
            <p class="section-lead">Daftar supplier aset</p>

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
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Supplier 1</td>
                            <td>Jl. Supplier 1</td>
                            <td>Supplier 1</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
