<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <h1 class="text-center">Welcome to Invoices System</h1>
                        <p class="text-center">You have requested to reset your password.</p>
                        <p class="text-center">Your new password is: <strong>{{ $data }}</strong></p>
                        <p class="text-center">Please keep it safe and secure.</p>
                        <p class="text-center">If you did not request this change, please ignore this email.</p>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
