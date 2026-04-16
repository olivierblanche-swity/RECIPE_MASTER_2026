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
        <?php foreach ($recipes as $recipe) : ?>
            <article
                class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <!-- Recipe Card -->

                <?php include '../app/views/recipes/_card.php'; ?>

            </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- User Profile Section -->
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <!-- User Info -->
    <div class="flex items-center mb-6">
        <!-- User Avatar -->
        <img
            src="https://source.unsplash.com/300x300/?portrait"
            alt="<?php echo $userInfo['name']; ?>"
            class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

        <!-- User Details -->
        <div>
            <h3 class="text-2xl font-bold"><?php echo $userInfo['name']; ?></h3>
            <p class="text-gray-400">Membre depuis: <?php echo $userInfo['created_at']; ?></p>
            <p class="text-gray-400">Nombre de recettes postées: <?php echo $userInfo['count']; ?></p>
        </div>
    </div>

    <!-- User Actions -->
    <div class="flex justify-between items-center mb-4">
        <a
            href="?results=user_recipes&id=<?php echo $userInfo['user_id']; ?>"
            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
    </div>

    <!-- User's Latest Recipes -->
    <div>
        <h4
            class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
            Les recettes de <?php echo $userInfo['name']; ?>
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Recipe Card (Repeat for each recipe) -->
            <?php foreach ($userRecipes as $recipe) : ?>
                <article
                    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                    <img
                        src="<?php echo $recipe['recipe_picture']; ?>"
                        alt="<?php echo $recipe['recipe_name']; ?>"
                        class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <h5 class="text-lg font-bold mb-2"><?php echo $recipe['recipe_name']; ?></h5>
                        <div class="flex items-center mb-2">
                            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                            <span><?php echo $recipe['avg_rating']; ?></span>
                        </div>
                        <p class="text-gray-500">
                            <?php echo \Core\Helpers\truncate($recipe['description'], 100); ?>
                        </p>
                        <a
                            href="?recipe=show&id=<?php echo $recipe['recipe_id']; ?>"
                            class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Voir la recette</a>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>
    </div>
</section>