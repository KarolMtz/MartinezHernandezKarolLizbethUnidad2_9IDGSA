<?php
session_start();
require_once 'auth.php';

requireAuth();

if (!isLoggedIn()) {
    include 'error_403.php';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Logged In Only Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/contact.css" />
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4">
            <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>!</h1>
            <p class="lead">This page is accessible only to logged-in users.</p>
        </div>
    </div>
</body>
</html>
