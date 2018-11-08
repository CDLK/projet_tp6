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
            <input type="text" placeholder="Nom" name="nom" <?php if ($erMdp || $erMail) {print("value=".$_POST['nom']." ");} ?>required>

            <label for="prenom"><b>Prenom :</b></label>
            <input type="text" placeholder="Prenom" name="prenom" <?php if ($erMdp || $erMail) {print("value=".$_POST['prenom']." ");} ?>required>

            <label for="age"><b>Age :</b></label>
            <select name="age">
              <?php if ($erMdp || $erMail) {?>
                <option value=<?php print("\"".$_POST['age']."\"");  ?>><?php echo $_POST['age'] ?></option>
              <?php }?>
              <?php  for($i = 18; $i<100; $i++) { ?>
                <?php if ((($erMdp || $erMail) && $_POST['age'] != $i) || (!$erMdp && !$erMail)) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
            <label for="mail"><b>Mail :</b></label>
            <?php if ($erMail) {?>
              <p class="erreur">Mail déjà utilisé !</p>
            <?php } ?>
            <input type="email" placeholder="Entrer un mail" name="mail" <?php if ($erMdp && !$erMail) {print("value=".$_POST['mail']." ");} ?>required>
            <label for="mdp"><b>Mot de passe :</b></label>
            <?php if ($erMdp) {?>
              <p class="erreur">Erreur mots de passe ne correspondant pas !</p>
            <?php } ?>
            <input type="password" placeholder="Entrer mot de passe" name="mdp" required>
            <input type="password" placeholder="Reentrer mot de passe" name="mdpVerif" required>

            <label for="telephone"><b>Telephone :</b></label>
            <input type="text" placeholder="Numéros de téléphone" name="telephone" <?php if ($erMdp || $erMail) {print("value=".$_POST['telephone']." ");} ?>required>

            <label for="region"><b>Votre region :</b></label>
            <select name="region">
              <?php if ($erMdp || $erMail) {?>
                <option value=<?php print("\"".$_POST['region']."\"");  ?>><?php echo $_POST['region'] ?></option>
              <?php }?>
              <?php  foreach ($regions as $region) { ?>
                <?php if ((($erMdp || $erMail) && $_POST['region'] != $region->getNom()) || (!$erMdp && !$erMail)) {?>
                  <option value="<?php echo $region->getNom() ?>"><?php echo $region->getNom() ?></option>
                <?php } ?>
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
