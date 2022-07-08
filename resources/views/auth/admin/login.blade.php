<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
</head>

<body class="c-app d-flex flex-row align-items-center vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">

                        <form action="{{ url('dashboard/login') }}" method="post">
                            @csrf

                            <h1>Login</h1>
                            <p class="text-muted">Login To Your Account</p>

                            <div class="input-group mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                       type="text"
                                       value="{{ old('email') }}"
                                       placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                       type="password"
                                       placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/backend.js') }}"></script>
</body>
</html>
