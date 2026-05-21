<?php /** @var array $popularsRecipes */ ?>
<section>
    <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($popularsRecipes as $recipe) : ?>


            <?php include '../app/views/recipes/_card.php'; ?>


        <?php endforeach; ?>
    </div>
</section>