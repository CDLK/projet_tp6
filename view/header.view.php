<header>
  <div class="SearchPanel">
    <h1>Les Halles Du Web</h1>
    <form class="" action="" method="post">
      <p>Categories :
      <select class="" name="Categories">
        <option value="">Toutes categories</option>
        <?php  foreach ($categories as $categorie) { ?>
          <option value="<?php echo $categorie->__get('intitule') ?>"><?php echo $categorie->__get('intitule') ?></option>
        <?php } ?>
      </select>
      Region :
      <select class="" name="Region">
        <option value="">Toute la France</option>
        <?php  foreach ($regions as $region) { ?>
          <option value="<?php echo $region->getNom() ?>"><?php echo $region->getNom() ?></option>
        <?php } ?>
      </select>
      <input type="submit" name="Rechercher" value="Rechercher">
    </p>
    </form>
  </div>
  <div class="PersonnalPanel">
    <a href="pageConnection.html"><p>Se connecter</p></a>
    <a href="pageConnection.html"><p>Creer Un Compte</p></a>
  </div>
</header>
