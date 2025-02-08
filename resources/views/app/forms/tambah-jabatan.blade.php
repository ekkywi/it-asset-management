@extends("app.layouts.app")

@section("title")
    Tambah Bagian {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Oganisasi</div>
                <div class="breadcrumb-item"><a href="{{ route("organisasi.jabatan") }}"><i class="fas fa-briefcase"></i> Jabatan</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-plus"></i> Tambah Data Jabatan</div>
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

                    <form action="{{ route("organisasi.simpan-jabatan") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tag Jabatan</label>
                            <input class="form-control inputtags" name="tag" type="text">
                        </div>
                        <div class="form-group">
                            <label>Pilih Warna Tag Jabatan</label>
                            <input class="form-control" name="color" type="color">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="description" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-info" type="reset">Hapus</button>
                                <button class="btn btn-danger" onclick="window.location='{{ route("organisasi.jabatan") }}'" type="button">Batal</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
