<header>
  <div class="SearchPanel">
    <a href="../controleur/mainPage.ctrl.php"><h1>Les Halles Du Web</h1></a>
    <form class="" action="../controleur/recherche.ctrl.php" method="get">
      <p>Categories :
      <select class="" name="c">
        <?php if (isset($_GET['c']) && $_GET['c']!='Toute') {?>
          <option value=<?php print("\"".$_GET['c']."\"");  ?>><?php echo $dao->getCatFromId($_GET['c'])->__get('intitule') ?></option>
          <option value="Toute">Toutes categories</option>
        <?php } else {?>
          <option value="Toute">Toutes categories</option>
        <?php }?>
        <?php  foreach ($categories as $categorie) { ?>
          <?php if ((isset($_GET['c']) && $_GET['c'] != $categorie->__get('id')) || (!isset($_GET['c']))) {?>
              <option value="<?php echo $categorie->__get('id') ?>"><?php echo $categorie->__get('intitule') ?></option>
          <?php } ?>
        <?php } ?>
      </select>
      Region :
      <select class="" name="r">
        <?php if (isset($_GET['r']) && $_GET['r']!='Toute') {?>
          <option value=<?php print("\"".$_GET['r']."\"");  ?>><?php echo $_GET['r'] ?></option>
          <option value="Toute">Toute la France</option>
        <?php } else {?>
          <option value="Toute">Toute la France</option>
        <?php }?>
        <?php  foreach ($regions as $region) { ?>
          <?php if ((isset($_GET['r']) && $_GET['r'] != $region->getNom()) || (!isset($_GET['r']))) {?>
            <option value="<?php echo $region->getNom() ?>"><?php echo $region->getNom() ?></option>
          <?php } ?>
        <?php } ?>
      <!--  <input type="text" value="fait rien encore" placeholder="recherche"> -->
      </select>
      <input type="submit" name="" value="Rechercher">
    </p>
    </form>
  </div>
  <div class="PersonnalPanel">
  <?php if (!$userCo) {?>
      <a href="../controleur/connection.ctrl.php"><p>Se connecter</p></a>
      <a href="../controleur/creaCompte.ctrl.php"><p>Creer Un Compte</p></a>
  <?php } else {?>
    <h4><?php print($user->__get('prenomUser')." ".$user->__get('nomUser')) ?></h4>
    <a href="../controleur/compte.ctrl.php"><p>Mon compte</p></a><?php  ?>
    <a href="<?php  print($_SERVER['PHP_SELF']."?deco=true");?><?php  if(isset($_GET['r'])){print("&r=".$_GET['c']);} if(isset($_GET['c'])){print("&c=".$_GET['c']);} if(isset($_GET['firstId'])){print("&firstId=".$_GET['firstId']);}?>"><p>Se deconnecter</p></a>
  <?php }?>
  </div>
</header>
