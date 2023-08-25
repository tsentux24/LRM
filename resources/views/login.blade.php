<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="assets/img/favicon.png" rel="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/assets/login/css/style.css">

    <title>Logistic Report Management System-Login</title>
  </head>
  <body id="login_wrapper">
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="/assets/login/images/undraw_remotely_2j6y.svg" alt="Image">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">Selamat Datang di Logistic Report Management System.</p>
              @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
                
              @endif
            </div>
        
            
            <form action="/" method="post">
              @csrf
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" value="{{ old('Email') }}" id="uname" name="Email" autocomplete="off">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pass" autocomplete="off">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

             
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="/assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/login/js/popper.min.js"></script>
    <script src="/assets/login/js/bootstrap.min.js"></script>
    <script src="/assets/login/js/main.js"></script>
  </body>
</html>