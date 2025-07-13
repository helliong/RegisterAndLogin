<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .welcome-container {
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }
        .red-login {
            color: red;
            font-weight: bold;
            font-size: 2em;
            text-shadow: 0 0 10px red, 0 0 20px red;
            animation: blink-shadow 1s infinite alternate;
        }
        @keyframes blink-shadow {
            from {
                text-shadow: 0 0 10px red, 0 0 20px red;
            }
            to {
                text-shadow: 0 0 30px #ff0000, 0 0 60px #ff0000;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <?php
        $login = isset($_GET['login']) ? $_GET['login'] : '';
        ?>
        <h2>Welcome, <span class="red-login"><?php echo htmlspecialchars($login); ?></span>!</h2>
        <?php
        // Получаем случайную картинку с TheCatAPI
        $catApiUrl = "https://api.thecatapi.com/v1/images/search";
        $catImg = "https://cdn2.thecatapi.com/images/MTY3ODIyMQ.jpg"; // запасная картинка

        $response = @file_get_contents($catApiUrl);
        if ($response !== false) {
            $data = json_decode($response, true);
            if (!empty($data[0]['url'])) {
                $catImg = $data[0]['url'];
            }
        }
        ?>
        <img src="<?php echo $catImg; ?>" alt="Котик" style="margin-top: 20px; max-width: 500px; border-radius: 16px;">
    </div>
</body>
</html>
