@extends('partials.layouts.main')
@section('title', 'Cars Details')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Daftar Mobil</h5><small>/Detail/Pembayaran</small>
        </div>
    </div>
    <div class="row gx-3 gy-3 mb-3">
        <div class="col d-flex justify-content-center align-items-center col-12 mb-2">
            <div style="height: 300px; width:300px"><img class="img-fluid object-fit-contain bg-primary p-3 rounded-circle w-100 h-100" src="assets/img/red-car.png"></div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadows rounded-3 overflow-hidden h-100" style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div>
                                    <div class="mb-3"><label class="form-label fs-6 mb-1" for="tanggal_pengembalian">Tanggal Pengembalian</label><input id="tanggal_pengembalian" class="form-control" type="date"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div>
                                    <div class="mb-3"><label class="form-label fs-6 mb-1" for="bukti_pembayaran-1">Bukti Pembayaran</label><input type="file" id="bukti_pembayaran-1" class="form-control" placeholder="Example input placeholder"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"><a class="btn btn-primary rounded-3 w-100" role="button" data-bs-target="#modal-pembayaran" data-bs-toggle="modal">Rental Sekarang</a></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadows rounded-3 overflow-hidden h-100" style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                <div class="card-body">
                    <h6 class="mb-1 fw-semibold">Rekening Penerima</h6>
                    <div>
                        <div class="card shadows border-0 text-light rounded-3 mb-1" style="background: linear-gradient(-136deg, #0a58ca 0%, #0dcaf0 99%); max-width: 300px; min-height:140px">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <h6>Ganjar Pranowo</h6><span class="fw-bold">BRI</span>
                                </div><img class="mb-2" src="assets/img/vecteezy_sim-card-clipart-design-illustration_9400645-removebg-preview.png" width="50">
                                <div>
                                    <h6>002 381274 8217 712771</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card shadows border-0 text-light rounded-3 mb-1" style="background: linear-gradient(164deg, #ffc107 0%, #dbdbdb 100%);max-width: 300px;min-height: 140px;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <h6>Ganjar Pranowo</h6><span class="fw-bold">BNI</span>
                                </div><img class="mb-2" src="assets/img/vecteezy_sim-card-clipart-design-illustration_9400645-removebg-preview.png" width="50">
                                <div>
                                    <h6>002 381274 8217 712771</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection