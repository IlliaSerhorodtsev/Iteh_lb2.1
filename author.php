<?php
include('connect.php');


 
  $db = "iteh_lb1";
  // if (isset($_POST['author'])) $author = $_POST['author'];
  // else $author = '';
  $author = $_POST['author'];
  try {
    $sql = "SELECT $db.literature.name FROM $db.literature INNER JOIN $db.book_authors ON $db.book_authors.FID_Book=$db.literature.ID_Book INNER JOIN $db.authors ON $db.book_authors.FID_Authors=$db.authors.ID_Authors WHERE $db.authors.name=:author";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':author' => $author));
    $timetable = $sth->fetchAll(PDO::FETCH_NUM);
   
    foreach ($timetable as $row) {
      print " <tr><td>$row[0]</td></tr>";
    }
  } catch (PDOException $e) {
        die("Error!:" . $e->getMessage() . "<br>");
  }
  ?>

<<<<<<< HEAD:author.php
  <input type="button" value="Повернутися" onclick="history.back();return false;" />
</body>
<!--  -->
</html>