<!DOCTYPE html>
<html>

<head>
    <title>File Sharing App</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>

<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="file">
        </div>
        <div class="form-group">

            <button type="submit">Upload</button>
        </div>
    </form>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $file->file_name }}</td>
                            <td><a href="file.upload/{{ $file->file_name }}" target="_blank">View</a></td>
                            <td><a href="file.download/{{ $file->file_name }}" download>Download</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
