@extends('partials.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Dashboard</h5>
        </div>
    </div>
    <div class="row gy-2 mb-3">
        <div class="col-lg-4 col-xl-4">
            <div class="card bg-primary border-0 text-light rounded-3">
                <div class="card-body">
                    <h5 class="fw-semibold card-title">Sedang Dirental</h5>
                    <h5 class="card-subtitle mb-2">{{ $sedangDirental }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card bg-success bg-primary bg-gradient border-0 text-light rounded-3">
                <div class="card-body">
                    <h5 class="fw-semibold card-title">Jumlah Mobil</h5>
                    <h5 class="card-subtitle mb-2">{{ $jumlahMobil }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card bg-info bg-gradient bg-gradient border-0 text-light rounded-3">
                <div class="card-body">
                    <h5 class="fw-semibold card-title">Jumlah Pengguna</h5>
                    <h5 class="card-subtitle mb-2">{{ $jumlahPengguna }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h6 class="fw-semibold m-0">Transaksi Masuk Hari Ini</h6>
        </div>
    </div>
    <div class="row gy-2 py-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <script>
                      const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: "{{ session('success') }}"
                    });
                    </script>
                    @endif
                    <div class="table-responsive shadow-none table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover table-responsive my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Mobil</th>
                                    <th>No. Plat</th>
                                    <th>Harga Sewa<small class="fw-normal">/hari</small></th>
                                    <th>Tgl. Peminjaman</th>
                                    <th>Tgl. Kembali</th>
                                    <th>Total</th>
                                    <th>Cek Pembayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todayTransactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $transaction->car->merek }} {{ $transaction->car->tipe }}</td>
                                        <td>{{ $transaction->car->nomor_plat }}</td>
                                        <td>Rp. {{ number_format($transaction->car->harga_sewa, 0, ',', '.') }}</td>
                                        <td>{{ $transaction->created_at->format('Y/m/d') }}</td>
                                        <td>{{ $transaction->tanggal_selesai->format('Y/m/d') }}</td>
                                        <td>Rp. {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
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
                                                <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm d-flex align-items-center" type="submit">Konfirmasi</button>
                                                </form>
                                                <form action="{{ route('transactions.reject', $transaction->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm d-flex align-items-center" type="submit">Tolak</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($todayTransactions->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada transaksi yang perlu diproses.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
