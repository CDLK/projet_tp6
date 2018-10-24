<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php foreach ($offre as $offres => $value) { // Affichage de chaque offre dans la recherche?>
      <div class="Offre">
        <img src="" alt="">
        <div >
          <h4><?=echo $offre->intitule?></h4>
          <p><?=echo $offre->description?></p>
        </div>
      </div>
    <?php  }?>
  </body>
</html>
