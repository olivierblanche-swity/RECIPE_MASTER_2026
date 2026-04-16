<?php

namespace App\Models\IngredientsModel;

use \PDO;

function findAll(PDO $connexion): array
{
    /* requete SQL */
    $sql = "SELECT * , id AS ingredientID
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    $ingredients = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $ingredients;
}

function findOneByID(PDO $connexion, int $id) :array
{
    $sql = "SELECT * , id AS ingredientID , name AS name
            FROM ingredients
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $ingredient = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $ingredient;
}