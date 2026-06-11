<?php

use App\Controllers\RecipesController;

include '../app/controllers/recipesController.php';

$limit = 6;
$currentPage = isset($_GET['p']) ? (int) $_GET['p'] : 1;
if ($currentPage < 1) {
    $currentPage = 1;
}

switch ($_GET['recipes']):

    case 'search':

        RecipesController\searchAction($conn, $_GET['query']);
        break;

    case 'user_id':

        RecipesController\indexByUserAction($conn, $_GET['user_id']);
        break;

    case 'show':

        RecipesController\showAction($conn, $_GET['id']);
        break;

    default:

        RecipesController\indexAction($conn, $limit, $currentPage);

        break;

endswitch;
