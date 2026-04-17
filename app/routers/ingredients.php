<?php

use App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']) :

     case 'show':
       
        IngredientsController\showAction($conn, $_GET['id']);
        break;

    default:
       
        break;  
endswitch;