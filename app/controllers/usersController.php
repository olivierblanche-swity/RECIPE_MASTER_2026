<?php

namespace App\Controllers\UsersController;

use App\Models\RecipesModel;
use App\Models\UsersModel;

use PDO;

function indexAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */

    include_once '../app/models/usersModel.php';
    include_once '../app/models/recipesModel.php';

    $users = UsersModel\findAll($conn);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Chefs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneById($conn, $id);
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAllRecipesByUserId($conn, $id);

    global $content, $title;
    $title = "Profil de " . $user['name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}
