<article>
    <h2><?= htmlspecialchars($article['title']) ?></h2>
    <p><small>Создано: <?= htmlspecialchars($article['created_at']) ?></small></p>
    <div class="content">
        <pre><?= htmlspecialchars($article['content']) ?></pre>
    </div>

    <?php if (!empty($article['file_path'])): ?>
        <p>
            Прикреплённый файл:
            <a href="<?= $baseUrl . $article['file_path'] ?>" target="_blank">Скачать</a>
        </p>
    <?php endif; ?>

    <p><a href="<?= $baseUrl ?>/articles">← Назад к списку</a></p>
</article>
