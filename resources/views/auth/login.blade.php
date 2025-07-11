@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});" style ="margin-top: -5%" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Login</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Login</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form action="{{ route('login') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
            @csrf
              <h3 class="mb-4 billing-heading">Login</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                  <div class="form-group">
                      <label for="Email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="Password">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

              </div>
              <div class="col-md-12">
                  <div class="form-group mt-4">
                          <div class="radio">
                              <button name="submit" type="submit" class="btn btn-primary py-3 px-4">Login</button>
                          </div>
                  </div>
              </div>           
            </form>
        </div> 
        </div>
      </div>
    </div>
  </section> 
@endsection
