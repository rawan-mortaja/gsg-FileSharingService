<!DOCTYPE html>
<html>
<head>
    <title>Share File</title>
</head>
<body>
    <h1>Share File</h1>
    <h2>{{ $file->file_name }}</h2>
    <p>Size: {{ $file->file_size }} bytes</p>
    <p>Share this link:</p>
    <input type="text" value="{{ $shareLink }}" readonly>
    <br>
    <a href="{{ $shareLink }}" target="_blank">Open Link</a>
</body>
</html>
