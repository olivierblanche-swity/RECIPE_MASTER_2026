<?php

use App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):

    case 'user_id':
        RecipesController\indexByUserAction($conn, $_GET['user_id']);
        break;

    case 'show':

        /*RecipesController\showAction($conn, $_GET['id']);
        break;*/

    default:
        RecipesController\indexAction($conn);
        break;

endswitch;
