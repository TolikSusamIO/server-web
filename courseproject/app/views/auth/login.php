<h2>Вход администратора</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="<?= $baseUrl ?>/login" method="post">
    <div>
        <label>Логин</label><br>
        <input type="text" name="username" required>
    </div>
    <div>
        <label>Пароль</label><br>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Войти</button>
</form>
