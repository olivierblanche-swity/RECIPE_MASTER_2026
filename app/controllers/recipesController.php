<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\IngredientsModel;
use \App\Models\CommentsModel;
use \PDO;

function indexAction(PDO $conn)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAll($conn);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function indexByUserAction(PDO $conn, int $id)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAllByUserId($conn, $id);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = "Les Recettes de " . $recipes[0]['user_name'];
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    /**  on va cherhcer  la fonction dans le dossier models 
     * vais chercher les infos de la rectte et son ratings 

     */
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($conn, $id);
    /* vais chercher les ingredients et leurs quantités */
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findIngredientsByRecipeId($conn, $id);
    /* vais chercher les commentaires de la recettes*/
    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findCommentsByRecipeId($conn, $id);


    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title;
    $title = $recipe['recipe_name'] . " (" . count($comments) . " commentaires)";

    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}
function searchAction(PDO $conn, string $query)
{
    /*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\searchByName($conn, $query);

    /* on lance le tampon et on inclu la vue dedans  */
    global $content, $title, $searchQuery;
    $title = "Résultats de recherche pour : " . $query;
    $searchQuery = $query;

    ob_start();
    include '../app/views/recipes/results.php';
    $content = ob_get_clean();
}