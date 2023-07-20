<!DOCTYPE html>
<html>

<head>  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @yield('styles')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <title>View File</title>
</head>

<body>
    <div class="container">
    <h1>View File</h1>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if ($file)
        <p>File Name: {{ $file->file_name }}</p>
        <p>File Size: {{ $file->file_size }} bytes</p>
        <a href="/file/{{ $file->id }}">Download</a>
    @endif
</div>
</body>

</html>
