
<!-- <script>

  var textInput = document.getElementById('input').value;

  function update() {
    document.getElementById('paragraph').innerHTML = textInput;
  }

</script> -->

<?php

$host = 'itp460.usc.edu';
$database_name = 'dvd';
$username = 'student';
$password = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);

$sql = "
  SELECT title, genre_name, format_name, rating_name
  FROM dvds

  INNER JOIN genres
  ON dvds.genre_id = genres.id

  INNER JOIN formats
  ON dvds.format_id = formats.id

  INNER JOIN ratings
  ON dvds.rating_id = ratings.id

  WHERE title LIKE ?
";

$statement = $pdo->prepare($sql);  //prepared statement
$like = '%' . $_GET['dvd'] . '%';
$statement->bindParam(1, $like);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<a href = 'index.php'> Home </a>
<table style= "width:60%" >
  <tr>
    <th>Title </th>
    <th>Genre </th>
    <th> Format </th>
    <th> Rating </th>
  </tr>

<?php foreach ($dvds as $dvd) : ?>
  <tr>
    <td> <?= $dvd->title ?> </td>
    <td>  <?= $dvd->genre_name ?> </td>
    <td>  <?= $dvd->format_name ?> </td>
    <td>
    <a href="ratings.php?rating_name=<?= $dvd->rating_name ?> ">
      <?=$dvd->rating_name ?> </a> </td>
  </tr>
<?php endforeach; ?>
