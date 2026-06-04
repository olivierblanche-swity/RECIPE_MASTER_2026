<?php

namespace App\Models\UsersModel;

use \PDO;

function findOneByRand(PDO $conn): array
{

    $sql = "SELECT u.id AS user_id, u.name AS user_name, u.picture AS user_picture, u.created_at,

    
                (SELECT COUNT(*) FROM recipes WHERE user_id = u.id) AS recipe_count,
                r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at,
                ROUND(AVG(rt.value), 1) AS average_rating,
                COUNT(c.id) AS comment_count

            FROM users u
            JOIN recipes r ON r.user_id = u.id
            LEFT JOIN ratings rt ON rt.recipe_id = r.id
            LEFT JOIN comments c ON c.recipe_id = r.id
            WHERE u.id = (SELECT id FROM users ORDER BY RAND() LIMIT 1)
            GROUP BY r.id
            ORDER BY r.created_at DESC";
    $rs = $conn->query($sql);
    $randomUser = $rs->fetchAll(PDO::FETCH_ASSOC);

    return $randomUser;
}

function countRecipesByUserId(PDO $conn, int $user_id): int
{
    $sql = "SELECT COUNT(*) as count 
            FROM recipes 
            WHERE user_id = :user_id";
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

function findOneById(PDO $conn, int $id): ?array
{
    $sql = "SELECT name AS name, picture AS picture, biography
            FROM users 
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $user = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $user ?: null;
}

function findRecipesByUserId(PDO $conn, int $id): array
{
    $sql = "SELECT r.id as recipe_id, r.name as recipe_name, r.picture as recipe_picture, r.description, ROUND(AVG(rt.value)) as avg_rating
            FROM recipes r
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            WHERE r.user_id = :id
            GROUP BY r.id
            ORDER BY r.created_at DESC";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipes;
}
