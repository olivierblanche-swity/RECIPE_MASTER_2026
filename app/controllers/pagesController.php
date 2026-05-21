<?php

namespace App\Controllers\PagesController;

use App\Models\RecipesModel;
use App\Models\UsersModel;

use \PDO;

function homeAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/usersModel.php';
    
    $randRecipes = RecipesModel\findOneByRand($conn);
    $popularsRecipes = RecipesModel\findAllPopulars($conn);
    $randomUser = UsersModel\findOneByRand($conn);
    $userRecipes = RecipesModel\findAllByUserId($conn,$randomUser[0]['user_id']);

    global $content, $title;
    $title = "Homepage";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}






