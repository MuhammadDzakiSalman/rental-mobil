<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rental Mobil | Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-items-center py-3 main-row">
            <div class="col">
                <div class="card shadows border-1 overflow-hidden">
                    <form class="" action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="card-body p-0">
                            <div class="row">
                                <div
                                    class="col-12 col-md-6 col-xl-5 d-flex justify-content-center align-items-center bg-primary p-3">
                                    <img class="img-fluid p-5" src="{{ asset('assets/img/cars.svg') }}" />
                                </div>
                                <div class="col p-3 px-4 me-2 p-xl-5">
                                    <div>
                                        <h3 class="mb-5">Register</h3>
                                    </div>
                                    <div class="mb-2"><label class="form-label d-flex align-items-center mb-1"><svg
                                                class="icon icon-tabler icon-tabler-user me-1"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            </svg>Full Name</label><input class="form-control" type="text"
                                            name="name" required>
                                    </div>
                                    <div class="mb-2"><label class="form-label d-flex align-items-center mb-1"><svg
                                                class="icon icon-tabler icon-tabler-map-pin me-1"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                <path
                                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                                </path>
                                            </svg>Alamat</label><input class="form-control" type="text"
                                            name="alamat" required>
                                    </div>
                                    <div>
                                        <div class="row gx-2">
                                            <div class="col-xl-6">
                                                <div class="mb-2"><label
                                                        class="form-label d-flex align-items-center mb-1"><svg
                                                            class="icon icon-tabler icon-tabler-user-square-rounded me-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z"></path>
                                                            <path
                                                                d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z">
                                                            </path>
                                                            <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05">
                                                            </path>
                                                        </svg>No. KTP</label><input class="form-control" type="text"
                                                        name="nomor_ktp" required></div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-2"><label
                                                        class="form-label d-flex align-items-center mb-1"><svg
                                                            class="icon icon-tabler icon-tabler-phone me-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                                            </path>
                                                        </svg>Phone</label><input class="form-control" type="text"
                                                        name="nomor_telepon" required></div>

                                            </div>
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <label
                                                        class="form-label d-flex align-items-center mb-1">Gender</label>
                                                    <select class="form-control" name="gender" required>
                                                        <option selected disabled>Pilih Gender</option>
                                                        <option value="pria">Pria</option>
                                                        <option value="wanita">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-2"><label
                                                        class="form-label d-flex align-items-center mb-1"><svg
                                                            class="icon icon-tabler icon-tabler-lock me-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z">
                                                            </path>
                                                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                                        </svg>Password<span
                                                            class="text-muted ms-auto small fw-lighter">minimum 8
                                                            characters</span></label>
                                                    <input class="form-control" type="password" name="password"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-2"><label
                                                        class="form-label d-flex align-items-center mb-1"><svg
                                                            class="icon icon-tabler icon-tabler-lock me-1"
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z">
                                                            </path>
                                                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                                        </svg>Password</label>
                                                    <input class="form-control" type="password"
                                                        name="password_confirmation" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <button class="btn btn-primary w-100 mt-2 rounded-3"
                                                type="submit">Register</button>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center py-3">
                                            <hr class="w-100" />
                                            <div><span class="d-flex justify-content-center d-flex mx-3"
                                                    style="width: 12rem;">Have an
                                                    account?</span></div>
                                            <hr class="w-100" />
                                        </div>
                                        <div class="mb-2"><a class="btn btn-outline-primary rounded-3 w-100" role="button"
                                                href="{{ route('auth.login') }}">Login</a></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
