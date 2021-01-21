<?php

      session_start();

      if(isset($_SESSION['user_name'])){
        echo "<div class='user-head'>";
        echo "Hello ".$_SESSION['user_name'];
        echo "</div>";
      }
      else{
        echo "<div class='user-head'>";
        echo "Session not set?!";
        echo "</div>";
      }
?>
    