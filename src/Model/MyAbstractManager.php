<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */

namespace App\Model;

use App\Model\Connection;
use PDO;

/**
 * New Abstract class handling default manager.
 */
abstract class MyAbstractManager extends AbstractManager
{
    /**
     * Get all row from database.
     */
    public function selectAll(string $orderBy = '', string $direction = 'ASC', string $limit = ''): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy && !$limit) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        } elseif ($orderBy && $limit) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT ' . $limit;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
