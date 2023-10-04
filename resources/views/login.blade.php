<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Book | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 100vh;
        padding: 10px;
    }

    form div {
        margin-bottom: 15px;
    }

    .logo {
    width: 325px; /* Adjust the width as needed */
    margin-bottom: 10px; /* Adjust the margin between the logo and the form */
    display: block;
    margin: 0 auto;
    }
</style>

<body>
    <section class="h-100 gradient-form" style="background-image: url(assets/img/rapat.png);
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-size: cover;
                                                background-color: #9e051e;">
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        <img src="{{ asset('assets/img/op_room.png') }}" alt="Logo" class="logo ">
        <div class="login-box p-5">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label text-light">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="text-center">
                    Don't Have Account? <a href="register">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </section>
</body>
</html>