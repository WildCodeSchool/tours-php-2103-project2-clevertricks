<?php

namespace App\Model;

class TricksManager extends AbstractManager
{
    public const TABLE = 'tricks';

    /**
     * Insert new item in database
     */
    public function insert(array $tricks): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $tricks['title'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $tricks): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $tricks['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $tricks['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
