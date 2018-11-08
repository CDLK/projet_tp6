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

      <div class="Option">
        <form action=<?php if(isset($_GET['fromC'])){print("\"../controleur/compte.ctrl.php\"");} else {print("\"../controleur/recherche.ctrl.php?firstId=$firstId&c=$cate&r=$reg\"");}?> method="post">
          <input type="submit" value="retour">
        </form>
        <?php if ($estVendeurConnecter) { ?>
          <form action="../controleur/compte.ctrl.php?suppr=<?php  echo $offre->__get('ref');?>" method="post">
            <input type="submit" value="Supprimer offre">
          </form>
        <?php } ?>
      </div>

      <div class="Offre">
        <img src="<?php echo $config['img_path']."/".$offre->__get('photo') ?>" alt="">
        <h3><?php echo $offre->__get('intitule') ?></h3>
        <p class="prix"><?php echo $offre->__get('prix') ?>€</p>
        <p><?php echo $offre->__get('caracteristique') ?></p>
      </div>

      <div class="Vendeur">
        <h3>Vendeur<?php if($estVendeurConnecter) print(" (Vous) "); ?> :</h3>
        <h4><?php print($vendeur->__get('prenomUser')." ".$vendeur->__get('nomUser'));?></h4>
        <h5>Contacte :</h5>
        <ul>
          <li><p>Téléphone : <?php echo $vendeur->__get('telephone') ?></p></li>
          <li><p>Mail : <?php echo $vendeur->__get('mail') ?></p></li>
        </ul>
      </div>

      <div class="OptionSuivis">
      <?php if($estConnecter && $_SESSION['utilisateur']->__get('identifiant') != $offre->__get('id')){ ?>
        <?php if($estSuivis){ ?>
          <form action="<?php print($_SERVER['PHP_SELF']."?ref=".$ref)?>" method="post">
            <input name="arSuivis" type="submit" value="Arreter de suivre">
          </form>
        <?php } else { ?>
          <form action="<?php print($_SERVER['PHP_SELF']."?ref=".$ref) ?>" method="post">
            <input name="suivre" type="submit" value="Suivre offre">
          </form>
        <?php } ?>
      <?php } elseif (!$estConnecter) { ?>
        <h4>Connecter vous pour pouvoir suivre cette offre</h4>
      <?php } ?>
    </div>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
