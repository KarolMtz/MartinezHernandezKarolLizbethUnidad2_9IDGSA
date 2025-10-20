<?php
http_response_code(403);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <style>
        .error-container {
            margin-top: 100px;
            text-align: center;
        }
        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #dc3545;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .error-description {
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container error-container">
        <div class="error-code">403</div>
        <div class="error-message">Forbidden - You do not have permission to access this page.</div>
        <div class="error-description">
            Please contact the administrator if you believe this is an error.<br>
            <a href="login.php" class="btn btn-primary mt-3">Return to Login</a>
        </div>
    </div>
</body>
</html>
