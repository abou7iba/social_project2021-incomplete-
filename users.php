<?php
    session_start();
    $id = $_COOKIE['id'];
    if(isset($_SESSION['id']))
        echo"";
    else
        header('LOCATION: login.php');
    include_once 'include/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript">
    
    </script>
    <style>
        #member{
            width:15%;
            display:block;
            float: left;
            margin:10px;
            background-color: #eee;
        }
    </style>
    <title>الأعضاء</title>
</head>
<body>
<center>
    
    <?php 
    $my_id = $_COOKIE['id'];
    $sqlsel = mysqli_query($conn,"SELECT * FROM users");
    while($row = mysqli_fetch_assoc($sqlsel)){ 
    if($my_id!=$row['id']){
    $users = $row['fname'] . " ".$row['lname'];
    $username = $row['username'];
    $idimg = $row['id'];
    $extimg = $row['ext'];
    $img = 'user_pic/'.$idimg.'.'.$extimg;
    ?>
    <form action="" method="post">
    <div id="member">
    <img src="<?php echo $img; ?>" alt="" width="50px" height="50px" id="member">
    <span id="member"><a href="#"><?php echo $users; ?></a></span><br>
    <input type="submit" value="اضافه" name="addf">
    </div>
    <?php } }?>
    <?php 
    if(isset($_POST['addf'])){
    $sqlself = mysqli_query($conn,"SELECT id FROM users WHERE username='$username' ");
    while($row = mysqli_fetch_assoc($sqlself)){ 
        $fri_id = $row['id'];
        // $sqladdf = "INSERT INTO friends (par_user,ch_user,stat) VALUES ('$my_id','$fri_id','0')";
        mysqli_query($conn,"INSERT INTO friends (par_user,ch_user,stat) VALUES ('$my_id','$fri_id','0')");


    }

    }

    ?>
    </form>

    
</center>

</body>
</html>