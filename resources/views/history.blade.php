@extends('partials.layouts.main')
@section('title', 'History')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">History</h5>
        </div>
    </div>
    <p class="mb-1 bg-primary text-light p-1 rounded-3 px-3 fs-6">Jika memiliki kendala, hubungi 0812 9090 2019 (Admin)</p>
    <div class="row gx-3 gy-3 mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <form method="GET" action="{{ route('history.index') }}">
                        <div class="row gy-2 pt-1">
                            <div class="col-md-6 text-nowrap">
                                <label class="form-label mb-0">Show&nbsp;
                                    <select name="per_page" class="d-inline-block form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                    </select>&nbsp;
                                </label>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end">
                                    <input type="search" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ request('search') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive shadow-none table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk</th>
                                    <th>No. Plat</th>
                                    <th>Gambar</th>
                                    <th>Tgl. Rental</th>
                                    <th>Tgl. Pengembalian</th>
                                    <th>Total Harga Rental</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 + ($transactions->currentPage() - 1) * $transactions->perPage() }}</td>
                                    <td>{{ $transaction->car->merek }} {{ $transaction->car->tipe }}</td>
                                    <td>{{ $transaction->car->nomor_plat }}</td>
                                    <td><img src="{{ asset('storage/images/' . $transaction->car->gambar) }}" class="img-fluid rounded-3" width="100" height="70"></td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->tanggal_selesai }}</td>
                                    <td>{{ $transaction->total_harga }}</td>
                                    <td>
                                        @if ($transaction->status_rental == 'diproses')
                                            <span class="badge text-bg-primary">Sedang Diproses</span>
                                        @elseif ($transaction->status_rental == 'disewa')
                                            <span class="badge text-bg-success">Disewa</span>
                                        @elseif ($transaction->status_rental == 'ditolak')
                                            <span class="badge text-bg-danger">Ditolak</span>
                                        @elseif ($transaction->status_rental == 'selesai')
                                            <span class="badge text-bg-secondary">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of
                                {{ $transactions->total() }} entries
                            </p>
                        </div>
                        @if ($transactions->hasPages())
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item {{ $transactions->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $transactions->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        @foreach ($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $transactions->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $transactions->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $transactions->nextPageUrl() }}"
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