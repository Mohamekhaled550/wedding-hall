<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Created</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Invoice Created</div>
                    <div class="card-body">
                        <h1 class="text-center">Invoice Created Successfully</h1>
                        <p class="text-center">The invoice has been successfully created.</p>
                        <div class="text-center">
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
