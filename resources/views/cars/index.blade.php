@extends('partials.layouts.main')
@section('title', 'Cars')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Data Mobil</h5>
        </div>
    </div>
    <div class="row gy-2 mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row gy-2">
                        <div class="col-md-4 d-flex gap-2">
                            <a class="btn btn-primary rounded-3" href="{{ route('cars.create') }}">Tambah Mobil</a>
                            <div id="dataTable_length" class="dataTables_length d-flex align-items-center" aria-controls="dataTable">
                                <form class="d-flex align-items-center" method="GET"
                                    action="{{ route('cars.index') }}" id="showForm" style="width: 8rem;">
                                    <label for="showData" class="form-label mb-0">Show&nbsp;</label>
                                    <select id="showData" name="show" class="d-inline-block form-select form-select-sm"
                                        onchange="document.getElementById('showForm').submit()">
                                        <option value="10" {{ Request::input('show', 10) == 10 ? 'selected' : '' }}>10
                                        </option>
                                        <option value="25" {{ Request::input('show') == 25 ? 'selected' : '' }}>25
                                        </option>
                                        <option value="50" {{ Request::input('show') == 50 ? 'selected' : '' }}>50
                                        </option>
                                        <option value="100" {{ Request::input('show') == 100 ? 'selected' : '' }}>100
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                <form method="GET" action="{{ route('cars.index') }}">
                                    <label class="form-label">
                                        <input type="search" name="search" class="form-control form-control-sm"
                                            aria-controls="dataTable" placeholder="Search"
                                            value="{{ Request::input('search') }}">
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk</th>
                                    <th>Tipe</th>
                                    <th>No. Plat</th>
                                    <th>Gambar</th>
                                    <th>Tahun</th>
                                    <th>Harga Sewa</th>
                                    <th>Denda/Jam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $car->merek }}</td>
                                        <td>{{ $car->tipe }}</td>
                                        <td>{{ $car->nomor_plat }}</td>
                                        <td><img src="{{ asset('storage/images/' . $car->gambar) }}" class="img-fluid" width="100" height="70"></td>
                                        <td>{{ $car->tahun }}</td>
                                        <td>{{ $car->harga_sewa }}</td>
                                        <td>{{ $car->denda }}</td>
                                        <td><span class="badge {{ $car->status ? 'bg-primary' : 'bg-danger' }}">{{ $car->status ? 'Tersedia' : 'Disewa' }}</span></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('cars.edit', $car->id) }}">Edit</a>
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }} of
                                {{ $cars->total() }} entries
                            </p>
                        </div>
                        @if ($cars->hasPages())
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item {{ $cars->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $cars->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $cars->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $cars->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $cars->nextPageUrl() }}"
                                                aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
