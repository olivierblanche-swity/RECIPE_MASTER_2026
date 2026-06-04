<?php

use App\Controllers\CategoriesController;

include '../app/controllers/categoriesController.php';

switch ($_GET['categories']):

        case 'show':

                CategoriesController\showAction($conn, $_GET['id']);
                break;

        default:
                \App\Controllers\PagesController\homeAction($conn);
                break;
endswitch;
