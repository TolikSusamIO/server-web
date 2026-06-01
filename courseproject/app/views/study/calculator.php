<h2>Калькулятор времени на учебу</h2>

<form action="<?= $baseUrl ?>/study/calculator" method="post">
    <div>
        <label>Количество дней</label><br>
        <input type="number" name="days" min="1" max="30"
               value="<?= htmlspecialchars($days ?? 7) ?>">
    </div>

    <?php if (!empty($days)): ?>
        <h3>Время по дням (в минутах)</h3>
        <?php for ($i = 0; $i < $days; $i++): ?>
            <div>
                День <?= $i + 1 ?>:
                <input type="number" name="minutes[]" min="0"
                       value="<?= htmlspecialchars($details[$i] ?? 0) ?>">
            </div>
        <?php endfor; ?>
    <?php endif; ?>

    <button type="submit">Посчитать</button>
</form>

<?php if (isset($totalMinutes)): ?>
    <h3>Результат</h3>
    <p>Всего минут: <?= (int)$totalMinutes ?></p>
    <p>Это примерно: <?= (int)$hours ?> ч <?= (int)$restMinutes ?> мин</p>
<?php endif; ?>
