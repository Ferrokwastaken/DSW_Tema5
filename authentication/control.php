<?php
function control ($level) {
  session_start();

  if (!isset($_SESSION['username']) || $_SESSION['level'] < $level) { //redirige a login.php si no hay un nombre de usuario
      header('Location: login.php');
      exit();
  } 
}
