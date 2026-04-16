<?php

namespace App\Controllers\PagesController;

use App\Models\RecipesModel;
use App\Models\UsersModel;

use \PDO;

function homeAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/userModel.php';
    $randRecipes = RecipesModel\findOneByRand($conn, 'RAND()', 1);
    $recipes = RecipesModel\findBestByOrderLimit($conn, 'ROUND(AVG(rt.value)) DESC', 3);
    $userRecipesData = UsersModel\findByRandUserId($conn, 3);

    // Extraire les infos utilisateur une seule fois
    $userInfo = !empty($userRecipesData) ? [
        'user_id' => $userRecipesData[0]['user_id'],
        'name' => $userRecipesData[0]['user_name'],
        'created_at' => $userRecipesData[0]['created_at'],
        'count' => count($userRecipesData)
    ] : [];
    $userRecipes = $userRecipesData;
    

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
