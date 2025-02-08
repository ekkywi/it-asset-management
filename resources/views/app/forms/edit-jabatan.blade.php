@extends("app.layouts.app")

@section("title")
    Edit Jabatan {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Organisasi</div>
                <div class="breadcrumb-item"><a href="{{ route("organisasi.jabatan") }}"><i class="fas fa-briefcase"></i> Jabatan</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-edit"></i> Edit Data Jabatan</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Edit Data Jabatan</h1>
            <p class="section-lead">Form pengeditan data jabatan</p>

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

                    <form action="{{ route("organisasi.update-jabatan", $position->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input class="form-control" name="name" type="text" value="{{ $position->name }}">
                        </div>
                        <div class="form-group">
                            <label>Tag Jabatan</label>
                            <input class="form-control inputtags" name="tag" type="text" value="{{ $position->tag }}">
                        </div>
                        <div class="form-group">
                            <label>Warna Tag Jabatan</label>
                            <input class="form-control" name="color" type="color" value="{{ $position->color }}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="description" rows="10">{{ $position->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-danger" onclick="window.location='{{ route("organisasi.jabatan") }}'" type="button">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
