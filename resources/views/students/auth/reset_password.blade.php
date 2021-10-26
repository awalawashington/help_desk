@extends('layouts.portal.app')
@section('content')

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="{{asset('portal/assets/img/logo.png')}}" alt="">
                  <span class="d-none d-lg-block">TUMSA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Step 2 - Email Verification</h5>
                    <p class="text-center small">Enter code sent to your email</p>
                  </div>
                  @if (session('fail'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('fail') }}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <form action="{{ route('student.password.reset') }}" method="post" class="row g-3 needs-validation" novalidate>
                  @csrf
                  <input type="hidden" name="email" value="{{ session('email') }}">
                    <div class="col-lg-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-lg-12">
                      <label for="yourPassword" class="form-label">Password Confirmation</label>
                      <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please confirm your password!</div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Next</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"> Login <a href="{{ route('student.login') }}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Developed by <a href="https://www.facebook.com/awalatechincorporation">AwalaTech Incorporation</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
@endsection










