<?php

namespace App\models;

use App\core\Model;

class Article extends Model
{
    public function all(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $article = $stmt->fetch();
        return $article ?: null;
    }

    public function create(string $title, string $content, ?string $filePath): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO articles (title, content, file_path) VALUES (:t, :c, :f)'
        );
        $stmt->execute([
            't' => $title,
            'c' => $content,
            'f' => $filePath,
        ]);
    }

    public function update(int $id, string $title, string $content, ?string $filePath): void
    {
        if ($filePath !== null) {
            $stmt = $this->db->prepare(
                'UPDATE articles SET title = :t, content = :c, file_path = :f WHERE id = :id'
            );
            $stmt->execute([
                't' => $title,
                'c' => $content,
                'f' => $filePath,
                'id' => $id,
            ]);
        } else {
            $stmt = $this->db->prepare(
                'UPDATE articles SET title = :t, content = :c WHERE id = :id'
            );
            $stmt->execute([
                't' => $title,
                'c' => $content,
                'id' => $id,
            ]);
        }
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function search(string $query): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM articles WHERE title LIKE :q OR content LIKE :q ORDER BY created_at DESC'
        );
        $stmt->execute(['q' => '%' . $query . '%']);
        return $stmt->fetchAll();
    }

    public function stats(): array
    {
        $stmt = $this->db->query('SELECT COUNT(*) AS total, AVG(CHAR_LENGTH(content)) AS avg_length FROM articles');
        $row = $stmt->fetch();
        return [
            'total' => (int)($row['total'] ?? 0),
            'avg_length' => (int)($row['avg_length'] ?? 0),
        ];
    }
}
