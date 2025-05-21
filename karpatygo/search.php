<?php
$results = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['query'])) {
    $query = trim($_GET['query']);
    if (stripos("Говерла", $query) !== false) {
        $results[] = "Говерла";
    }
    if (stripos("Піп Іван", $query) !== false) {
        $results[] = "Піп Іван";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Пошук — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:500px;">
        <h2>Пошук маршрутів</h2>
        <form method="get">
            <input type="text" name="query" placeholder="Введіть назву або гіда...">
            <button class="hero-btn" type="submit" style="width:auto;">Знайти</button>
        </form>
        <div class="search-results" style="margin-top:24px;">
            <?php foreach ($results as $res): ?>
                <div style="background:#fff; border-radius:8px; padding:8px; margin-bottom:8px;"><?= htmlspecialchars($res) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
