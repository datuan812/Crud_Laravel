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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container">
            <div class="row ">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="khung mt-5 p-3">
                        <h3 class="text-center text-uppercase text-success ">Register</h3>
                    <div class="row">
                        <div class="col-12">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" >
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-12">
                            <div>
                                <label for="name">Name:</label>
                                <input type="text"  class="form-control" name="name" id="name" value="{{ old('name') }}"  >
                                @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"  id="email" >
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" name="password" id="password" >
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="password_confirmation">Confirm Password: </label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" >

                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        <a
              href="/login"
              class="text-center p-2"
              style="text-decoration: none"
            >
              Have an account? Log in</a
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

