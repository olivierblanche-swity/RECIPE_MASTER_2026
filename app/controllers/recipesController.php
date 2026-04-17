<?php

namespace App\Controllers\RecipesController;

use App\Models\RecipesModel;
use PDO;

function indexAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAll($conn);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function indexByUserAction( PDO $conn, int $id) {
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAllByUserId($conn, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes de " . $recipes[0]['user_name'];
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}