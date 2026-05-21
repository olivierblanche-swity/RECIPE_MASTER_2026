<?php

namespace App\Models\IngredientsModel;

use \PDO;

function findAll(PDO $conn): array
{
    /* requete SQL */
    $sql = "SELECT * , id AS ingredientID
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $conn->query($sql);
    $ingredients = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $ingredients;
}

function findOneByID(PDO $conn, int $id) :array
{
    $sql = "SELECT * , id AS ingredientID , name AS name
            FROM ingredients
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $ingredient = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $ingredient;
}

function findAllById(PDO $conn, int $id): array
{
    $sql = "SELECT  r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value),1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count, i.name AS ingredient_name
            FROM recipes r
            JOIN users u ON r.user_id = u.id
            LEFT JOIN ratings rt ON r.id = rt.recipe_id
            LEFT JOIN comments c ON r.id = c.recipe_id
            INNER JOIN recipes_has_ingredients ri ON ri.recipe_id = r.id 
            join ingredients i ON i.id = ri.ingredient_id
            WHERE ri.ingredient_id = :id
            GROUP BY r.id
            ORDER BY r.name;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipes;
}

function findIngredientsByRecipeId(PDO $conn, int $id): array
{
    include_once '../app/models/ingredientsModel.php';
    $sql = "SELECT i.name AS ingredient_name,i.unit, ri.quantity
            FROM recipes_has_ingredients ri
            JOIN ingredients i ON ri.ingredient_id = i.id
            WHERE ri.recipe_id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $ingredients = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $ingredients;
}