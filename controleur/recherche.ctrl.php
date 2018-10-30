<?php

  if (isset($_GET['firstId'])) {
    $firstId = $_GET['firstId'];
  } else {
    $firstId = 1;
  }

  $config = parse_ini_file('../config/config.ini');


  $nextId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? (($_GET['firstId']+10) >= $nbMusic ? 1: $_GET['firstId']+10): 10);
  $precId = (isset($_GET['firstId']) && $_GET['firstId'] != 1? $_GET['firstId']-10: $nbMusic-($nbMusic%10));
  $precId = ($precId == 0 ? 1 : $precId);






  include('../view/recherche.view.php');
 ?>
