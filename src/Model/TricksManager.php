<?php

declare(strict_types=1);

namespace App\Model;

class TricksManager extends MyAbstractManager
{
    public const TABLE = 'tricks';

    /**
     * Get all tricks from a category.
     */
    public function selectTricksByCategory(string $category):array
    {
        $query = 'SELECT title
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
