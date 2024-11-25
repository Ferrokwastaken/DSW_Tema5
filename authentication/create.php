<?php
require 'control.php';
control(3);
require 'connection.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['level'])) {
  try {
    $createStatement = $link->prepare('INSERT INTO users (username, password, name, level) VALUES (:username, :password, :name, :level)');
    $createStatement->bindParam(':username', $_POST['username']);
    $encryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $createStatement->bindParam(':password', $encryptedPassword);
    $createStatement->bindParam(':name', $_POST['name']);
    $createStatement->bindParam(':level', $_POST['level']);
    $createStatement->execute();
  } catch (PDOException $error) {
    die('Error al crear el usuario' . $error->getMessage());
  }

} else {
  die('Error en los datos');
}