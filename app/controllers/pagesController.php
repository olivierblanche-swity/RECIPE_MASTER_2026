<?php

namespace App\Controllers\PagesController;

use App\Models\RecipesModel;

use \PDO;

function homeAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $randRecipes = RecipesModel\findOneByRand($conn, 'RAND()', 1);
 /* on lance le tampon et on inclu la vue dedans  */


    
    global $content, $title;
    $title = "Homepage";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}





function showAction(PDO $connexion,  /* int */ string $id)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/pagesModel.php';
    $monster = findOneByID($connexion, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content;
    ob_start();
    include '../app/views/pages/show.php';
    $content = ob_get_clean();
}