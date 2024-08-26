@extends('partials.layouts.main')
@section('title', 'Home')
@section('content')
    <div class="container-fluid">
        <div class="row gy-2 py-3">
            <div class="col">
                <div class="card bg-primary border-0 text-light rounded-3">
                    <div class="card-body">
                        <h5 class="fw-semibold text-center card-title mb-0">Selamat datang di Rental Mobil xyz</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search bar -->
        <div class="row gy-4 py-3">
            <div class="col">
                <form method="GET" action="{{ route('home.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start-3" placeholder="Cari mobil...">
                        <button type="submit" class="btn btn-primary rounded-end-3">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row gy-4 py-3">
            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                <h5 class="fw-semibold m-0">Daftar Mobil</h5>
            </div>
        </div>
        <div class="row gx-3 gy-3 mb-3">
            @foreach ($cars as $car)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card border-0 shadows rounded-3 overflow-hidden h-100"
                        style="box-shadow: 0px 0px 18px rgba(0,0,0,0.1);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <img class="img-fluid mb-2 rounded-2 shadow-none w-100 d-block"
                                src="{{ asset('storage/images/' . $car->gambar) }}" height="150">
                            <div class="">
                                <div>
                                    <h6 class="fw-semibold mb-0">{{ $car->merek }} {{ $car->tipe }}</h6>
                                    <small>Rp. {{ number_format($car->harga_sewa, 0, ',', '.') }}/Hari</small>
                                </div>
                                <div class="mt-2">
                                    @if ($car->status)
                                        <a class="btn btn-primary rounded-3 w-100" role="button"
                                            href="{{ route('detail', $car->id) }}">Detail</a>
                                    @else
                                        <a class="btn btn-danger rounded-3 w-100 disabled" role="button"
                                            aria-disabled="true">Sedang Dirental</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                @if ($cars->hasPages())
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item {{ $cars->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cars->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $cars->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $cars->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $cars->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
