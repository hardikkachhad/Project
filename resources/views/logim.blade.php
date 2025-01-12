<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">l
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
             
            </aside>
            <aside class="col-sm-4">
                <hr>

                <div class="card">
                    <article class="card-body">
                        <a href="{{ route('register') }}" class="float-right btn btn-outline-primary">Login</a>
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>
                        <form id="userform">
                            <div class="form-group">
                                <label>Your Name</label>
                                <input name="name" class="form-control" placeholder="Name" type="text"
                                    id="name">
                                <p></p>

                            </div>
                            <div class="form-group">
                                <label>Your email</label>
                                <input name="email" class="form-control" placeholder="Email" type="email"
                                    id="email">
                                    <p></p>

                            </div>
                            <div class="form-group">
                                <a class="float-right" href="#">Forgot?</a>
                                <label>Your password</label>
                                <input class="form-control" placeholder="******" type="password" id="password"
                                    name="password">
                                    <p></p>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#userform').submit(function(event) {
            event.preventDefault();

            var formdata = new FormData(this);

            $.ajax({
                url: "{{ route('postLogin') }}",
                type: 'post',
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;

                        if (errors.name) {
                            $('#name').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $('#name').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.password) {
                            $('#password').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.password)
                        } else {
                            $('#password').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.email) {
                            $('#email').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                        } else {
                            $('#email').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    } else {
                        window.location.href = "{{ route('register') }}";
                    }
                }
            });
        });
    </script>
</body>

</html>
