@extends("app.layouts.app")

@section("title")
    Edit Bagian {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Organisasi</div>
                <div class="breadcrumb-item"><a href="{{ route("organisasi.bagian") }}"><i class="fas fa-sitemap"></i> Bagian</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-edit"></i> Edit Data Bagian</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Edit Data Bagian</h1>
            <p class="section-lead">Form pengeditan data bagian</p>

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

                    <form action="{{ route("organisasi.update-bagian", $bagian->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Nama Bagian</label>
                            <input class="form-control" name="nama_bagian" required type="text" value="{{ $bagian->nama_bagian }}">
                        </div>
                        <div class="form-group">
                            <label>Tag Bagian</label>
                            <input class="form-control inputtags" name="tag_bagian" required type="text" value="{{ $bagian->tag_bagian }}">
                        </div>
                        <div class="form-group">
                            <label>Warna Tag Bagian</label>
                            <input class="form-control" name="warna_bagian" required type="color" value="{{ $bagian->warna_bagian }}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="keterangan" rows="10">{{ $bagian->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-danger" onclick="window.location='{{ route("organisasi.bagian") }}'" type="button">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
