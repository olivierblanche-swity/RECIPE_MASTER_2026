<?php
/*  route 2  si on a clique sur un monstre

  on inclu le controleur 
  et on appele la fonction showAction() en lui donnant le GET_*/
if (isset($_GET['xxxID'])) :
    include_once '../app/controllers/xxxController.php';

    // s'assurer que l'id est un entier et que la connexion existe
    showAction($connexion, $_GET['xxxID']);
else :

    /*  route 1  si on a clique sur rien et qu on arrive sur la page d accueil

    on inclu le controler 
    et on appele la fonction indexAction()*/

    include_once '../app/controllers/xxxController.php';
    indexAction($connexion);
endif;
