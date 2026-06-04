<?php

use App\Controllers\UsersController;

include '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'show':

        UsersController\showAction($conn, $_GET['id']);
        break;

    default:
        UsersController\indexAction($conn);
        break;

endswitch;
