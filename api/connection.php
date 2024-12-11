<?php
$host = 'localhost';
$db = 'filmdb';
$pwd = '';
$user = 'root';

try {
  $link = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
  $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  die('Error de conexión: ' . $error->getMessage());
}
