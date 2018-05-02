<?php
 function filedGenerator()
 {
   foreach($_SESSION['filed'] as $k => $v)
   {
       if ($v=="blank")
       {
         echo "<input type='submit' name='$k' value=' ' class='filedInput'>";
       }
       else{
        echo  "<input type='submit' name='$k' value='$v' class='filedInput'>";
        }
   }

 }

 function startGame()
 {
   if (!isset($_SESSION['gameStarted'])){
   $_SESSION['filed'] = array('1' => "blank",
   '2' => "blank",
   '3' => "blank",
   '4' => "blank",
   '5' => "blank",
   '6' => "blank",
   '7' => "blank",
   '8' => "blank",
   '9' => "blank"
   );
   $_SESSION['player'] = "X";
   $_SESSION['gameStarted'] = "true";
    }
   filedGenerator();
 }

 function saveFiledValue($place, $player, $fileds)
 {
   foreach ($fileds as $key => $value)
   {
     if ($key == $place)
     {
        $return = $_SESSION['filed'][$key] = $player;
      //  echo '<pre>';print_r($_SESSION['filed'] );echo '</pre>';
     }
   }
   $_SESSION['title'] = 'TicTacToe';
   return $return;
 }

 function restartGame()
 {
   switch ($_SESSION['winning'])
   {
     case $_SESSION['winning']=='o':
      $_SESSION['title']='Wygrało kółko!';
     break;

     case $_SESSION['winning']=="draw":
      $_SESSION['title']="Remis!";
     break;

     case $_SESSION['winning']=="x":
       $_SESSION['title']="Wygrał krzyżyk!";
     break;
   }

   unset($_SESSION['winning']);
   unset($_SESSION['gameStarted']);

 }

 function checkForWin($array)
 {
   //Checking win for X//
   switch ($array)
   {
       case ($array[1])=="X"&&($array[2])=="X"&&($array[3])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[4])=="X"&&($array[5])=="X"&&($array[6])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[7])=="X"&&($array[8])=="X"&&($array[9])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[1])=="X"&&($array[4])=="X"&&($array[7])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[2])=="X"&&($array[5])=="X"&&($array[8])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[3])=="X"&&($array[6])=="X"&&($array[9])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[1])=="X"&&($array[5])=="X"&&($array[9])=="X": $_SESSION['winning']="x"; return true; break;
       case ($array[3])=="X"&&($array[5])=="X"&&($array[7])=="X": $_SESSION['winning']="x"; return true; break;

   //Checking win for O

      case ($array[1])=="O"&&($array[2])=="O"&&($array[3])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[4])=="O"&&($array[5])=="O"&&($array[6])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[7])=="O"&&($array[8])=="O"&&($array[9])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[1])=="O"&&($array[4])=="O"&&($array[7])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[2])=="O"&&($array[5])=="O"&&($array[8])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[3])=="O"&&($array[6])=="O"&&($array[9])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[1])=="O"&&($array[5])=="O"&&($array[9])=="O": $_SESSION['winning']="o"; return true; break;
      case ($array[3])=="O"&&($array[5])=="O"&&($array[7])=="O": $_SESSION['winning']="o"; return true; break;
   }

  //Checking for draw
  foreach ($array as $x)
  {
    if ($x == "O" || $x == "X")
    {
      $filedMarked += 1;
    }
    if ($filedMarked==9)
    {
      $_SESSION['winning'] = "draw";
      return true;
    }
  }

 }

 function playerChange()
 {
  if ($_SESSION['player'] == "X")
  {
    $_SESSION['player'] = "O";
  }else {
    $_SESSION['player'] = "X";
  }
 }
