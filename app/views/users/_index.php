<?php /** @var array $user */ ?>
  
  <section class="relative mb-6">
    
      <img
        class="w-full h-96 object-cover"
        src="./pictures/<?php echo htmlspecialchars($user['picture']); ?>"
        alt="<?php echo htmlspecialchars($user['name']); ?>" />
      <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
          <?php echo htmlspecialchars($user['name']); ?>
        </h1>
        <p class="text-gray-300 mb-4">
          <?php echo htmlspecialchars($user['biography']); ?>
        </p>
      </div>
   
  </section>

