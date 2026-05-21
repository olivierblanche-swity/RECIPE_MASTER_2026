<!-- User Main Content -->
<!-- Main content -->
 <?php /** @var array $recipes */ ?>
<div class=" p-3">
    <!-- Hero User Profile -->

    <?php include '../app/views/users/_index.php'; ?>
    <!-- User's Recipes -->
    <section>
        <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Recipe Card -->
            <?php foreach ($recipes as $recipe) : ?>
                <?php include '../app/views/recipes/_card.php'; ?>
            <?php endforeach; ?>
            <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
        </div>
    </section>
</div>