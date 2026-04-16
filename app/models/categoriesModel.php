<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion): array
{
    /* requete SQL */
    $sql = "SELECT * , id AS categoryID
            FROM categories
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    $categories = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $categories;
}

function findOneByID(PDO $connexion, int $id) :array
{
    $sql = "SELECT * , id AS categoryID , name AS name
            FROM categories
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $category = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $category;
}
