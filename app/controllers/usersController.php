<?php

namespace App\Controllers\UsersController;

use App\Models\UsersModel;

use PDO;

function indexAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($conn);
    

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Chefs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}