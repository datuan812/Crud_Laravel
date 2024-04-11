<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row" style="background-color: aqua; padding: 1rem">
          <div class="hstack gap-3">
            <div class="p-2">Crud Laravel</div>
            <div class="vr"></div>
            <div class="p-2">
                @if (Session::has('name'))
               Wellcome, {{ Session::get('name') }}
            @endif
            </div>
            <div class="p-2 ms-auto">
                @guest
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-info" href="{{ route('register') }}">Register</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-info" href="{{ route('changePassword') }}">Change Password</a>
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            @endguest
            </div>
          </div>
        </div>
      </div>

      @if(session('change'))
        <div class="alert alert-success">{{ session('change') }}</div>
    @endif

      <div class="p-4">
        <a class="btn btn-success " href="/student"> > CRUD 🙋🏻</a>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
