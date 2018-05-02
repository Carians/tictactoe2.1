<?php

  session_start();

  require_once "functions.php";

 foreach ($_GET as $k => $x)
 {
   if(isset($k) && ($x==" "))
   {
     saveFiledValue($k, $_SESSION['player'], $_SESSION['filed']);
   }
   header('Location: index.php');
 };

 if (checkForWin($_SESSION['filed'])==true)
 {
   restartGame();
  }else{
   playerChange();
  }
