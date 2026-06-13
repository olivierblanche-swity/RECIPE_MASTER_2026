<?php /** @var array $recipe */ ?>

<article class="bg-white rounded-lg overflow-hidden shadow-lg relative">
    <!-- Recipe Card -->
    <img
        class="w-full h-48 object-cover"
        src="<?php echo htmlspecialchars($recipe['recipe_picture']); ?>"
        alt="<?php echo htmlspecialchars($recipe['recipe_name']); ?>" />
    <div class="p-4">
        <h3 class="text-xl font-bold mb-2 text-gray-900"><?php echo htmlspecialchars($recipe['recipe_name']); ?></h3>
        <div class="flex items-center mb-2">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-gray-800"><?php echo htmlspecialchars($recipe['average_rating']); ?></span>
        </div>
        <p class="text-gray-600"><?php echo \Core\Helpers\truncate(htmlspecialchars($recipe['description']), 100); ?></p>
        <div class="flex items-center mt-4">
            <span class="text-gray-700 mr-2">Par <?php echo htmlspecialchars($recipe['user_name']); ?></span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo htmlspecialchars($recipe['comment_count']); ?> commentaires</span>
        </div>
        <a
            href="?recipes=show&id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>"
            class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
            Voir la recette
        </a>
        


    </div>
</article>
