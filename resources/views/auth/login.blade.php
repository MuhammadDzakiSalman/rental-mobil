<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rental Mobil | Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col py-3">
                <div class="card shadows border-1 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row">
                            <div
                                class="col-12 col-md-6 d-flex justify-content-center align-items-center bg-primary p-3">
                                <img class="img-fluid p-5" src="assets/img/cars.svg"></div>
                            <div class="col p-3 px-4 me-2 p-xl-5">
                                <div>
                                    <h3 class="mb-5">Login</h3>
                                </div>
                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf
                                    <div class="mb-2">
                                        <label class="form-label d-flex align-items-center mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-phone me-1"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"> </path></svg>Phone
                                        </label>
                                        <input class="form-control" type="text" name="nomor_telepon" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-flex align-items-center mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-lock me-1"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path><path d="M8 11v-4a4 4 0 1 1 8 0v4"></path></svg>Password
                                        </label>
                                        <input class="form-control" type="password" name="password" required>
                                    </div>
                                    <button class="btn btn-primary w-100 rounded-3" type="submit">Login</button>
                                </form>
                                <div class="d-flex justify-content-center align-items-center py-3">
                                    <hr class="w-100">
                                    <div><span class="d-flex justify-content-center d-flex mx-3"
                                            style="width: 12rem; font-size:14px">Don't have an account?</span></div>
                                    <hr class="w-100">
                                </div>
                                <div class="mb-2"><a class="btn btn-outline-primary w-100 rounded-3" role="button"
                                        href="{{ route('auth.register') }}">Register</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
