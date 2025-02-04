@extends("app.layouts.app")

@section("title")
    Tambah Bagian {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-users"></i> Pengguna</div>
                <div class="breadcrumb-item"><a href="{{ url("pengguna/bagian") }}"><i class="fas fa-sitemap"></i> Bagian</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-plus"></i> Tambah Data Bagian</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Tambah Data Bagian</h1>
            <p class="section-lead">Form penambahan data bagian</p>

            <div class="card custom-card">
                <div class="card-header">
                    <h4>Informasi Bagian</h4>
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

                    <form action="{{ route("pengguna.simpan-bagian") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Bagian</label>
                            <input class="form-control" name="nama_bagian" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tag Bagian</label>
                            <input class="form-control inputtags" name="tag_bagian" type="text">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="keterangan" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-info" type="reset">Hapus</button>
                                <button class="btn btn-danger" onclick="window.location='{{ url("pengguna/bagian") }}'" type="button">Batal</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
