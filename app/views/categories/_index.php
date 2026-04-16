<h2 class="font-bold text-lg mb-4">Catégories</h2>
<ul class="list-reset text-gray-100">

    <?php
    // Charger les catégories pour l'affichage dans l'aside
    include_once '../app/models/categoriesModel.php';
    global $conn;
    $categories = \App\Models\CategoriesModel\findAll($conn);

    foreach ($categories as $category) : ?>
        <li>
            <a
                class="hover:text-white hover:bg-yellow-600 px-2 block"
                href="?categories=show&id=<?php echo $category['categoryID']; ?>"><?php echo $category['name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>