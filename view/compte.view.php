<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/compte.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <form action="../controleur/mainPage.ctrl.php?" method="post">
        <input type="submit" value="retour">
      </form>
      <?php  if (!$userCo) {?>
        <p>Vous n'êtes pas connecté !</p>
      <?php } else {?>
      <div class="Compte">
        <h2>Votre compte :</h2>
        <h4><?php print($user->__get('prenomUser')." ".$user->__get('nomUser'));?></h4>
        <h5>Contacte :</h5>
        <ul>
          <li><p>Téléphone : <?php echo $user->__get('telephone') ?></p></li>
          <li><p>Mail : <?php echo $user->__get('mail') ?></p></li>
        </ul>
        <h5>Région :</h5>
          <p><?php echo $user->__get('region') ?></p>
      </div>
      <h2>Vos offres :</h2>
      <?php foreach ($mesOffre as $offre) { ?>
        <a href="../controleur/offre.ctrl.php?ref=<?php echo $offre->__get('ref')?>&fromC=1">
        <div class="Offre">
          <img src="<?php echo $config['img_path']."/".$offre->__get('photo') ?>" alt="">
          <div >
            <h4><?php echo $offre->__get('intitule')?></h4>
            <p class="prix"><?php echo $offre->__get('prix')?>€</p>
            <p><?php echo $offre->__get('region')?></p>
          </div>
        </div>
        </a>
      <?php }?>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
