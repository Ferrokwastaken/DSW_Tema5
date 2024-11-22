<?php
session_start();

if (!isset($_SESSION['username'])) { //redirige a login.php si no hay un nombre de usuario
  header('Location: login.php');
  exit();
}
