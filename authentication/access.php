<?php
session_start();
require 'connection.php';

if (!empty($_GET['username']) && !empty($_GET['password'])) {
  try {
    $loginStatement = $link->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $loginStatement->bindParam(':username', $_GET['username']);
    $loginStatement->bindParam(':password', $_GET['password']);
    $loginStatement->execute();
    if ($user = $loginStatement->fetchObject()) {
      $_SESSION['username'] = $user->username;
      $_SESSION['level'] = $user->level;
      header('Location: index.php');
    } else {
      header('Location: login.php');
    }
  } catch (PDOException $error) {
    echo "Error al inicar sesión: " . $error->getMessage();
  }
}
