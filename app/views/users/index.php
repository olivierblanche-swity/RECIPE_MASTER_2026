<?php

/** @var array $users */ ?>


    <?php foreach ($users as $user): ?>

        <section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 mb-6">
            <!-- user Info -->
            <div class="flex items-center mb-6">
                <!-- user Avatar -->
                <img
                    src="./pictures/<?php echo $user['user_picture']; ?>"
                    alt="<?php echo $user['user_name']; ?>"
                    class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

                <!-- user Details -->
                <div>
                    <h3 class="text-2xl font-bold"><?php echo $user['user_name']; ?></h3>
                    <p class="text-gray-400">Membre depuis: <?php echo $user['created_at']; ?></p>
                    <p class="text-gray-400">Nombre de recettes postées: <?php echo $user['recipe_count']; ?></p>
                </div>
            </div>
            <div class="flex justify-between items-center mb-4">
                <a
                    href="?users=show&id=<?php echo $user['user_id']; ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
            </div>

            <!-- user Actions -->
            <div>
                <h4
                    class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
                    Mes dernières recettes
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Recipe Card (Repeat for each recipe) -->
                    <?php
                    include_once '../app/models/RecipesModel.php';
                    global $conn;
                    $userRecipes = \App\Models\recipesModel\findAllByUserId($conn, $user['user_id']);
                    foreach ($userRecipes as $recipe) :

                        include '../app/views/recipes/_userRecipesCard.php';

                    endforeach;
                    ?>

                </div>
            </div>

        </section>
    <?php endforeach; ?>

