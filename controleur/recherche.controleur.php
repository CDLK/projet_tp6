<?php

  if (isset($_GET['firstId'])) {
    $firstId = $_GET['firstId'];
  } else {
    $firstId = 1;
  }




  include('../view/recherche.view.php');
 ?>
