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
      <?php } else {?>

      <?php foreach ($offres as $offre) { ?>
        <a href="../controleur/offre.ctrl.php?ref=<?php echo $offre->ref?>&firstId=<?php echo $firstId ?>&r=<?php echo $reg ?>&c=<?php echo $cate?>&rec=<?php echo $rec?>">
        <div class="Offre">
          <img src="<?php echo $config['img_path']."/".$offre->photo ?>" alt="">
          <div >
            <h4><?php echo $offre->intitule?></h4>
            <p class="prix"><?php echo $offre->prix?>€</p>
            <p><?php echo $offre->region?></p>
          </div>
        </div>
        </a>
      <?php  }?>
        <div class="Fleche">
          <?php if ($firstId!=0) {?>
            <a href="../controleur/recherche.ctrl.php?firstId=<?php echo $firstId-10 ?>&r=<?php echo $reg ?>&c=<?php echo $cate?>&rec=<?php echo $rec?>"><img src="../data/imgSite/F_Gauche.jpg" alt=""></a>
          <?php } ?>
          <?php if ($nboffre > $firstId+10) {?>
          <a href="../controleur/recherche.ctrl.php?firstId=<?php echo $firstId+10 ?>&r=<?php echo $reg ?>&c=<?php echo $cate?>&rec=<?php echo $rec?>"><img src="../data/imgSite/F_Droite.jpg" alt=""></a>
          <?php } ?>
        </div>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
