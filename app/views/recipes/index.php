<?php

/** @var array $recipes, $currentPage, $totalPages */

$currentPage = $currentPage ?? 1;
$totalPages = $totalPages ?? 1;
?>


<div class=" p-3">

  <!-- User's Recipes -->
  <section>
    <h2 class="text-2xl font-bold mb-4"><?php echo $title; ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <!-- Recipe Card -->
      <?php foreach ($recipes as $recipe) : ?>


        <?php include '../app/views/recipes/_card.php'; ?>

      <?php endforeach; ?>
      <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
    </div>
  </section>
  <!-- pagination -->
  <?php if ($totalPages > 1): ?>
    <nav class="pagination flex gap-4 text-center max-w-xl mx-auto  pt-8">
      <?php if ($currentPage > 1): ?>

        <a href="?recipes=index&p=<?= $currentPage - 1 ?>" class="bg-blue-100 px-4 py-2 rounded">Précédent</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?recipes=index&p=<?= $i ?>"
          class="underline  p-2  rounded-full <?= $i === $currentPage ? 'active' : '' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>

      <?php if ($currentPage < $totalPages): ?>
        <a href="?recipes=index&p=<?= $currentPage + 1 ?>" class="bg-blue-100 px-4 py-2 rounded">Suivant</a>
      <?php endif; ?>
    </nav>
  <?php endif; ?>
</div>