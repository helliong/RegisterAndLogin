<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <form action="register.php" method="post" class="register-form">

        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="password" name="pass">
        <input type="text" placeholder="repeat password" name="repeatpass">
        <input type="text" placeholder="email" name="email">
        <button type="submit">Зарегестрироваться</button>
    </form>

    <form action="login.php" method="post" class="login-form">
        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="password" name="pass">
        <button type="submit">Войти</button>
    </form>
</body>

</html>