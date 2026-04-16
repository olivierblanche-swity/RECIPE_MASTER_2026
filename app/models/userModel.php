<?php

namespace App\Models\UsersModel;

use \PDO;

function findByRandUserId(PDO $conn, int $limit = 3): array
{

    $sql = "SELECT u.id as user_id, u.name as user_name, r.id as recipe_id, r.name as recipe_name, r.picture as recipe_picture, r.description, r.created_at, ROUND(AVG(rt.value)) as avg_rating
            FROM users u 
            JOIN (
                SELECT id 
                FROM users 
                ORDER BY RAND() 
                LIMIT 1) AS ru ON u.id = ru.id
            LEFT JOIN recipes r ON u.id = r.user_id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            WHERE r.id IS NOT NULL
            GROUP BY r.id
            ORDER BY r.created_at DESC
            LIMIT :limit";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    $userRecipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $userRecipes;
}
