<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body>


    <div class="container">
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                </div>
            </aside>
            <aside class="col-sm-4">
                <hr>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('Failed'))
                    <div class="alert alert-danger">{{ Session::get('Failed') }}</div>
                @endif
                <div class="card">
                    <article class="card-body">
                        <a href="{{ route('login') }}" class="float-right btn btn-outline-primary">Sign up</a>
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>
                        <form action="{{ route('postRegister') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Your email</label>
                                <input name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" type="email" id="email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group">
                                <a class="float-right" href="#">Forgot?</a>
                                <label>Your password</label>
                                <input class="form-control  @error('password') is-invalid @enderror"
                                    placeholder="******" type="password" id="password" name="password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label> <input type="checkbox"> Save password </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>
                        </form>
                    </article>
                </div>

            </aside>
        </div>

    </div>

    <br><br><br>
</body>

</html>
