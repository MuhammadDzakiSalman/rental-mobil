@extends('partials.layouts.main')
@section('title', 'Data User')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Data User</h5>
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
                                    action="{{ route('user.index') }}" id="showForm" style="width: 8rem;">
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
                                <form method="GET" action="{{ route('user.index') }}">
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. KTP</th>
                                    <th>No. Tlp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->nomor_ktp }}</td>
                                    <td>{{ $user->nomor_telepon }}</td>
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
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of
                                {{ $users->total() }} entries
                            </p>
                        </div>
                        @if ($users->hasPages())
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}"
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