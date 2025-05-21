<?php
// reviews.php — Відгуки користувачів
$reviews = [
    [
        'name' => 'Марина К., Київ',
        'photo' => '/images/review1.jpg',
        'stars' => 5,
        'text' => 'Це був мій перший похід у гори — і точно не останній! Все організовано на найвищому рівні: маршрут цікавий, гід уважний і позитивний. Дякую за незабутні емоції!'
    ],
    [
        'name' => 'Олександр П., Львів',
        'photo' => '/images/review2.jpg',
        'stars' => 5,
        'text' => 'Бронювання просте, маршрут чітко описаний, гід був справжнім професіоналом. Враження після Карпат і дружня атмосфера в групі. Дуже раджу!'
    ],
    [
        'name' => 'Ірина М., Дніпро',
        'photo' => '/images/review3.jpg',
        'stars' => 5,
        'text' => 'Сервіс перевершив усі очікування. Зручно спланували подорож, отримали відповіді на всі питання ще до поїздки. За безпеку і комфорт можна бути спокійним навіть у новачкові.'
    ],
    [
        'name' => 'Марина К., Київ',
        'photo' => '/images/review1.jpg',
        'stars' => 5,
        'text' => 'Це був мій перший похід у гори — і точно не останній! Все організовано на найвищому рівні: маршрут цікавий, гід уважний і позитивний. Дякую за незабутні емоції!'
    ],
    [
        'name' => 'Олександр П., Львів',
        'photo' => '/images/review2.jpg',
        'stars' => 5,
        'text' => 'Бронювання просте, маршрут чітко описаний, гід був справжнім професіоналом. Враження після Карпат і дружня атмосфера в групі. Дуже раджу!'
    ],
    [
        'name' => 'Ірина М., Дніпро',
        'photo' => '/images/review3.jpg',
        'stars' => 5,
        'text' => 'Сервіс перевершив усі очікування. Зручно спланували подорож, отримали відповіді на всі питання ще до поїздки. За безпеку і комфорт можна бути спокійним навіть у новачкові.'
    ],
    [
        'name' => 'Віталій С., Харків',
        'photo' => '/images/review4.jpg',
        'stars' => 4,
        'text' => 'Чудова організація, цікаві люди, неймовірні краєвиди! Трохи втомився, але це того варте.'
    ],
    [
        'name' => 'Олена Л., Одеса',
        'photo' => '/images/review5.jpg',
        'stars' => 5,
        'text' => 'Дякую KarpatyGo за нових друзів і яскраві враження! Обов’язково ще поїду з вами.'
    ],
    [
        'name' => 'Роман Г., Чернівці',
        'photo' => '/images/review6.jpg',
        'stars' => 5,
        'text' => 'Гіди — супер! Пояснили, підтримали, допомогли. Рекомендую всім, хто хоче спробувати справжній похід.'
    ],
    [
        'name' => 'Світлана П., Вінниця',
        'photo' => '/images/review7.jpg',
        'stars' => 5,
        'text' => 'Дуже сподобалось! Безпечно, зручно, цікаво. Дякую за турботу і атмосферу!'
    ],
    [
        'name' => 'Максим Д., Тернопіль',
        'photo' => '/images/review8.jpg',
        'stars' => 4,
        'text' => 'Погода підвела, але команда KarpatyGo все компенсувала! Повернуся ще.'
    ],
    [
        'name' => 'Анастасія Ф., Запоріжжя',
        'photo' => '/images/review9.jpg',
        'stars' => 5,
        'text' => 'Всі маршрути цікаві, бронювання просте, гіди — професіонали. Дуже дякую!'
    ],
    [
        'name' => 'Денис К., Полтава',
        'photo' => '/images/review10.jpg',
        'stars' => 5,
        'text' => 'Похід з KarpatyGo — найкращий відпочинок! Все на вищому рівні, рекомендую друзям.'
    ],
];

// Обробка додавання нового відгуку (демо-логіка)
$success = $error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $text = trim($_POST["text"] ?? "");
    $stars = intval($_POST["stars"] ?? 0);
    if (!$name || !$text || $stars < 1 || $stars > 5) {
        $error = "Заповніть усі поля та поставте оцінку!";
    } else {
     
        $success = "Дякуємо за ваш відгук!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Відгуки — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        .reviews-title {
            font-size: 2.7rem;
            color: #7c7673;
            margin-bottom: 32px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 2px;
        }
        .reviews-slider {
            display: flex;
            gap: 32px;
            justify-content: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .review-card {
            background: #f5f1ee;
            border-radius: 18px;
            box-shadow: 0 2px 14px #0001;
            padding: 24px 18px 18px 18px;
            min-width: 260px;
            max-width: 320px;
            flex: 1 1 260px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1.5px solid #ddd3cb;
        }
        .review-photo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 2px solid #b9a89c;
            background: #fff;
        }
        .review-name {
            font-size: 1.07rem;
            color: #6c615a;
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
        }
        .review-stars {
            color: #e2b64a;
            font-size: 1.18rem;
            margin-bottom: 10px;
        }
        .review-text {
            color: #5a4b3e;
            font-size: 1.01rem;
            text-align: center;
        }
        .slider-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            margin-bottom: 18px;
        }
        .slider-dot {
            width: 13px; height: 13px;
            border-radius: 50%;
            background: #d6cdc8;
            margin: 0 4px;
            display: inline-block;
        }
        .slider-dot.active {
            background: #b9a89c;
        }
        .slider-arrow {
            font-size: 2.1rem;
            color: #b9a89c;
            cursor: pointer;
            user-select: none;
            transition: color 0.2s;
        }
        .slider-arrow:hover {
            color: #a08c7c;
        }
        .review-form-wrap {
            max-width: 400px;
            margin: 34px auto 0 auto;
            background: #f5f1ee;
            border-radius: 20px;
            padding: 26px 22px 22px 22px;
            box-shadow: 0 2px 14px #0001;
        }
        .review-form-wrap h3 {
            color: #7c7673;
            font-size: 1.18rem;
            margin-bottom: 16px;
            font-weight: 600;
            text-align: center;
        }
        .review-form-wrap input,
        .review-form-wrap textarea,
        .review-form-wrap select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1c7be;
            font-size: 1rem;
            background: #fff;
            color: #5a4b3e;
            margin-bottom: 11px;
            box-sizing: border-box;
        }
        .review-form-wrap textarea { min-height: 56px; resize: vertical; }
        .review-form-wrap button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #b9a89c;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 4px;
            transition: background 0.2s;
            cursor: pointer;
        }
        .review-form-wrap button:hover { background: #a08c7c; }
        .success-msg, .error-msg {
            margin-bottom: 10px;
            border-radius: 8px;
            padding: 8px 0;
            font-weight: 500;
            text-align: center;
        }
        .success-msg { color: #2b8c2b; background: #eafbe7; }
        .error-msg { color: #c55; background: #fbe7e7; }
        @media (max-width: 900px) {
            .reviews-slider { flex-direction: column; gap: 18px; align-items: center; }
            .review-card { min-width: 0; max-width: 98vw; }
        }
    </style>
    <script>
        // Простий слайдер для відгуків (по 3 на сторінку)
        document.addEventListener("DOMContentLoaded", function() {
            const cards = Array.from(document.querySelectorAll('.review-card'));
            const dots = Array.from(document.querySelectorAll('.slider-dot'));
            let page = 0, perPage = 3, total = Math.ceil(cards.length / perPage);

            function showPage(p) {
                page = p;
                cards.forEach((c, i) => c.style.display = (i >= p*perPage && i < (p+1)*perPage) ? "" : "none");
                dots.forEach((d, i) => d.classList.toggle("active", i === p));
            }
            document.querySelectorAll('.slider-arrow.left').forEach(el => el.onclick = () => showPage((page-1+total)%total));
            document.querySelectorAll('.slider-arrow.right').forEach(el => el.onclick = () => showPage((page+1)%total));
            dots.forEach((d, i) => d.onclick = () => showPage(i));
            showPage(0);
        });
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div style="max-width:1100px; margin: 48px auto 0 auto;">
        <div class="reviews-title">Відгуки</div>
        <div class="slider-controls">
            <span class="slider-arrow left">&#8592;</span>
            <?php
            $pages = ceil(count($reviews)/3);
            for ($i=0; $i<$pages; $i++) {
                echo '<span class="slider-dot'.($i==0?' active':'').'"></span>';
            }
            ?>
            <span class="slider-arrow right">&#8594;</span>
        </div>
        <div class="reviews-slider">
            <?php foreach ($reviews as $r): ?>
                <div class="review-card">
                    <img src="<?= htmlspecialchars($r['photo']) ?>" alt="<?= htmlspecialchars($r['name']) ?>" class="review-photo">
                    <div class="review-name"><?= htmlspecialchars($r['name']) ?></div>
                    <div class="review-stars"><?= str_repeat('★', $r['stars']) . str_repeat('☆', 5-$r['stars']) ?></div>
                    <div class="review-text"><?= htmlspecialchars($r['text']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="review-form-wrap">
        <h3>Залишити відгук</h3>
        <?php if ($success): ?><div class="success-msg"><?= $success ?></div><?php endif; ?>
        <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Ваше ім'я, місто" required>
            <textarea name="text" placeholder="Ваш відгук..." required></textarea>
            <select name="stars" required>
                <option value="">Оцініть</option>
                <option value="5">5 ★</option>
                <option value="4">4 ★</option>
                <option value="3">3 ★</option>
                <option value="2">2 ★</option>
                <option value="1">1 ★</option>
            </select>
            <button type="submit">Відправити</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
