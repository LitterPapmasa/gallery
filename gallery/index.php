<?php require 'fun.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo galery</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
    <?php if (checkLoginActive($usersdb)):?>

        <div>
            <a href="logout.php">logout</a>
        </div>
    <?php include 'fileload-form.php'; ?>
    <?php include 'galery.php'; ?>

    <?php else: ?>
        <div>
            <a href="auth-form.php">login</a>
        </div>
    <?php include 'galery.php'; ?>

    <?php endif; ?>

</body>
</html>