<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/creaOffre.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php  if (!isset($_SESSION['utilisateur'])) {?>
        <p>Vous devez vous connecté pour creer une offre !</p>
      <?php } else {?>
        <div class="creationOffre">
          <h3>Creation offre :</h3>
          <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">

            <label for="intitule"><b>Intitule de l'offre :</b></label>
            <input type="text" placeholder="Entrer intitule" name="intitule" required>

            <label for="image"><b>Image pour ilustrer votre offre :</b></label>
            <input type="file" name="image" value="image" required>

            <label for="prix"><b>Prix de l'offre :</b></label>
            <input type="text" placeholder="Entrer prix" name="prix" required>

            <label for="description"><b>Description :</b></label>
            <textarea class="desc" name="description" placeholder="Entrer description" cols="50" rows="10" maxlength="500" draggable="false" required></textarea>

            <button name="NouvelleOffre" type="submit">Creer Offre</button>
          </form>
        </div>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
