<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .khung {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>
<body>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('message'))
        <div class="alert alert-primary">{{ session('message') }}</div>
    @endif

    @if(session('messlogout'))
        <div class="alert alert-primary">{{ session('messlogout') }}</div>
    @endif


    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container">
            <div class="row ">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="khung mt-5 p-3">
                        <h3 class="text-center text-uppercase text-success ">Login</h3>
                    <div class="row">
                        <div class="col-12">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        <a
              href="/register"
              class="text-center p-2"
              style="text-decoration: none"
              >Don't have an account? Sign up</a
            >
                    </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

