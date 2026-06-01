CREATE DATABASE blog CHARACTER SET utf8 COLLATE utf8_general_ci;

USE blog;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(128) NOT NULL
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    text TEXT NOT NULL
);

INSERT INTO users(nickname)
VALUES ('admin');

INSERT INTO articles(author_id, name, text)
VALUES
(1, 'Первая статья', 'Текст первой статьи'),
(1, 'Вторая статья', 'Текст второй статьи');
