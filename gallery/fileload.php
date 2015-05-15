<?php require_once 'fun.inc.php';
// variable $folder is set in data.php and included in fun.inc.php.


if (isset($_POST['submit']) and !empty($_FILES['image']['name'])) {
    // 5mb limit
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $_SESSION['file'] = "Sorry, your file is too large.";
        header('Location: index.php');
        exit;
    }
    $destPath = './' . $folder . '/';
    $newName = $destPath . basename($_FILES['image']['name']);
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
    }
    if ($res) {
        $_SESSION['file'] = "File has been uploaded successfully :)";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['file'] = "Error. File hasn't been uploaded :(";
        $_SESSION['file'].= "file name: " . $newName;
        header('Location: index.php');
        exit;
    }
} else {
    $_SESSION['file'] = "File hasn't been chosen";
    header('Location: index.php');
    exit;
}