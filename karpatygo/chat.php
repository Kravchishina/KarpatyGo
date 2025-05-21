<?php
session_start();
$messages = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])) {
    $msg = trim($_POST['message']);
    $messages[] = "Ви: " . htmlspecialchars($msg);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Онлайн-чат — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:430px;">
        <h2>Онлайн-чат</h2>
        <div style="height:200px; background:#fff; border-radius:12px; margin-bottom:16px; overflow-y:auto; border:1px solid #ddd; padding:12px;">
            <?php foreach ($messages as $m): ?>
                <div><?= $m ?></div>
            <?php endforeach; ?>
        </div>
        <form method="post">
            <input type="text" name="message" placeholder="Введіть повідомлення..." required>
            <button class="hero-btn" type="submit" style="width:auto;">Відправити</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
<?php
session_start();
$messages = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])) {
    $msg = trim($_POST['message']);
  
    $messages[] = "Ви: " . htmlspecialchars($msg);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Онлайн-чат — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:430px;">
        <h2>Онлайн-чат</h2>
        <div style="height:200px; background:#fff; border-radius:12px; margin-bottom:16px; overflow-y:auto; border:1px solid #ddd; padding:12px;">
            <?php foreach ($messages as $m): ?>
                <div><?= $m ?></div>
            <?php endforeach; ?>
        </div>
        <form method="post">
            <input type="text" name="message" placeholder="Введіть повідомлення..." required>
            <button class="hero-btn" type="submit" style="width:auto;">Відправити</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
