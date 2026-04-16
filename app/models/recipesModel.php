<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $connexion, string $order = 'RAND()', int $limit = 1): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "CALL FindRecipesByOrderLimit(:order, :limit);";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':order', $order, PDO::PARAM_STR);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);

    $rs->execute();
    $randRecipes = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $randRecipes;
}

function findBestByOrderLimit(PDO $connexion, string $order = 'ROUND(AVG(rt.value)) DESC', int $limit = 3): array
{
    /* requete SQL - Appel de la stored procedure */
    $sql = "CALL FindRecipesByOrderLimit(:order, :limit);";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':order', $order, PDO::PARAM_STR);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);

    $rs->execute();
    $bestRecipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $bestRecipes;
}
