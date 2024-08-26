@extends('partials.layouts.main')
@section('title', 'Change Password')
@section('content')
<div class="container-fluid">
    <div class="row gy-4 py-3">
        <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
            <h5 class="fw-semibold m-0">Ganti Password</h5>
        </div>
    </div>
    <div class="row gy-2 mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="row gy-2 gx-2">
                            <div class="col col-12 col-lg-6">
                                <div class="">
                                    <label for="current_password" class="form-label small mb-1">Password Lama</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-6">
                                <div class="">
                                    <label for="new_password" class="form-label small mb-1">Password Baru</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-6">
                                <div class="">
                                    <label for="new_password_confirmation" class="form-label small mb-1">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn mt-3 btn-primary rounded-3">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
