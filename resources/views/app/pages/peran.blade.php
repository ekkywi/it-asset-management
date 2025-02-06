@extends("app.layouts.app")

@section("title")
    Peran {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route("dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-building"></i> Oganisasi</div>
                <div class="breadcrumb-item active"><i class="fas fa-people-group"></i> Peran</div>
            </div>
        </div>

        <div class="section-body">
            <h1 class="section-title">Peran</h1>
            <p class="section-lead">Daftar peran dari pengguna aplikasi</p>

            @if (session("success"))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session("success") }}
                    </div>
                </div>
            @endif

            @if (session("info"))
                <div class="alert alert-info alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session("info") }}
                    </div>
                </div>
            @endif

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
                    <a class="btn btn-primary" href="{{ route("organisasi.tambah-peran") }}">Tambah Data</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Peran</th>
                            <th>Tag Peran</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($perans as $peran)
                            <tr>
                                <td>{{ $peran->nama_peran }}</td>
                                <td>
                                    <span class="badge" style="color: white; font-weight: bold; background-color: {{ $peran->warna_peran }};">{{ $peran->tag_peran }}</span>
                                </td>
                                <td>{{ $peran->keterangan }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route("organisasi.edit-peran", $peran->id) }}">Edit</a>
                                    <form action="{{ route("organisasi.hapus-peran", $peran->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btnHapus" data-id="{{ $peran->id }}" type="button">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div aria-hidden="true" aria-labelledby="modalHapusLabel" class="modal fade" id="modalHapus" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                    <form id="formHapus" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalHapus = document.getElementById("modalHapus");
            const formHapus = document.getElementById("formHapus");
            const btnHapus = document.querySelectorAll(".btnHapus");

            btnHapus.forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    formHapus.action = `{{ route("organisasi.hapus-peran", "") }}/${id}`;
                    $("#modalHapus").modal("show");
                });
            });
        });
    </script>
@endsection
