@extends('partials.layouts.main')
@section('title', 'Transaction')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Transaksi</h5>
        </div>
    </div>
    <div class="row gy-2 mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row gy-2">
                        <div class="col-md-4 d-flex gap-2">
                            <div id="dataTable_length" class="dataTables_length d-flex align-items-center" aria-controls="dataTable">
                                <form class="d-flex align-items-center" method="GET"
                                    action="{{ route('transaksi.index') }}" id="showForm" style="width: 8rem;">
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
                                <form method="GET" action="{{ route('transaksi.index') }}">
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
                    <div class="table-responsive shadow-none table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>No. Telepon</th>
                                    <th>Mobil</th>
                                    <th>No. Plat</th>
                                    <th>Harga Sewa<small class="fw-normal">/hari</small></th>
                                    <th>Denda<small class="fw-normal">/Jam</small></th>
                                    <th>Tgl. Rental</th>
                                    <th>Tgl. Pengembalian</th>
                                    <th>Status Rental</th>
                                    <th>Bukti Pembayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->user->nomor_telepon }}</td>
                                    <td>{{ $transaction->car->merek }} {{ $transaction->car->tipe }}</td>
                                    <td>{{ $transaction->car->nomor_plat }}</td>
                                    <td>{{ $transaction->car->harga_sewa }}</td>
                                    <td>{{ $transaction->total_harga }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->tanggal_selesai }}</td>
                                    <td>{{ $transaction->status_rental }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <a class="btn btn-outline-primary btn-sm d-flex align-items-center" href="storage/payments/{{ $transaction->bukti_pembayaran }}" target="_blank" role="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-eye">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            @if ($transaction->status_rental == 'selesai')
                                                <button class="btn disabled btn-success btn-sm d-flex align-items-center" type="button">Telah Selesai</button>
                                            @elseif ($transaction->status_rental == 'ditolak')
                                                <button class="btn disabled btn-danger btn-sm d-flex align-items-center" type="button">Telah Ditolak</button>
                                            @else
                                            @if($transaction->status_rental != 'disewa')
                                                <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm d-flex align-items-center" type="submit">Konfirmasi</button>
                                                </form>
                                                <form action="{{ route('transactions.reject', $transaction->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm d-flex align-items-center" type="submit">Tolak</button>
                                                </form>
                                            @endif
                                            @if($transaction->status_rental == 'disewa')
                                                <form action="{{ route('transactions.finish', $transaction->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-outline-primary btn-sm d-flex align-items-center" type="submit">Selesaikan Rental</button>
                                                </form>
                                            @endif
                                            @endif
                                        </div>
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