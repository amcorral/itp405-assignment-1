<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> DVD Search </title>
  </head>

  <body>

    <h2> DVD Search </h2>
    <form action ="dvds.php" method="get">

      DVD: <input type="text" name="dvd" id="input">
      <input type="submit" value="Search">

    </form>

  </body>

    <script>

      var textInput = document.getElementById('input').value;
      console.log(textInput);
    </script>

</html>
