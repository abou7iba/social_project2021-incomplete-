<?php
    session_start();
    $id = $_SESSION['id'];
    if(isset($_SESSION['id']))
        echo '';
    else
        header('LOCATION: login.php');
    include_once 'include/db.php';
    include_once 'posts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/timeline.css">
    <link rel="stylesheet" href="css/profile.css"> 
    <?php 
         $sd = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id' ");
         while ($row = mysqli_fetch_array($sd)){
    ?>
    <title><?php echo $row['fname']. " ". $row['lname'] . "  | الصفحة الشخصية"?></title>
    <?php }?>
</head>
<body dir="rtl">
</body>
</html>