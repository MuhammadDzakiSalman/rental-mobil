@extends('partials.layouts.main')
@section('title', 'Report')
@section('content')
    <div class="container-fluid">
        <div class="row gy-4 py-3">
            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                <h5 class="fw-semibold m-0">Laporan</h5>
            </div>
        </div>
        <div class="row gy-2 mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row gy-2 pt-1">
                            <div class="col col-12 col-md-6">
                                <div class="d-flex gap-2">
                                    <form method="GET" action="{{ url('/transaksi/download') }}">
                                        <input type="hidden" name="start_date" value="{{ $startDate }}">
                                        <input type="hidden" name="end_date" value="{{ $endDate }}">
                                        <button class="btn btn-primary btn-sm" type="submit">Download</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6">
                                <form method="GET" action="{{ url('/laporan') }}"
                                    class="d-flex align-items-center justify-content-between mb-2 gap-1">
                                    <input type="date" name="start_date" class="form-control form-control-sm"
                                        value="{{ $startDate }}">
                                    <span>-</span>
                                    <input type="date" name="end_date" class="form-control form-control-sm"
                                        value="{{ $endDate }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive shadow-none table mt-2" id="dataTable-1" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table table-hover my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Mobil</th>
                                            <th>Tanggal Rental</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Harga Rental<small>/Hari</small></th>
                                            <th>Total Harga Rental</th>
                                            <th>Denda</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $transaction->user->name }}</td>
                                                <td>{{ $transaction->car->merek }} {{ $transaction->car->tipe }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>{{ $transaction->tanggal_selesai }}</td>
                                                <td>{{ $transaction->car->harga_sewa }}</td>
                                                <td>{{ $transaction->total_harga }}</td>
                                                <td>{{ $transaction->denda }}</td>
                                                <td>{{ $transaction->total_pembayaran }}</td>
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
