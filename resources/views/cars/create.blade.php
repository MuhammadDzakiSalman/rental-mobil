@extends('partials.layouts.main')
@section('title', 'Cars')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Tambah Mobil</h5>
        </div>
    </div>
    <div class="row gy-2 mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-0 gy-2 gx-lg-3">
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="merek">Merek Mobil</label><input type="text" class="form-control" name="merek" id="merek" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="tipe">Tipe Mobil</label><input type="text" class="form-control" name="tipe" id="tipe" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="nomor_plat">No. Plat</label><input type="text" class="form-control" name="nomor_plat" id="nomor_plat" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="tahun">Tahun Mobil</label><input type="text" class="form-control" name="tahun" id="tahun" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="harga_sewa">Harga Sewa</label><input type="text" class="form-control" name="harga_sewa" id="harga_sewa" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="denda">Denda/Jam</label><input type="text" class="form-control" name="denda" id="denda" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="warna">Warna Mobil</label><input type="text" class="form-control" name="warna" id="warna" required></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="status">Status Mobil</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Disewa</option>
                                </select></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div><label class="form-label mb-1" for="gambar">Gambar</label><input type="file" class="form-control" name="gambar" id="gambar" required></div>
                            </div>
                            <div class="col-12 col-lg-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
