<?php

namespace App\Models\UsersModel;

use \PDO;

function findByRandUserId(PDO $conn, int $limit = 3): array
{

    $sql = "SELECT u.id as user_id, u.name as user_name, u.picture as user_picture, u.created_at, r.id as recipe_id, r.name as recipe_name, r.picture as recipe_picture, r.description, ROUND(AVG(rt.value)) as avg_rating
            FROM users u 
            LEFT JOIN recipes r ON u.id = r.user_id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            WHERE u.id = (SELECT id FROM users ORDER BY RAND() LIMIT 1)
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

function countRecipesByUserId(PDO $conn, int $user_id): int
{
    $sql = "SELECT COUNT(*) as count FROM recipes WHERE user_id = :user_id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return (int)$result['count'];
}

function findAll(PDO $conn): array
{
    $sql = "SELECT * FROM users";
    $rs = $conn->query($sql);
    $users = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $users;
}
