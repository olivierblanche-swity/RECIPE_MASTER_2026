<?php

use App\Controllers\IngredientsController;

include '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):

    case 'show':

        IngredientsController\showAction($conn, $_GET['id']);
        break;

    default:
        \App\Controllers\PagesController\homeAction($conn);
        break;
endswitch;
