<?php /** @var array $ingredients */ ?>

<div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
    <ul class="list-disc pl-5">
        <?php foreach ($ingredients as $ingredient): ?>
            <li><?php echo $ingredient['quantity'] . ' ' . $ingredient['unit'] . ' de ' . $ingredient['ingredient_name']; ?></li>
        <?php endforeach; ?>
        <!-- ... (autres ingrédients) ... -->
    </ul>
</div>