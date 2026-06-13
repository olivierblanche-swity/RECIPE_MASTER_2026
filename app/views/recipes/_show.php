<?php /** @var array $recipe
 * @var array $comments */ ?>

<!-- Recipe Image -->
<img
    class="w-full h-96 object-cover rounded-t-lg"
    src="<?php echo htmlspecialchars($recipe['recipe_picture']); ?>"
    alt="<?php echo htmlspecialchars($recipe['recipe_name']); ?>" />
<div class="p-4">
    <!-- Recipe Info -->
    <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($recipe['recipe_name']); ?></h1>
    <div class="flex items-center mb-4">
        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
        <span><?php echo htmlspecialchars($recipe['average_rating']); ?></span>
        <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($recipe['preparation_time']); ?></span>
    </div>
    <p class="text-gray-700 mb-4">
        <?php echo htmlspecialchars($recipe['description']); ?>
    </p>
    <div class="flex items-center mb-4">
        <span class="text-gray-700 mr-2">Par <?php echo htmlspecialchars($recipe['user_name']); ?></span>
        <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo count($comments); ?> commentaires</span>
    </div>
</div>