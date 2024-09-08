<x-header></x-header>
<!-- dibawah ini adalah settingan background-image -->
<body style="background-image: url('asset/img/bg.jpeg'); background-size: cover; background-position: center bottom;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <!-- Social login form-->
                            <div class="card my-5">

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div>{{ session('error') }}</div>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="card-body p-5 text-center">
                                    <div class="h3 fw-light mb-3">SILAHKAN LOGIN</div>
                                    <!-- Social login links-->
                                    <!-- <a class="btn btn-icon btn-facebook mx-1" href="#!"><i
                                            class="fab fa-facebook-f fa-fw fa-sm"></i></a> -->
                                    <div class="avatar avatar-xxl">
                                        <img class="avatar-img img-fluid"
                                            src="{{ asset('asset/assets/img/logo.png') }}" />
                                    </div>

                                </div>
                                <hr class="my-0" />
                                <div class="card-body p-5">
                                    <!-- Login form-->
                                    <form action="{{ url('/') }}" method="POST">
                                        @csrf
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="emailExample">Username</label>
                                            <input class="form-control form-control-solid" name="username"
                                                type="text" placeholder="" aria-label="Username"
                                                aria-describedby="emailExample" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="passwordExample">Password</label>
                                            <input class="form-control form-control-solid" name="password"
                                                type="password" placeholder="" aria-label="Password"
                                                aria-describedby="passwordExample" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-0">
                                            <button class="btn btn-primary lift" type="submit">Login</button>
                                        </div>
                                    <!-- </form>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body px-5 py-4">
                                     <div class="small text-center">
                                        New user?
                                        <a href="{{ url('daftar') }}">Create an account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">

                        <div class="col-md-6 text-md-end small">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>
<x-footer></x-footer>
