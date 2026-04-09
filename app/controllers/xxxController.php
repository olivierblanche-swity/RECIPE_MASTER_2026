<?php

function indexAction(PDO $connexion)
{

/*  on va cherhcer  la fonction dans le dossier models */


    include_once '../app/models/xxxModel.php';
    $monsters = findAll($connexion);
 /* on lance le tampon et on inclu la vue dedans  */
    global $content;
    ob_start();
    include '../app/views/xxx/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connexion,  /* int */ string $id)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/xxxModel.php';
    $monster = findOneByID($connexion, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content;
    ob_start();
    include '../app/views/xxx/show.php';
    $content = ob_get_clean();
}