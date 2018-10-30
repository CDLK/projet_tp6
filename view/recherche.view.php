<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/recherche.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php  if (sizeof($offres)==0) {?>
        <p>Aucune offre ne correspond à votre recherche</p>
      <?php } ?>

      <?php foreach ($offres as $offre) { // Affichage de chaque offre dans la recherche?>
        <a href="../controleur/offre.ctrl.php?ref=<?php echo $offre->__get('ref')?>">
        <div class="Offre">
          <img src="<?php echo $config['img_path']."/".$offre->__get('photo') ?>" alt="">
          <div >
            <h4><?php echo $offre->__get('intitule')?></h4>
            <p class="prix"><?php echo $offre->__get('prix')?>€</p>
            <p><?php echo $offre->__get('region')?></p>
          </div>
        </div>
        </a>
      <?php  }?>
    </nav>
    <div class="">
      <a href=""><img src="" alt=""></a>
      <a href=""><img src="" alt=""></a>
    </div>
    <?php include('footer.view.php'); ?>
  </body>
</html>
