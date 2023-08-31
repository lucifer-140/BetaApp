<?php
session_start();
require 'user_dbcon.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['isAdmin'] = ($user['username'] === 'admin123');

        if ($_SESSION['isAdmin']) {
            header("Location: mainpage.php");
            exit();
        } else {
            header("Location: mainpage.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Please enter username and password";
    header("Location: login.php");
    exit();
}
?>
