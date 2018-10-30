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
      <div class="Offre">
        <h3><?php echo $offre->_GET('intitule') ?></h3>
        <img src="" alt="">
        <p></p>
      </div>
      <div class="Vendeur">

      </div>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
