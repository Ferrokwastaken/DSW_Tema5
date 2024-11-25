<?php
session_start();
require 'connection.php';

if (!empty($_GET['username']) && !empty($_GET['password'])) {
  try {
    $loginStatement = $link->prepare('SELECT * FROM users WHERE username = :username');
    $loginStatement->bindParam(':username', $_GET['username']);
    $loginStatement->execute();
    if ($user = $loginStatement->fetchObject()) {
      if (password_verify($_GET['password'], $user->password)) {
        $_SESSION['username'] = $user->username;
        $_SESSION['level'] = $user->level;
        header('Location: index.php');
      } else {
        header('Location: login.php');
      }
    } else {
      header('Location: login.php');
    }
  } catch (PDOException $error) {
    echo "Error al inicar sesión: " . $error->getMessage();
  }
}
