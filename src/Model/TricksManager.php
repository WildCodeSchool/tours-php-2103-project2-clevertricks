<?php

declare(strict_types=1);

namespace App\Model;

class TricksManager extends MyAbstractManager
{
    public const TABLE = 'tricks';

    public function insert(array $tricks): int
    {
        // preparing insert one trick into tricks
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
         " (`title`, `content`) VALUES (:title, :content)");
        $statement->bindValue(':title', $tricks['title'], \PDO::PARAM_STR);
        $statement->bindValue(':content', $tricks['content'], \PDO::PARAM_STR);
        //inserting trick into tricks
        $statement->execute();
        //get the inserted tricks id
        $tricksId = (int)$this->pdo->lastInsertId();
        //adding categories to this trick
        $statement = $this->pdo->prepare("INSERT INTO tricks_category (`tricks_id`,`category_id`) 
        VALUES (:tricks_id, :category_id)");
        $statement->bindValue(':tricks_id', $tricksId, \PDO::PARAM_INT);
        foreach ($tricks['category_id'] as $categoryId) {
            $statement->bindValue(':category_id', $categoryId, \PDO::PARAM_INT);
            $statement->execute();
        }
        return $tricksId;
    }


    public function update(array $tricks): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $tricks['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $tricks['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
    public function selectJoin(string $orderBy = '', string $direction = 'ASC', string $limit = ''): array
    {
        $query = 'SELECT title, name FROM tricks_category tc JOIN tricks t ON t.id = tc.tricks_id 
        JOIN category c ON c.id = category_id';
        if ($orderBy && !$limit) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        } elseif ($orderBy && $limit) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT ' . $limit;
        }

        return $this->pdo->query($query)->fetchAll();
    }

     /**
     * Get all tricks from a category.
     */
    public function selectTricksByCategory(string $category): array
    {
        $query = 'SELECT *
        FROM tricks_category tc 
        JOIN tricks t ON t.id = tc.tricks_id 
        JOIN category c ON c.id = category_id 
        WHERE name = :category ORDER BY title ASC';

        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':category', $category, \PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetchAll();
    }
}
