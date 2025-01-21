<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Vertical (basic) form</h2>
        <form id="form">


            <div class="form-group">
                <label for="sel2" class="form-label">category:</label>
                <select class="form-control" id="sellist2" name="sellist2">
                    <option value="">choose</option>
                    @foreach ($category as $categoryi9tem)
                        <option value="{{ $categoryi9tem->id }}">{{ $categoryi9tem->name }}</option>
                    @endforeach
                </select>
                <p></p>
            </div>
            <div class="form-group">
                <label for="email">name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <p></p>
            </div>
            <div class="form-group">
                <label for="pwd">image:</label>
                <input type="file" class="form-control" id="image" placeholder="Enter password" name="image">
                <p></p>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{  route('postStore'), }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors; 
                        if (errors.sellist2) {
                            $('#sellist2').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.sellist2)
                        } else {
                            $('#sellist2').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
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
                        if (errors.image) {
                            $('#image').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.image)
                        } else {
                            $('#image').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    } else {
                        window.location.href = "{{ route('index') }}"
                    }
                }
            })
        });
    </script>
</body>

</html>
