<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Les Halles du Web</title>
  </head>
  <body>
    <header>
      <h1>Les halles du web !</h1>
    </header>
    <nav>
      <?php foreach ($offre as $offres => $value) { // Affichage de chaque offre dans la recherche?>
        <div class="Offre">
          <img src="" alt="">
          <div >
            <h4><?=echo $offre->intitule?></h4>
            <p><?=echo $offre->description?></p>
          </div>
        </div>
      <?php  }?>
    </nav>
    <a href=""></a>
    <a href=""></a>
    <footer></footer>
  </body>
</html>
