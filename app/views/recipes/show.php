<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
          
          

          
          <?php include '../app/views/recipes/_show.php'; ?>

          <!-- Ingredients -->
          <?php include '../app/views/ingredients/_list.php'; ?>

          <!-- Steps -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Étapes</h2>
            <ol class="list-decimal pl-5">
              <li>Préchauffez le four à 180°C.</li>
              <li>Dans un saladier, mélangez la farine et le sucre.</li>
              <li>
                Ajoutez les œufs un à un en mélangeant bien entre chaque ajout.
              </li>
              <!-- ... (autres étapes) ... -->
            </ol>
          </div>

          <!-- Comments -->
            <?php include '../app/views/comments/_show.php'; ?>
         
        </section>