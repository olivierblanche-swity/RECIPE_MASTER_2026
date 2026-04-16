<!-- Hero Recipe Card -->
<section class="relative mb-6">
    <img
        class="w-full h-96 object-cover"
        src="<?php echo $randRecipes['recipe_picture']; ?>"
        alt="<?php echo $randRecipes['recipe_name']; ?>" />
    <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo $randRecipes['recipe_name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white"><?php echo $randRecipes['average_rating']; ?></span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo \Core\Helpers\truncate($randRecipes['description'], 200); ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">Par <?php echo $randRecipes['user_name']; ?></span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $randRecipes['comment_count']; ?> commentaires</span>
        </div>
        <a
            href="?recipe=show&id=<?php echo $randRecipes['recipe_id']; ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
            Voir la recette
        </a>
    </div>
</section>

<!-- Best Recipes Section -->
<section>
    <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card -->
        <?php foreach ($bestRecipes as $recipe) : ?>
            <article
                class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <img
                    class="w-full h-48 object-cover"
                    src="<?php echo $recipe['recipe_picture']; ?>"
                    alt="<?php echo $recipe['recipe_name']; ?>" />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $recipe['recipe_name']; ?></h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo $recipe['average_rating']; ?></span>
                    </div>
                    <p class="text-gray-600"><?php echo \Core\Helpers\truncate($recipe['description'], 100); ?></p>
                    <div class="flex items-center mt-4">
                        <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_name']; ?></span>
                        <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $recipe['comment_count']; ?> commentaires</span>
                    </div>
                    <a
                        href="?recipe=show&id=<?php echo $recipe['recipe_id']; ?>"
                        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                        Voir la recette
                    </a>
                </div>
            </article>
        <?php endforeach; ?>

    </div>
</section>