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
        <form action="../controleur/compte.ctrl.php?" method="post">
          <input type="submit" value="retour">
        </form>
        <div class="creationOffre">
          <h3>Creation offre :</h3>
          <form enctype="multipart/form-data" action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">

            <label for="intitule"><b>Intitule de l'offre :</b></label>
            <input type="text" placeholder="Entrer intitule" name="intitule" <?php if ($erImg!=0) {print("value=\"".$_POST['intitule']."\" ");} ?>required>

            <label for="image"><b>Image pour ilustrer votre offre :</b></label>
            <?php if ($erImg == 1) {?>
              <p class="erreur">Image trop grosse pour être utiliser </p>
            <?php } ?>
            <?php if ($erImg == 2) {?>
              <p class="erreur">Le fichier envoyer n'est pas d'un type reconnue (jpg,jpeg,png)</p>
            <?php } ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
            <input type="file" name="image" value="image" id="image" multiple="false" accept="image/*" required>

            <label for="prix"><b>Prix de l'offre :</b></label>
            <input type="text" placeholder="Entrer prix" name="prix" <?php if ($erImg!=0) {print("value=\"".$_POST['prix']."\" ");} ?> required>

            <label for="categorie"><b>Categorie de l'offre :</b></label>
            <select class="Categorie" name="categorie">
              <?php if ($erImg!=0) {?>
                <option value=<?php print("\"".$_POST['categorie']."\"");  ?>><?php echo $dao->getCatFromId($_POST['categorie'])->__get('intitule') ?></option>
              <?php }?>
              <?php  foreach ($cats as $categorie) { ?>
                <?php if ((($erImg!=0) && $_POST['categorie'] != $categorie->__get('id')) || ($erImg==0)) {?>
                  <option value="<?php echo $categorie->__get('id') ?>"><?php echo $categorie->__get('intitule') ?></option>
                <?php } ?>
              <?php } ?>
            </select>

            <label for="description"><b>Description :</b></label>
            <textarea class="desc" name="description" placeholder="Entrer description" cols="50" rows="10" maxlength="500" draggable="false" required><?php if ($erImg!=0) {print($_POST['description']);} ?></textarea>

            <button name="NouvelleOffre" type="submit">Creer Offre</button>
          </form>
        </div>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
