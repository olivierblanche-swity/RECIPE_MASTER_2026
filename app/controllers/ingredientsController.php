<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;
use \PDO;

function showAction(PDO $conn, int $id)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/ingredientsModel.php';
    $ingredient = IngredientsModel\findOneByID($conn, $id);
    $recipes = IngredientsModel\findAllById($conn, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes de l'ingrédient : " . ($ingredient['name'] ?? '');
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
