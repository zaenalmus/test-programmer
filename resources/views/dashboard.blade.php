<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Produk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="card" style="background-color: rgb(253, 251, 246)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mt-4 ">
                                    <h4 style="color: rgb(9, 10, 70)">Produk</h4>
                                </div>
                            <div class="col-lg-6 mt-4 mb-1 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#TambahProduk">Tambah Produk</button>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead style="background-color: #007bff; color:#fff">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kategori</th>
                                <th scope="col" class="col-lg-2">Status</th>
                                <th scope="col" class="col-lg-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>@foreach ($produk as $i => $p)
                            <tr>
                                <th scope='row'>{{ $i + 1 }}</th>
                                <td>{{ $p->nama_produk }}</td>
                                <td>Rp{{ number_format($p->harga) }}</td>
                                <td>{{ $p->kategori }}</td>
                                <td>{{ $p->status }}</td>
                                <td>
                                    <button type="submit" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditProduk{{ $p->id }}">Edit</button>
                                    <form action="/dashboard/{{ $p->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button button type="submit" class="btn btn-success btn-sm" onclick="return confirm('hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>@endforeach
                        </tbody>
                    </table>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        <div class="mt-2">
                            {{ $produk->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    <!-- End #main -->

{{-- Tambah Data --}}
<div class="modal fade" id="TambahProduk" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('dashboard.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" value="{{ old('status') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Popup Tambah Data-->

{{-- Edit data --}}
@foreach ($produk as $p)
<div class="modal fade" id="EditProduk{{ $p->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('dashboard.update', $p->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ $p->nama_produk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $p->harga }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name="kategori" class="form-control" value="{{ $p->kategori }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" value="{{ $p->status }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
<!-- End Modal Popup Edit Data-->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>
</html>
