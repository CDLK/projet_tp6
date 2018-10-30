<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/offre.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <form action="../controleur/recherche.ctrl.php?firstId=<?php echo $firstId ?>&c=<?php echo $cate ?>&r=<?php echo $reg?>" method="post">
        <input type="submit" value="retour">
      </form>
      <div class="Offre">
        <img src="<?php echo $config['img_path']."/".$offre->__get('photo') ?>" alt="">
        <h3><?php echo $offre->__get('intitule') ?></h3>
        <p class="prix"><?php echo $offre->__get('prix') ?>€</p>
        <p><?php echo $offre->__get('caracteristique') ?></p>
      </div>
      <div class="Vendeur">
        <h3>Vendeur :</h3>
        <h4><?php print($vendeur->__get('prenomUser')." ".$vendeur->__get('nomUser'));?></h4>
        <h5>Contacte :</h5>
        <ul>
          <li><p>Téléphone : <?php echo $vendeur->__get('telephone') ?></p></li>
          <li><p>Mail : <?php echo $vendeur->__get('mail') ?></p></li>
        </ul>
      </div>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
