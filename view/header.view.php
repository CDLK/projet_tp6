<header>
  <div class="SearchPanel">
    <a href="../controleur/mainPage.ctrl.php"><h1>Les Halles Du Web</h1></a>
    <form class="" action="../controleur/recherche.ctrl.php" method="get">
      <p>Categories :
      <select class="" name="c">
        <option value="Toute">Toutes categories</option>
        <?php  foreach ($categories as $categorie) { ?>
          <option value="<?php echo $categorie->__get('id') ?>"><?php echo $categorie->__get('intitule') ?></option>
        <?php } ?>
      </select>
      Region :
      <select class="" name="r">
        <option value="Toute">Toute la France</option>
        <?php  foreach ($regions as $region) { ?>
          <option value="<?php echo $region->getNom() ?>"><?php echo $region->getNom() ?></option>
        <?php } ?>
      </select>
      <input type="submit" name="" value="Rechercher">
    </p>
    </form>
  </div>
  <div class="PersonnalPanel">
  <?php if (!$userCo) {?>
      <a href="../controleur/connection.ctrl.php"><p>Se connecter</p></a>
      <a href="pageConnection.html"><p>Creer Un Compte</p></a>
  <?php } else {?>
    <h4><?php print($user->__get('prenomUser')." ".$user->__get('nomUser')) ?></h4>
    <a href="../controleur/compte.ctrl.php"><p>Mon compte</p></a>
    <a href="<?php  print($_SERVER['PHP_SELF']."?deco=true")?>"><p>Se deconnecter</p></a>
  <?php }?>
  </div>
</header>
