<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.style')
    <style>
      .logop{
        width: 100px;
        height: 120px;
      }
    </style>
</head>
<body>

    <main>
      <div class="container">
  
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <span class="d-none d-lg-block">SI Monitoring Siswa</span>
                  </a>
                </div><!-- End Logo -->
  
                <div class="card mb-3">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    @error('gagal')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ errors('gagal') }}
                    </div>
                    @enderror
                  <div class="card-body">
  
                    <div class="pt-4 pb-2">
                      <figure class="text-center">
                        <img src="{{ asset('img/logo.png') }}" alt="sma" class="logop">
                      </figure>
                      <h5 class="card-title text-center pb-0 fs-4">LOGIN</h5>
                      <p class="text-center small">Masukkan email dan password kamu untuk login</p>
                    </div>
  
                    <form class="row g-3 needs-validation" method="post" action="{{ route('login') }}" novalidate>
                        @csrf
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="text" autocomplete="off" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Masukkan email.." required>
                          <div class="invalid-feedback ">Please enter your username.</div>
                        </div>
                      </div>
  
                      <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Masukkan Password.. " class="form-control" id="password" autocomplete="current-password" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember">
                          <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100 mt-1" type="submit">Login</button>
                      </div>
                    </form>
  
                  </div>
                </div>
  
              </div>
            </div>
          </div>
  
        </section>
  
      </div>
    </main><!-- End #main -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    @include('layouts.script')
    @include('sweetalert::alert')
  </body>
</html>