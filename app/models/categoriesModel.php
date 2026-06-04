<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion): array
{
    /* requete SQL */
    $sql = "SELECT * , id AS categoryID
            FROM types_of_recipes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    $categories = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $categories;
}

function findOneByID(PDO $connexion, int $id): array
{
    $sql = "SELECT * , id AS categoryID , name AS name
            FROM types_of_recipes
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $category = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $category;
}

function findAllById(PDO $connexion, int $id): array
{
    $sql = "SELECT  r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(DISTINCT rt.value),1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count, tor.name AS category_name
            FROM recipes r
            JOIN users u ON r.user_id = u.id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            LEFT JOIN comments c ON r.id = c.recipe_id
            INNER JOIN types_of_recipes tor ON tor.id = r.type_id 
            WHERE tor.id = :id
            GROUP BY r.id
            ORDER BY r.name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipes;
}
