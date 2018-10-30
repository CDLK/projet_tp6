<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/mainPage.style.css">
    <title>Test Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php if(!isset($catMeres)){
        echo "<p>lol</p>";
      } ?>
      <?php foreach ($catMeres as $catM) {
        $catFilles = $dao->getCatFille($catM->__get('id'));?>
        <div class="Categorie">
          <a href="../controleur/recherche.ctrl.php?c=<?php echo $catM->__get('id') ?>"><h3><?php echo $catM->__get('intitule') ?></h3></a>
          <div class="">
            <ul>
            <?php foreach ($catFilles as $catF) {?>
                  <li><a href="../controleur/recherche.ctrl.php?c=<?php echo $catF->__get('id') ?>"><p><?php echo $catF->__get('intitule') ?></p></a></li>
            <?php } ?>
            </ul>
          </div>
        </div>
      <?php } ?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
