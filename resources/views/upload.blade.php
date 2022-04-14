<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Code X Foo Internship</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <div
        class="container">
        <div class="row" style="margin-top: 10%; margin-left: 30%">
            <div class="col-4">
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
            </div>
            <div class="col-12">
                <form method="post" action={{ route('upload') }} enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="uploadFile" class="form-label">Upload csv file</label>
                        <input type="file" id="uploadFile" name="upload" class="form-control-file">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-secondary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
