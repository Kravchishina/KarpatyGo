<?php
$recs = [
    ['name'=>'Маршрут "Говерла"', 'desc'=>'Найпопулярніший похід, 2 дні, 2061 м, ціна 1200 грн'],
    ['name'=>'Маршрут "Піп Іван"', 'desc'=>'Складний маршрут, 3 дні, 2028 м, ціна 1500 грн'],
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Рекомендовані маршрути — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="center-box" style="max-width:700px;">
        <h2>Рекомендовані маршрути</h2>
        <div class="routes-list">
            <?php foreach ($recs as $rec): ?>
                <div class="route-card">
                    <strong><?= htmlspecialchars($rec['name']) ?></strong><br>
                    <?= htmlspecialchars($rec['desc']) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
