<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
            <p>File Type: {{ File::mimeType(storage_path('app/' . $file->file_path)) }}</p>
            <div>
                <iframe src="{{ Storage::url($file->file_path) }}"
                    type="{{ File::mimeType(storage_path('app/' . $file->file_path)) }}"
                    style="width: 100%; height: 500px;"></iframe>
            </div>
        @endif
        <p><a href="/file/{{ $file->id }}" type="button" class="btn btn-secondary">Download File</a></p>
        <p><a href="/" type="button" class="btn btn-primary">Back to File List</a></p>
    </div>
</body>
</html>
