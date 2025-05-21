<?php
// FAQ питання і відповіді (можна зробити масивом або з БД)
$faqs = [
    [
        'q' => 'Як забронювати та оплатити тур?',
        'a' => 'Оберіть маршрут, натисніть "Забронювати", заповніть форму та оплатіть онлайн.'
    ],
    [
        'q' => 'Що робити в разі поганої погоди?',
        'a' => 'Гід повідомить про можливі зміни маршруту або перенесення походу.'
    ],
    [
        'q' => 'Що входить у вартість?',
        'a' => 'У вартість входить супровід гіда, організаційні послуги, страховка.'
    ],
    [
        'q' => 'Я не маю досвіду походів у гори, чи можу я взяти участь?',
        'a' => 'Так, є маршрути для новачків. Гід допоможе підготуватися.'
    ],
    [
        'q' => 'Де можна переглянути детальний опис маршруту?',
        'a' => 'На сторінці "Маршрути" натисніть "Детальніше" біля обраного походу.'
    ],
    [
        'q' => 'Чи потрібно одразу оплачувати всю суму?',
        'a' => 'Можлива передплата або повна оплата, залежно від маршруту.'
    ],
    [
        'q' => 'Що потрібно взяти із собою?',
        'a' => 'Список спорядження надсилається після бронювання.'
    ],
    [
        'q' => 'Як скасувати бронювання?',
        'a' => 'Зв’яжіться з адміністратором через профіль або email.'
    ],
];

// Обробка форми питання
$success = $error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $question = trim($_POST["question"] ?? "");
    if (!$name || !$email || !$question) {
        $error = "Заповніть усі поля!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Введіть коректний email!";
    } else {
        // Тут можна зберегти питання у БД або надіслати адміністратору
        $success = "Дякуємо! Ваше питання надіслано.";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>FAQ — KarpatyGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.faq-q').forEach(function(q) {
                q.addEventListener('click', function() {
                    var item = this.closest('.faq-item');
                    item.classList.toggle('open');
                });
            });
        });
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="faq-wrap">
        <div class="faq-form-block">
            <h3>Задайте своє питання</h3>
            <?php if ($success): ?><div class="success-msg"><?= $success ?></div><?php endif; ?>
            <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
            <form method="post">
                <input type="text" name="name" placeholder="Ім'я" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="question" placeholder="Питання" required></textarea>
                <button type="submit">Задати питання</button>
            </form>
        </div>
        <div class="faq-list-block">
            <h2>F A Q</h2>
            <div class="faq-list">
                <?php foreach ($faqs as $i => $faq): ?>
                <div class="faq-item<?= $i === 0 ? ' open' : '' ?>">
                    <div class="faq-q">
                        <?= htmlspecialchars($faq['q']) ?>
                        <span class="arrow">&#10095;</span>
                    </div>
                    <div class="faq-a"><?= htmlspecialchars($faq['a']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        // FAQ розкриття (щоб працювало після завантаження)
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.faq-q').forEach(function(q) {
                q.addEventListener('click', function() {
                    var item = this.closest('.faq-item');
                    item.classList.toggle('open');
                });
            });
        });
    </script>
</body>
</html>
