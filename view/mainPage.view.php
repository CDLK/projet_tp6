<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/mainPage.style.css">
    <title>Test Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php foreach ($catMeres as $catM) {
        $catFilles = $dao->getCatFille($catM->__get('id'));?>
        <div class="Categorie">
          <h3><?php echo $catM->__get('intitule') ?></h3>
          <div class="">
            <ul>
            <?php foreach ($catFilles as $catF) {?>
                  <li><a href="#"><p><?php $catF->__get('intitule') ?></p></a></li>
            <?php } ?>
            </ul>
          </div>
        </div>
      <?php } ?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
