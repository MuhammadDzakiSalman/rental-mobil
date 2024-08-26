@extends('partials.layouts.main')
@section('title', 'Cars')
@section('content')
    <div class="container-fluid">
        <div class="row gy-4 py-3">
            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                <h5 class="fw-semibold m-0">Daftar Mobil</h5><small>/Detail</small>
            </div>
        </div>
        <div class="row gx-3 gy-3 mb-3">
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-3">
                <div class="card d-flex justify-content-center align-items-center border-0 shadows rounded-3 overflow-hidden h-100"
                    style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);"><img class="img-fluid card-img-top w-100 d-block"
                        src="{{ asset('storage/images/' . $car->gambar) }}" height="150"></div>
            </div>
            <div class="col">
                <div class="card border-0 shadows rounded-3 overflow-hidden h-100"
                    style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-2">
                            <h6 class="fw-semibold mb-0">{{ $car->merek }} {{ $car->tipe }}</h6><small>Rp. {{ number_format($car->harga_sewa, 0, ',', '.') }}/Hari</small>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-5 col-lg-4 col-xl-3">
                                    <div>
                                        <h6>Denda</h6>
                                        <h6>Merek</h6>
                                        <h6>Tipe</h6>
                                        <h6>No. Plat</h6>
                                        <h6>Tahun Mobil</h6>
                                        <h6>Warna</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h6>: Rp. {{ number_format($car->denda, 0, ',', '.') }}/Hari</h6>
                                        <h6>: {{ $car->merek }}</h6>
                                        <h6>: {{ $car->tipe }}</h6>
                                        <h6>: {{ $car->nomor_plat }}</h6>
                                        <h6>: {{ $car->tahun }}</h6>
                                        <h6>: {{ $car->warna }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" role="dialog" tabindex="-1" id="modal-pembayaran">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pembayaran</h5><button class="btn-close" type="button"
                                            aria-label="Close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer"><button class="btn btn-light rounded-3" type="button"
                                            data-bs-dismiss="modal">Close</button><button class="btn btn-primary rounded-3"
                                            type="button">Kirim</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('rent-car', $car->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row gx-3 gy-3 mb-3">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadows rounded-3 overflow-hidden h-100"
                        style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="row gx-1 gy-1">
                                    <div class="col-12 col-lg-12">
                                        <div>
                                            <div>
                                                <label class="form-label fs-6 mb-1 small" for="tanggal_pengembalian">Tanggal
                                                    Pengembalian</label>
                                                <input id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control"
                                                    type="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div>
                                            <div>
                                                <label class="form-label fs-6 mb-1 small" for="bukti_pembayaran">Bukti
                                                    Pembayaran</label>
                                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary rounded-3 w-100 mt-2">Rental Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadows rounded-3 overflow-hidden h-100"
                        style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                        <div class="card-body">
                            <h6 class="mb-3 fw-semibold">Rekening Penerima</h6>
                            <div
                                class="d-flex flex-column justify-content-center align-items-center flex-sm-row align-items-sm-start gap-3">
                                <div class="card shadows border-0 text-light rounded-3 mb-1"
                                    style="background: linear-gradient(-136deg, #0a58ca 0%, #0dcaf0 99%); max-width: 350px; min-height:140px">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="me-3">Ganjar Pranowo</h6><span class="fw-bold">BRI</span>
                                        </div><img class="mb-2"
                                            src="{{ asset('assets/img/vecteezy_sim-card-clipart-design-illustration_9400645-removebg-preview.png') }}"
                                            width="50">
                                        <div>
                                            <h6 class="mb-0">002 381274 8217</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadows border-0 text-light rounded-3 mb-1"
                                    style="background: linear-gradient(164deg, #ffc107 0%, #dbdbdb 100%);max-width: 350px;min-height: 140px;">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="me-3">Ganjar Pranowo</h6><span class="fw-bold">BNI</span>
                                        </div><img class="mb-2"
                                            src="{{ asset('assets/img/vecteezy_sim-card-clipart-design-illustration_9400645-removebg-preview.png') }}"
                                            width="50">
                                        <div>
                                            <h6 class="mb-0">002 381274 8217</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
