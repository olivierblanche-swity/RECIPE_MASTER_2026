
<?php /** @var array $randomUser */ ?>
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <!-- randomUser Info -->
    <div class="flex items-center mb-6">
        <!-- randomUser Avatar -->
        <img
            src="./pictures/<?php echo $randomUser[0]['user_picture']; ?>"
            alt="<?php echo $randomUser[0]['user_name']; ?>"
            class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

        <!-- randomUser Details -->
        <div>
            <h3 class="text-2xl font-bold"><?php echo $randomUser[0]['user_name']; ?></h3>
            <p class="text-gray-400">Membre depuis: <?php echo $randomUser[0]['created_at']; ?></p>
            <p class="text-gray-400">Nombre de recettes postées: <?php echo $randomUser[0]['recipe_count']; ?></p>
        </div>
    </div>

    <!-- randomUser Actions -->
    <div class="flex justify-between items-center mb-4">
        <a
            href="?users=show&id=<?php echo $randomUser[0]['user_id']; ?>"
            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
    </div>

    <!-- randomUser's Latest Recipes -->
    <?php include '../app/views/recipes/_latestByUserId.php'; ?>
</section>