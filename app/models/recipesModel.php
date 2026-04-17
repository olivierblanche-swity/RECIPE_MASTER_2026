<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn, string $order = 'RAND()', int $limit = 1): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value)) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             GROUP BY r.id
             ORDER BY :order
             LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':order', $order, PDO::PARAM_STR);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);

    $rs->execute();
    $randRecipes = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $randRecipes;
}

function findBestByOrderLimit(PDO $conn, string $order = 'ROUND(AVG(rt.value)) DESC', int $limit = 3): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value)) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             GROUP BY r.id
             ORDER BY :order
             LIMIT :limit;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':order', $order, PDO::PARAM_STR);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);

    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipes;
}


function findAll(PDO $conn): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value)) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             GROUP BY r.id
             ORDER BY r.created_at DESC;";
    $rs = $conn->query($sql);
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC); 
    $rs->closeCursor();
    unset($rs);     
    return $recipes;
           
    
    
}
function findAllByUserId(PDO $conn, int $id): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value)) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             WHERE r.user_id = :user_id
             GROUP BY r.id
             ORDER BY r.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':user_id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC); 
    $rs->closeCursor();
    unset($rs);     
    return $recipes;
           
    
    
}