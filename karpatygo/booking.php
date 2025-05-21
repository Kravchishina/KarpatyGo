<?php
$success = $error = "";
$route = $_GET['route'] ?? "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route = $_POST["route"];
    $date = $_POST["date"];
    $seats = $_POST["seats"];
    if (!$route || !$date || !$seats) {
        $error = "Заповніть всі поля!";
    } else {
        // require_once "inc/db.php";
        // $stmt = $conn->prepare("INSERT INTO bookings (route, date, seats) VALUES (?, ?, ?)");
        // $stmt->bind_param("ssi", $route, $date, $seats);
        // $stmt->execute();
        // $stmt->close();
        $success = "Бронювання успішне! Деталі на email.";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Бронювання — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:430px;">
        <h2>БРОНЮВАННЯ</h2>
        <?php if ($success): ?><div class="success-msg"><?= $success ?></div><?php endif; ?>
        <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
        <form method="post">
            <input type="text" name="route" placeholder="Маршрут" value="<?= htmlspecialchars($route) ?>" required>
            <input type="date" name="date" required>
            <input type="number" name="seats" placeholder="Кількість учасників" min="1" required>
            <button class="hero-btn" type="submit">Забронювати</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
