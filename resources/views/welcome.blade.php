<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Niswey Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="card text-center shadow-lg p-4 rounded-3" style="width: 350px;">
        <div class="card-body">
            <h2 class="card-title fw-bold">Niswey Task</h2>
            <a href="{{route('contact.list')}}" class="btn btn-primary mt-3">Contacts List</a>
            <a href="{{route('contact.import-contacts')}}" class="btn btn-success mt-3">Bulk Import</a>
            <a href="{{url('public/necessary-files/contact.xml')}}" class="btn btn-secondary mt-3" download>Demo xml file download</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
