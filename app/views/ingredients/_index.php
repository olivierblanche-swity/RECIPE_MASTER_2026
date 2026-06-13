<h2 class="font-bold text-lg mb-4">Ingrédients</h2>
<ul class="list-reset text-gray-200">
    <?php
    // Charger les ingrédients pour l'affichage dans l'aside
    include_once '../app/models/ingredientsModel.php';
    global $conn;
    $ingredients = \App\Models\IngredientsModel\findAll($conn);

    foreach ($ingredients as $ingredient) : ?>
        <li>
            <a
                class="hover:text-white hover:bg-yellow-700 px-2 block"
                href="?ingredients=show&id=<?php echo htmlspecialchars($ingredient['ingredientID']); ?>"><?php echo htmlspecialchars($ingredient['name']); ?>
                ( <?php echo htmlspecialchars($ingredient['count_recipes']); ?> )</a>
        </li>
    <?php endforeach; ?>
</ul>