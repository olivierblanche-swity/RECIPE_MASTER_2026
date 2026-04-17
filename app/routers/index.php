<?php


/**
 * 5 route des ingredients
 * PATTERN: /ingredients
 * CTRL:IngredientsController    
 * ACTION: index
 * VIEW: recipes/index
 */

if(isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';


/**
 * 4 route des categories
 * PATTERN: /categories
 * CTRL:CategoriesController    
 * ACTION: index
 * VIEW: recipes/index
 */

elseif (isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';


/**
 * 3 routes des users ( chefs )
 * PATTERN: /users
 * CTRL:UsersController     
 * ACTION: index
 * VIEW: users/index
 */

elseif (isset($_GET['users'])) :
    include_once '../app/routers/users.php';


/**
 * 2 route des recettes
 * 
 * PATTERN: /recipes
 * CTRL:RecipesController
 * ACTION: index
 * VIEW: recipes/index
 */

elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

else:
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

    endif;