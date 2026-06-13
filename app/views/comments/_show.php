 <?php /** @var array $comments */ ?>

 <div class="p-4 border-t">
   <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
   <!-- Comment -->
   <?php foreach ($comments as $comment): ?>
     <div class="mb-4">
       <div class="flex items-center mb-2">

         <img
           src="../documents/pictures/<?php echo htmlspecialchars($comment['user_picture']); ?>"
           alt="Nom de l'utilisateur"
           class="w-10 h-10 rounded-full mr-2" />
         <span class="font-bold"><?php echo htmlspecialchars($comment['user_name']); ?></span>
       </div>
       <p class="text-gray-700">
         <?php echo htmlspecialchars($comment['comment_content']); ?>
       </p>
     </div>
   <?php endforeach; ?>
   <!-- ... (autres commentaires) ... -->
 </div>