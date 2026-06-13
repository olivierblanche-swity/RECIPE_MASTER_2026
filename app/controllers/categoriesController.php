<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;
use \PDO;

function showAction(PDO $conn, int $id)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/categoriesModel.php';
    $category = CategoriesModel\findOneByID($conn, $id);
    $recipes = CategoriesModel\findAllById($conn, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes de la catégorie : " . ($category['name'] ?? '');
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
