<?php
session_start();
require_once "functions.php";
 ?>
<html lang="pl">

	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
	<title><?php if (isset($_SESSION['title']))
  {
    echo $_SESSION['title'];
  }else echo "Kółko i krzyżyk";
  ?> </title>
	</head>

<body>
 <div id="content">
  <div id="game">
    <form action="engine.php" method="get">
    <?php
      startGame();
    ?>
  </form>
  </div>
  <div id='gameInfo'>

    <b>Grasz jako:</b> <?php echo "<span style='font-family: "."Montserrat".", sans-serif;'>".$_SESSION['player'].'</span>'; ?> <br />
    <b>Wygrana dla:</b> <?php

    try
    {
      if (!isset($_SESSION['title']))
      {
        throw new Exception('Nowa gra! Zmienna nie ustawiona!');
      }
      if ($_SESSION['title']!="TicTacToe")
      {
        echo $_SESSION['title'];
      }else {
        throw new Exception ('Zmienna nie ustawiona lub jest równa defaultowej');
      }
      if (($_SESSION['title']!="Remis!") && (isset($_SESSION['title'])) && ($_SESSION['title']!="TicTacToe"))
      {
        echo '<div style="display:none;"><audio autoplay src="snd/win.wav" type="sound/wav"></div>';
      }else {
        throw new Exception('To jest remis!');
      }
    } catch (Exception $e)
    {
      //Wywołanie błędu jeżeli trzeba odkomentuj |Developer info
      //echo $e;
    }
    ?>

  </div>
</div>
</body>

</html>
