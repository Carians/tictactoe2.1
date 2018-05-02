<?php
 function filedGenerator()
 {
   foreach($_SESSION['filed'] as $k => $v)
   {
       if ($v=="blank")
       {
         echo "<div class='filed'><input type='submit' value=' ' name='$k' class='filedInput'></div>";
       }else{
        echo  "<div class='filed'><input type='submit' value='$v' name='$k' class='filedInput'></div>";
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
   $_SESSION['player'] = "O";
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
        echo '<pre>';print_r($_SESSION['filed'] );echo '</pre>';
     }
   }
   $_SESSION['title'] = 'TicTacToe';
   return $return;
 }

 function restartGame()
 {
   unset($_SESSION['gameStarted']);
   $_SESSION['title'] = "Wygral krzyzyk!";
 }

 function checkForWin($array)
 {
   //Checking win for X//
   switch ($array)
   {
       case ($array[1])=="X"&&($array[2])=="X"&&($array[3])=="X":
        return true;
       break;
       case ($array[4])=="X"&&($array[5])=="X"&&($array[6])=="X":
        return true;
       break;
       case ($array[7])=="X"&&($array[8])=="X"&&($array[9])=="X":
        return true;
       break;
       case ($array[1])=="X"&&($array[4])=="X"&&($array[7])=="X":
        return true;
       break;
       case ($array[2])=="X"&&($array[5])=="X"&&($array[8])=="X":
        return true;
       break;
       case ($array[3])=="X"&&($array[6])=="X"&&($array[9])=="X":
        return true;
       break;
       case ($array[1])=="X"&&($array[5])=="X"&&($array[9])=="X":
        return true;
       break;
       case ($array[3])=="X"&&($array[5])=="X"&&($array[7])=="X":
        return true;
       break;

   //Checking win for O

   case ($array[1])=="O"&&($array[2])=="O"&&($array[3])=="O":
    return true;
   break;
   case ($array[4])=="O"&&($array[5])=="O"&&($array[6])=="O":
    return true;
   break;
   case ($array[7])=="O"&&($array[8])=="O"&&($array[9])=="O":
    return true;
   break;
   case ($array[1])=="O"&&($array[4])=="O"&&($array[7])=="O":
    return true;
   break;
   case ($array[2])=="O"&&($array[5])=="O"&&($array[8])=="O":
    return true;
   break;
   case ($array[3])=="O"&&($array[6])=="O"&&($array[9])=="O":
    return true;
   break;
   case ($array[1])=="O"&&($array[5])=="O"&&($array[9])=="O":
    return true;
   break;
   case ($array[3])=="O"&&($array[5])=="O"&&($array[7])=="O":
    return true;
   break;

   }




 }
