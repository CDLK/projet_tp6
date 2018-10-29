<header>
  <div class="SearchPanel">
    <form class="" action="" method="post">
      <p>Categories :
      <select class="" name="Categories">
        <?php  foreach ($categorie as $categories => $value) { ?>
          <option value="<?= echo $value ?>"><?= echo $value ?></option>
        <?= } ?>
      </select>
      Region :
      <select class="" name="Region">
        <?php  foreach ($region as $regions => $value) { ?>
          <option value="<?= echo $value ?>"><?= echo $value ?></option>
        <?= } ?>
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
