<?php

require_once 'database.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    die("Login and password are required.");
} else {
   
    $login = mysqli_real_escape_string($conn, $login);
    $pass = mysqli_real_escape_string($conn, $pass);

   
    $sql = "SELECT * FROM `user` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['login'] = $row['login'];
            $auth_success = true;
        }
    } else {
        $auth_success = false;
    }
}

if ($auth_success) { 
    header("Location: welcome.php?login=" . urlencode($login));
    exit;
} else {
    echo "Неверный логин или пароль.";
}
