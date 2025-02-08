@extends("app.layouts.app")

@section("title")
    Edit Peran {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Organisasi</div>
                <div class="breadcrumb-item"><a href="{{ route("organisasi.peran") }}"><i class="fas fa-people-group"></i> Peran</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-edit"></i> Edit Data Peran</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Edit Data Peran</h1>
            <p class="section-lead">Form pengeditan data peran</p>

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

                    <form action="{{ route("organisasi.update-peran", $role->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Nama Peran</label>
                            <input class="form-control" name="name" type="text" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label>Tag Peran</label>
                            <input class="form-control inputtags" name="tag" type="text" value="{{ $role->tag }}">
                        </div>
                        <div class="form-group">
                            <label>Warna Tag Peran</label>
                            <input class="form-control" name="color" type="color" value="{{ $role->color }}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control custom-textarea" name="description" rows="10">{{ $role->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-danger" onclick="window.location='{{ route("organisasi.peran") }}'" type="button">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
