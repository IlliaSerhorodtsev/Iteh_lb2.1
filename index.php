<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Sergorodtsev_lb1</title>
</head>

<body>
  <div class="MyForm">

    <form action="author.php" method="post">
      <div>
      <h3>Получить информацию по имени автора</h3>
      <select name='author' id='author'>
        <?php
        try {
          
          $sql = 'SELECT name FROM iteh_lb1.authors';
          foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value = '$name'>$name</option>";
          }
        } catch (PDOException $e) {

          die("Error!:" . $e->GetMessage() . "<br>");
        }
        ?>
      </select>
      <br>
      <input type="submit" value="ok" >
      </div>
    </form>
    <br>

    <form action="date.php" method="post">
    <div >
      <h3>Получить информацию по году</h3>
      <input name='FYear' id="FYear">

      </input>
      ПО
      <input name='SYear' id="SYear">

      </input>
      <br>
      <input type="submit" value="ok" >
    </div>
    </form>
    <br>

    <form action="publisher.php" method="post">
    <div >
      <h3>Получить информацию по издательству</h3>
      <select name='publisher' id='publisher'>
        <?php
        try {
          $sql = 'SELECT DISTINCT publisher FROM iteh_lb1.literature Where publisher is not null';
          foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value = '$name'>$name</option>";
          }
        } catch (PDOException $e) {

          die("Error!:" . $e->GetMessage() . "<br>");
        }
        ?>
      </select>
      <br>
      <input type="submit" value="ok">
    
</body>

</html>