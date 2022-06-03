<?php
include('connect.php');
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $db = "iteh_lb1";
    if (isset($_POST['publisher'])) $publisher = $_POST['publisher'];
    else $publisher = 'Мрія';


    try {
        $sql = "SELECT $db.literature.name,$db.literature.ISBN,$db.literature.publisher,$db.literature.year,$db.literature.quantity FROM $db.literature WHERE publisher = :publisher";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':publisher' => $publisher));
        $timetable = $sth->fetchAll(PDO::FETCH_NUM);
        print "<table border ='1'>";
        print " <tr><td><b>Назва</td><td><b>ISBN</td><td><b>Видавництво</td><td><b>Рік</td><td><b>Сторінки</td></tr>";
        foreach ($timetable as $row) {
            print " <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
        }
    } catch (PDOException $e) {
        
        die("Error!:" . $e->getMessage() . "<br>");
    }
    ?>
    <input type="button" value="Повернутися" onclick="history.back();return false;" />
</body>

</html>