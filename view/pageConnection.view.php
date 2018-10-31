<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/style/connection.style.css">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <?php include('../controleur/header.ctrl.php'); ?>
    <nav>
      <?php  if (isset($_SESSION['utilisateur'])) {?>
        <p>Vous êtes déjà connecté !</p>
      <?php } else {?>
        <div class="connection">
          <h3>Connection :</h3>
          <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="mail"><b>Mail</b></label>
            <?php if (!$validMail) {?>
              <p class="erreur">Aucun utilisateur avec ce mail n'existe !</p>
            <?php } ?>
            <input type="text" placeholder="Enter Username" name="mail" <?php if ($erCo && $validMail) {print("value=".$_POST['mail']." ");} ?>required>
            <label for="mdp"><b>Mot de passe</b></label>
            <?php if ($validMail && $erCo) {?>
              <p class="erreur">Mauvais mots de passe !</p>
            <?php } ?>
            <input type="password" placeholder="Enter Password" name="mdp" required>
            <button name="Connection" type="submit">Connection</button>
          </form>
        </div>
      <?php }?>
    </nav>
    <?php include('footer.view.php'); ?>
  </body>
</html>
