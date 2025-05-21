<?php
session_start();
$nameErr = $emailErr = $phoneErr = $passwordErr = $confirmErr = $birthErr = "";
$name = $email = $phone = $birthdate = $password = $confirm_password = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    $name = trim($_POST["name"]);
    $birthdate = $_POST["birthdate"];
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($name) || !preg_match("/^[a-zA-Zа-яА-ЯіІїЇєЄ\s]+$/u", $name)) {
        $nameErr = "Введіть коректне ім'я";
        $valid = false;
    }

    if (empty($birthdate)) {
        $birthErr = "Оберіть дату народження";
        $valid = false;
    }

    if (empty($phone) || !preg_match("/^\+?[0-9\s\-]{10,15}$/", $phone)) {
        $phoneErr = "Введіть коректний номер телефону";
        $valid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Некоректний email";
        $valid = false;
    }

    if (strlen($password) < 6) {
        $passwordErr = "Пароль має бути мінімум 6 символів";
        $valid = false;
    }

    if ($password !== $confirm_password) {
        $confirmErr = "Паролі не співпадають";
        $valid = false;
    }

    if ($valid) {
        require_once "inc/db.php"; // припускаємо, що тут mysqli $conn

        $stmt = $conn->prepare("INSERT INTO users (name, birthdate, phone, email, password) VALUES (?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssss", $name, $birthdate, $phone, $email, $hashed_password);
        $stmt->execute();
        $stmt->close();

        $success = "Реєстрація успішна!";
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація — KarpatyGo</title>
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
        <h2>РЕЄСТРАЦІЯ</h2>
        <form method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="name" placeholder="Ім’я" value="<?= htmlspecialchars($name) ?>" required>
                <span class="error-msg"><?= $nameErr ?></span>
            </div>
            <div class="form-group">
                <input type="date" name="birthdate" placeholder="Дата народження" value="<?= htmlspecialchars($birthdate) ?>" required>
                <span class="error-msg"><?= $birthErr ?></span>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Телефон" value="<?= htmlspecialchars($phone) ?>" required>
                <span class="error-msg"><?= $phoneErr ?></span>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
                <span class="error-msg"><?= $emailErr ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required>
                <span class="error-msg"><?= $passwordErr ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" placeholder="Підтвердіть пароль" required>
                <span class="error-msg"><?= $confirmErr ?></span>
            </div>
            <button class="login-btn" type="submit">Зареєструватись</button>
        </form>
        <div class="login-links">
            <div>Вже маєте акаунт? <a href="login.php">Вхід</a></div>
        </div>
    </div>
</body>
</html>
