<?php

/** @var array $userRecipes */

$userRecipes = $userRecipes ?? ($user['recipes'] ?? []);
?>

<div>
    <h4
        class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
        Mes dernières recettes
    </h4>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card (Repeat for each recipe) -->
        <?php foreach ($userRecipes as $recipe) : ?>

            <?php include '../app/views/recipes/_userRecipesCard.php'; ?>

        <?php endforeach; ?>

    </div>
</div>