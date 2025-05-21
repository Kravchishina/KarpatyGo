<?php
session_start();
$emailErr = $passwordErr = "";
$email = $password = "";
$loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Некоректний email";
    }
    if (empty($password)) {
        $passwordErr = "Введіть пароль";
    }
    if (!$emailErr && !$passwordErr) {
        require_once "inc/db.php"; // mysqli $conn

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION["user_id"] = $user_id;
                header("Location: profile.php");
                exit();
            } else {
                $loginErr = "Невірний email або пароль";
            }
        } else {
            $loginErr = "Невірний email або пароль";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="/images/logo.png" alt="KarpatyGo" style="height:30px;vertical-align:middle;margin-right:7px;">
            KarpatyGo
        </div>
        <nav>
            <a href="home.php">Головна</a>
            <a href="about.php">Про нас</a>
            <a href="routes.php">Маршрути</a>
            <a href="blog.php">Блог</a>
            <div class="search-box">
                <input type="text" placeholder="Пошук">
                <span class="icon">&#128269;</span>
            </div>
            <a href="login.php" class="btn-login">Вхід</a>
            <a href="register.php" class="btn-register">Зареєструватись +</a>
        </nav>
    </div>

    <div class="center-box" style="max-width:430px;">
        <h2 style="font-size:2.2rem; color:#7c7673; margin-bottom:32px; font-weight:700;">ВХІД</h2>
        <?php if ($loginErr): ?>
            <div class="error-msg" style="color:#c55; margin-bottom:12px;"><?= $loginErr ?></div>
        <?php endif; ?>
        <form method="post" autocomplete="off">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required autofocus>
                <span class="error-msg"><?= $emailErr ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required>
                <span class="error-msg"><?= $passwordErr ?></span>
            </div>
            <button class="login-btn" type="submit">Увійти</button>
        </form>
        <div class="login-links">
            <div><a href="forgot_password.php">Не пам'ятаю пароль</a></div>
            <div>Не має акаунту? <a href="register.php">Реєстрація</a></div>
        </div>
    </div>
</body>
</html>
