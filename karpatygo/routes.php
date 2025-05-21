<?php
// routes.php — Вивід маршрутів 
$routes = [
    [
        'id' => 1,
        'name' => 'Говерла',
        'duration' => 2,
        'height' => 2061,
        'diff' => 1300,
        'price' => 1200
    ],
    [
        'id' => 2,
        'name' => 'Піп Іван',
        'duration' => 3,
        'height' => 2028,
        'diff' => 1100,
        'price' => 1500
    ],
    [
        'id' => 3,
        'name' => 'Петрос',
        'duration' => 2,
        'height' => 2020,
        'diff' => 1200,
        'price' => 1100
    ],
    [
        'id' => 4,
        'name' => 'Бребенескул',
        'duration' => 3,
        'height' => 2035,
        'diff' => 1150,
        'price' => 1400
    ],
    [
        'id' => 5,
        'name' => 'Свидовець',
        'duration' => 4,
        'height' => 1881,
        'diff' => 900,
        'price' => 1600
    ],
    [
        'id' => 6,
        'name' => 'Яйко-Ілемське',
        'duration' => 2,
        'height' => 1679,
        'diff' => 800,
        'price' => 1000
    ],
    [
        'id' => 7,
        'name' => 'Драгобрат',
        'duration' => 2,
        'height' => 1800,
        'diff' => 950,
        'price' => 1300
    ],
    [
        'id' => 8,
        'name' => 'Чорногора',
        'duration' => 5,
        'height' => 2061,
        'diff' => 1700,
        'price' => 2500
    ],
    [
        'id' => 9,
        'name' => 'Мармароси',
        'duration' => 4,
        'height' => 1940,
        'diff' => 1200,
        'price' => 2000
    ],
    [
        'id' => 10,
        'name' => 'Синяк',
        'duration' => 1,
        'height' => 1665,
        'diff' => 700,
        'price' => 900
    ],
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Маршрути — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:800px;">
        <h2>Маршрути</h2>
        <div class="routes-list" style="display:flex; flex-wrap:wrap; gap:22px;">
            <?php foreach ($routes as $route): ?>
            <div class="route-card" style="flex:1 1 240px; min-width:220px; background:#fff; border-radius:16px; box-shadow:0 2px 12px #0001; padding:18px 18px 14px 18px; margin-bottom:10px;">
                <strong style="font-size:1.18rem; color:#6c615a;"><?= htmlspecialchars($route['name']) ?></strong><br>
                <span style="color:#8c7c6b;">Тривалість:</span> <?= $route['duration'] ?> дні<br>
                <span style="color:#8c7c6b;">Висота:</span> <?= $route['height'] ?> м<br>
                <span style="color:#8c7c6b;">Перепад:</span> <?= $route['diff'] ?> м<br>
                <span style="color:#8c7c6b;">Ціна:</span> <?= $route['price'] ?> грн<br>
                <div style="margin-top:12px;">
                    <a href="route_details.php?id=<?= $route['id'] ?>" class="hero-btn" style="width:auto; margin-right:8px;">Детальніше</a>
                    <a href="booking.php?route=<?= $route['id'] ?>" class="hero-btn" style="width:auto;background:#b9a89c99;">Забронювати</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
