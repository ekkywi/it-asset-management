@extends("app.layouts.app")

@section("title")
    Tambah Peran {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Oganisasi</div>
                <div class="breadcrumb-item"><a href="{{ route("organisasi.peran") }}"><i class="fas fa-people-group"></i> Peran</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-plus"></i> Tambah Data Peran</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Tambah Data Peran</h1>
            <p class="section-lead">Form penambahan data peran</p>

            <div class="card custom-card">
                <div class="card-header">
                    <h4>Informasi Peran</h4>
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

                    <form action="{{ route("organisasi.simpan-peran") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Peran</label>
                            <input class="form-control" name="nama_peran" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tag Peran</label>
                            <input class="form-control inputtags" name="tag_peran" type="text">
                        </div>
                        <div class="form-group">
                            <label>Pilih Warna Tag Peran</label>
                            <input class="form-control" name="warna_peran" type="color">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="keterangan" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-info" type="reset">Hapus</button>
                                <button class="btn btn-danger" onclick="window.location='{{ route("organisasi.peran") }}'" type="button">Batal</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
