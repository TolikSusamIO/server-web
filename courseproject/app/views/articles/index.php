<section>
    <h2>Статьи</h2>

    <form method="get" action="<?= $baseUrl ?>/articles/search">
        <input type="text" name="q" placeholder="Поиск по статьям"
               value="<?= htmlspecialchars($search_query ?? '') ?>">
        <button type="submit">Искать</button>
    </form>

    <div class="stats">
        <p>Всего статей: <?= (int)($stats['total'] ?? 0) ?></p>
        <p>Средняя длина статьи (символов): <?= (int)($stats['avg_length'] ?? 0) ?></p>
    </div>

    <?php if (!empty($articles)): ?>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <a href="<?= $baseUrl ?>/articles/show?id=<?= $article['id'] ?>">
                        <?= htmlspecialchars($article['title']) ?>
                    </a>
                    <small>(<?= htmlspecialchars($article['created_at']) ?>)</small>
                    <?php if (!empty($_SESSION['user'])): ?>
                        | <a href="<?= $baseUrl ?>/articles/edit?id=<?= $article['id'] ?>">Редактировать</a>
                        <form action="<?= $baseUrl ?>/articles/delete" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit" onclick="return confirm('Удалить статью?')">Удалить</button>
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Статей пока нет.</p>
    <?php endif; ?>
</section>
