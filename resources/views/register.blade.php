<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Book | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 100%;
        padding: 30px;
    }

    form div {
        margin-bottom: 15px;
    }
</style>
<body>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-6" >
            <div class="card rounded-5 text-black" style="background-color: #9e051e">
            <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div style="width: 100%;" class="text-center">
                    </div>
                </div>
    <div class="main d-flex flex-column justify-content-center align-items-center">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
            <div class="alert alert-success" style="width: 500px">
                {{ session('message') }}
            </div>
            @endif
        <div class="register-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label text-light">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div>
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <label for="phone" class="form-label text-light">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div>
                    <label for="address" class="form-label text-light">Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center text-light">
                    Have Account? <a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>