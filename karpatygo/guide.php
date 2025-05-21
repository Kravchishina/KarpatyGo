<?php
// guide.php — список гідів 
$guides = [
    [
        'name' => 'Андрій Ковальчук',
        'photo' => '/images/guide1.jpg',
        'desc' => 'Досвідчений гід з багаторічним стажем. Захоплюється гірським орієнтуванням.'
    ],
    [
        'name' => 'Ольга Савчук',
        'photo' => '/images/guide2.jpg',
        'desc' => 'Гідеса з піших маршрутів. Родинні та легкі походи. Завжди допоможе обрати оптимальний маршрут.'
    ],
    [
        'name' => 'Марта Бойко',
        'photo' => '/images/guide3.jpg',
        'desc' => 'Гідеса з трекінгових подорожей. Має сертифікати з організації активного відпочинку.'
    ],
    [
        'name' => 'Тарас Литвин',
        'photo' => '/images/guide4.jpg',
        'desc' => 'Експерт з багатоденних походів. Завжди знаходить наймальовничіші стежки.'
    ],
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Гіди — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        .guides-title {
            font-size: 2.7rem;
            color: #7c7673;
            margin-bottom: 38px;
            font-weight: 700;
            letter-spacing: 2px;
            text-align: center;
        }
        .guides-list {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            justify-content: center;
        }
        .guide-card {
            background: #e6e0db;
            border-radius: 24px;
            box-shadow: 0 2px 14px #0001;
            padding: 24px 18px 18px 18px;
            min-width: 210px;
            max-width: 230px;
            flex: 1 1 210px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .guide-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            border: 2px solid #b9a89c;
            background: #fff;
        }
        .guide-name {
            font-size: 1.12rem;
            color: #6c615a;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
        }
        .guide-desc {
            color: #5a4b3e;
            font-size: 1.02rem;
            margin-bottom: 8px;
            text-align: center;
        }
        @media (max-width: 900px) {
            .guides-list { flex-direction: column; gap: 22px; align-items: center; }
            .guide-card { min-width: 0; max-width: 320px; }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div style="max-width:1100px; margin: 48px auto 0 auto;">
        <div class="guides-title">Гіди</div>
        <div class="guides-list">
            <?php foreach ($guides as $guide): ?>
                <div class="guide-card">
                    <img src="<?= htmlspecialchars($guide['photo']) ?>" alt="<?= htmlspecialchars($guide['name']) ?>" class="guide-photo">
                    <div class="guide-name"><?= htmlspecialchars($guide['name']) ?></div>
                    <div class="guide-desc"><?= htmlspecialchars($guide['desc']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
