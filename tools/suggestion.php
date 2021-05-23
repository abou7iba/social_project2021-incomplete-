<?php
    $helpid = $_GET['id'];
    require_once("../include/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/todolist.css">

    <title>الحلول المقترحه</title>
</head>
<body>
    <?php
            $sd = mysqli_query($conn,"SELECT * FROM todolist WHERE id='$helpid' ");
            while ($row = mysqli_fetch_array($sd)){
                $todoid = $row['id'];
                $task = $row['task'];
                $note = $row['note'];
                $time = $row['time'];
                $date = $row['date'];
                $finish = $row['finish'];
       }      
       echo $todoid;
       echo $note;
       echo $task;
       echo $time;
    ?>
</body>
</html>