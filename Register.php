<?php


require_once 'database.php';

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatPass = $_POST['repeatpass'];
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeatPass) || empty($email)) {
    die("All fields are required.");
} elseif ($pass !== $repeatPass) {
    die("Passwords do not match.");
} elseif (strlen($login) < 6 || strlen($pass) < 6) {
    die("Login and password must be at least 6 characters long.");
} elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $login)) {
    die("Login can only contain letters, numbers, and underscores.");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format."); 
} elseif (strlen($pass) > 20 || strlen($login) > 20 || strlen($email) > 50) {
    die("Login, password, and email must not exceed their respective length limits.");
} else {
    // Проверка на занятый логин
    $checkLoginSql = "SELECT * FROM `user` WHERE login = '$login'";
    $loginResult = $conn->query($checkLoginSql);

    if ($loginResult->num_rows > 0) {
        die("Логин уже занят.");
    }

    // Проверка на занятую почту
    $checkEmailSql = "SELECT * FROM `user` WHERE email = '$email'";
    $emailResult = $conn->query($checkEmailSql);

    if ($emailResult->num_rows > 0) {
        die("Почта уже занята.");
    }

    $sql = "INSERT INTO `user` (login, pass, email) VALUES ('$login', '$pass', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: welcome.php?login=" . urlencode($login));
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}