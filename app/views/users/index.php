<?php /** @var array $users */ ?>
<div class=" p-3">

    <?php foreach ($users as $user): ?>
        <?php include '../app/views/users/_index.php'; ?>
    <?php endforeach; ?>

</div>