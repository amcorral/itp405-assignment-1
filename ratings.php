<?php

$host = 'itp460.usc.edu';
$database_name = 'dvd';
$username = 'student';
$password = 'ttrojan';


$pdo = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);

$rating = $_GET['rating_name'];

$sql = "
  SELECT title, rating_name, genre_name
  FROM dvds

  INNER JOIN ratings
  ON dvds.rating_id = ratings.id

  INNER JOIN genres
  ON dvds.genre_id = genres.id

  WHERE ratings.rating_name = ?
";

$statement = $pdo->prepare($sql);  //prepared statement
$statement->bindParam(1, $rating);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<a href = 'index.php'> Home </a>

<table style= "width:60%" >
  <tr>
    <th>Title </th>
    <th>Genre </th>
  </tr>
<?php foreach ($dvds as $dvd) : ?>
  <tr>
    <td> <?= $dvd->title ?> </td>
    <td> <?= $dvd->genre_name ?> </td>
  </tr>
<?php endforeach; ?>
