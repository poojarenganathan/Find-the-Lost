<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find-the-Lost</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
          <!-- Styles -->
          <style>
              html, body {
                  background-image: url("{{url('images/background.jpg')}}");
                  font-family: 'Nunito', sans-serif;
                  font-weight: 200;
                  height: 100vh;
                  margin: 0;
              }

              .full-height {
                  height: 100vh;
              }

              .flex-center {
                  align-items: center;
                  display: flex;
                  justify-content: center;
              }

              .position-ref {
                  position: relative;
              }

              .top-right {
                  position: absolute;
                  right: 10px;
                  top: 18px;
              }

              .content {
                  text-align: center;
              }

              .title {
                  font-size: 150px;
                  font-family: 'Nunito', sans-serif;
                  font-weight: 500;
                  color: rgb(125,0,0);
              }

              .links > a {
                  color: rgb(255,255,255);
                  padding: 0 25px;
                  font-size: 20px;
                  font-weight: 500;
                  letter-spacing: .1rem;
                  text-decoration: none;
              }

              .view > a {
                  color: rgb(255,255,255);
                  padding: 0 25px;
                  font-size: 28px;
                  font-weight: 500;
                  letter-spacing: .1rem;
                  text-decoration: none;
              }

              .m-b-md {
                  margin-bottom: 30px;
              }

              .navbar {
                  min-height: 60px;
              }

          </style>
    </head>
    <body>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header"></div>
            @if (Route::has('login'))
                <div class="top-right links" >
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}"<span class="glyphicon glyphicon-log-in"></span>Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"<span class="glyphicon glyphicon-user"></span>Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          </div>
      </nav>
      <div class="content">
          <div class="title m-b-md">
              Find-the-Lost
          </div>
          <div class="view">
              @if(Auth::check() && Auth()->user()->id)
                <a href="{{ route('items.index') }}" class="btn btn- primary">View Lost Items </a>
              @else
                <a href="{{ route('items.index') }}" class="btn btn- primary">View Lost Items </a>
              @endif
          </div>
      </div>
    </body>
</html>
