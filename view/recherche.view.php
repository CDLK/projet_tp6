<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('header.view.php'); ?>
    <nav>
      <?php foreach ($offres as $offre) { // Affichage de chaque offre dans la recherche?>
        <a href="#">
        <div class="Offre">
          <img src="<?php echo ?>" alt="">
          <div >
            <h4><?=echo $offre->intitule?></h4>
            <p><?=echo $offre->description?></p>
          </div>
        </div>
        </a>
      <?php  }?>
    </nav>
    <a href=""></a>
    <a href=""></a>
    <?php include('footer.view.php'); ?>
  </body>
</html>
