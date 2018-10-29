<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/mainPage.style.css" />
    <title>Les Halles du Web</title>
  </head>
  <body>
    <header>
      <h1>Les halles du web !</h1>
    </header>
    <nav>
      <?php foreach ($categorie as $categories => $value) { // Affichage de chaque categorie?>
        <div class="Categorie">
            <h4><?=echo $categorie->intitule?></h4>
        </div>
      <?php  }?>
    </nav>
    <footer></footer>
  </body>
</html>
