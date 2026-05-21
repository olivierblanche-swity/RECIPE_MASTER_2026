<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, 
                u.name AS user_name, 
                ROUND(AVG(rt.value),1) AS average_rating, 
                COUNT(DISTINCT c.id) AS comment_count
            FROM recipes r
            JOIN users u ON r.user_id = u.id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            LEFT JOIN comments c ON r.id = c.recipe_id
            GROUP BY r.id
            ORDER BY RAND()
            LIMIT 1";
    $rs = $conn->query($sql);
    $randRecipes = $rs->fetch(PDO::FETCH_ASSOC);
    return $randRecipes;
}

function findAllPopulars(PDO $conn): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, 
                u.name AS user_name, 
                ROUND(AVG(rt.value), 1) AS average_rating, 
                COUNT(c.id) AS comment_count
            FROM recipes r
            JOIN users u ON r.user_id = u.id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            LEFT JOIN comments c ON r.id = c.recipe_id
            GROUP BY r.id
            ORDER BY average_rating DESC
            LIMIT 3";
    $rs = $conn->query($sql);
    $popularsRecipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $popularsRecipes;
}


function findAll(PDO $conn): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value), 1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
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
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value),1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             WHERE r.user_id = :user_id
             GROUP BY r.id
             ORDER BY r.created_at DESC
             LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':user_id', $id, PDO::PARAM_INT);
    $rs->execute();
    $userRecipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $userRecipes;
}
function findAllRecipesByUserId(PDO $conn, int $id): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value),1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
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

function findOneById(PDO $conn, int $id): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name,u.picture AS user_picture, ROUND(AVG(rt.value), 1) AS average_rating, r.prep_time AS preparation_time, r.portions
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             WHERE r.id = :id
             GROUP BY r.id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipe = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipe;
}
