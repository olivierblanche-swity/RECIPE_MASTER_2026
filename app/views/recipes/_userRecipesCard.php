<?php /** @var array $recipe */ ?>

<article
                class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                <img
                    src="<?php echo htmlspecialchars($recipe['recipe_picture']); ?>"
                    alt="<?php echo htmlspecialchars($recipe['recipe_name']); ?>"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h5 class="text-lg font-bold mb-2"><?php echo htmlspecialchars($recipe['recipe_name']); ?></h5>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo htmlspecialchars($recipe['average_rating']); ?></span>
                    </div>
                    <p class="text-gray-500">
                        <?php echo \Core\Helpers\truncate(htmlspecialchars($recipe['description']), 100); ?>
                    </p>
                    <a
                        href="?recipes=show&id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>"
                        class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Voir la recette</a>
                </div>
            </article>