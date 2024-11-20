<?php
  $animals = [
    'Fish' => ['Nemo', 'Dorada', 'Vieja', 'Abade', 'Cherne', 'Medregal'],
    'Insect' => ['Bettle', 'Ant', 'Butterfly', 'Fly', 'Mosquito'],
    'Reptile' => ['Snake', 'Gekko', 'Alligator', 'Lizard']
  ];

  $animalsList = [];
  if (empty($_GET['species'])) {
    if (empty($_COOKIE['species'])) {
      foreach ($animals as $name => $species) {
        $animalsList = array_merge($animalsList, $species);
      }
    } else {
      $animalsList = $animals[$_COOKIE['species']];
    }
  } else {
    $animalsList = $animals[$_GET['species']];
    setcookie('species', $_GET['species'], time() + 120);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preferences</title>
</head>
<body>
  <nav>
    <ul>
    <?php
      foreach ($animals as $name => $value) {
        printf('<li><a href="preferences.php?species=%s">%s</a></li>', $name, $name);
      }
    ?>
    <li><a href="preferences.php">Todos</a></li>
    </ul>
  </nav>
  <ul>
    <?php
      foreach ($animalsList as $animal) {
        echo "<li>$animal</li>";
      }
    ?>
  </ul>
</body>
</html>