<?php

use App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']) :
    
     case 'show':
       
        CategoriesController\showAction($conn, $_GET['id']);
        break;

    default:
        CategoriesController\indexAction($conn);
        break;  
endswitch;