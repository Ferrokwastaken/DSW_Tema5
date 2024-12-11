<?php
require 'connection.php';

header('Content-type: application/json; charset=utf-8');
if (!isset($_GET['id'])) {
  $filmStatement = $link->prepare('SELECT film_id, title FROM film');
  $filmStatement->execute();
  $films = $filmStatement->fetchAll(PDO::FETCH_OBJ);
  echo json_encode($films);
} else {
  $filmStatement = $link->prepare('SELECT * FROM film WHERE film_Id = :id');
  $filmStatement->bindParam(':id', $_GET['id']);
  $filmStatement->execute();
  $film = $filmStatement->fetchObject();
  if ($film) {
    echo json_encode($film); 
  } else {
    http_response_code(404);
  }
}
