<?php

declare(strict_types=1);

namespace App\Model;

class TricksManager extends MyAbstractManager
{
    public const TABLE = 'tricks';

    public function insert(array $tricks): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
         " (`title`, `content`) VALUES (:title, :content)");
        $statement->bindValue(':title', $tricks['title'], \PDO::PARAM_STR);
        $statement->bindValue(':content', $tricks['content'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function insertCategory(array $category): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $category['name'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $tricks): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $tricks['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $tricks['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
