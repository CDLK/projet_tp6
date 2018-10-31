<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/creaCompte.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php  if (isset($_SESSION['utilisateur'])) {?>
        <p>Vous êtes déjà connecté !</p>
      <?php } else {?>
        <div class="creationCompte">
          <h3>Creation compte :</h3>
          <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">

            <label for="nom"><b>Nom :</b></label>
            <input type="text" placeholder="Nom" name="nom" <?php if ($erCo && $validMail) {print("value=".$_POST['mail']." ");} ?>required>

            <label for="prenom"><b>Prenom :</b></label>
            <input type="text" placeholder="Prenom" name="prenom" <?php if ($erCo && $validMail) {print("value=".$_POST['mail']." ");} ?>required>

            <label for="age"><b>Age :</b></label>
            <select name="age">
              <?php  for($i = 18; $i<100; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>
            <?php if (!$validMail) {?>
              <p class="erreur"></p>
            <?php } ?>
            <label for="mail"><b>Mail :</b></label>
            <input type="mail" placeholder="Entrer un mail" name="mail" <?php if ($erCo && $validMail) {print("value=".$_POST['mail']." ");} ?>required>
            <label for="mdp"><b>Mot de passe :</b></label>
            <?php if ($validMail && $erCo) {?>
              <p class="erreur">Erreur mots de passe ne correspondant pas !</p>
            <?php } ?>
            <input type="password" placeholder="Entrer mot de passe" name="mdp" required>
            <input type="password" placeholder="Reentrer mot de passe" name="mdpVerif" required>

            <label for="telephone"><b>Telephone :</b></label>
            <input type="text" placeholder="Numéros de téléphone" name="telephone" <?php if ($erCo && $validMail) {print("value=".$_POST['mail']." ");} ?>required>

            <label for="region"><b>Votre region :</b></label>
            <select name="region">
              <?php  foreach ($regions as $region) { ?>
                <option value="<?php echo $region->getNom() ?>"><?php echo $region->getNom() ?></option>
              <?php } ?>
            </select>
            <button name="Creation" type="submit">Creer Compte</button>
          </form>
        </div>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
