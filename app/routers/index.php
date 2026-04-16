<?php




/**
 * 1  route par defaut
 * 
 * PATTERN: /
 * CTRL:PagesController
 * ACTION: home
 * VIEW: pages/home
 */

    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($conn);