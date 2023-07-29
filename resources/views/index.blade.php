<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @yield('styles')
    <title>File Sharing Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>

<body>
    <div class="container">
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
        <h2>File Sharing Service</h2>
        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <input type="file" class="form-control" id="inputGroupFile04" name="file"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="submit" type="button"
                    id="inputGroupFileAddon04">Upload</button>
            </div>
        </form>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File Name</th>
                            <th>Share</th>
                            {{-- <th>View</th> --}}
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $file->file_name }}</td>
                                <td><a href="share/{{ $file->id }}" target="_blank">Share</a></td>
                                {{-- <td><a href="view/{{ $file->id }}" target="_blank">View</a></td> --}}
                                <td><a href="file.view/{{ $file->file_name }}" download>Download</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
