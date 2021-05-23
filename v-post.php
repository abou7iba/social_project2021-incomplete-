<?php
    session_start();
    $my_id = $_COOKIE['id'];
    if(isset($_SESSION['id']))
        echo '';
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
    <link rel="stylesheet" href="css/timeline.css">
    <link rel="stylesheet" href="css/profile.css"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/timeline.css">
    <style>
    a{
        text-decoration:none;
    }
    </style>
    <title>منشور</title>
</head>
<body dir="rtl">            
<center>
 <?php
        $sd = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$my_id' ");
        while ($row = mysqli_fetch_array($sd)){
        $idimg = $row['id'];
        $extimg = $row['ext'];
        $img = 'user_pic/'.$idimg.'.'.$extimg;
        ?>
        <a href="profile.php?=id=<?php echo $my_id; ?>""><img src="<?php echo $img; ?>" alt=""><br><span><?php echo $row['fname']. " ". $row['lname']?> <?php echo " | ".  $row['position']?> </span></a><br>
        <?php } ?>
        </center>
<center>
<br>
        <a href="signup.php">#داعم</a>
        <a href="Market.php">#الدكان</a>
        <a href="job.html">#الوظائف</a>
        <a href="profile.php?=id=<?php echo $id; ?>">#صفحتي</a>
        <a href="todolist.php">#المهام</a>
        <a href="courses.html">#الكورسات</a>
        <a href="editpro.php?=id=<?php echo $id; ?>">#تعديل</a>
        <br>
        </center>
<?php 
                $post_id = $_GET['id'];
                $query = "SELECT * FROM posts WHERE post_id ='$post_id' ";
                $result = mysqli_query($conn, $query);

                if(isset($result)){
                    while($row = mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                    
                    ?>

    <div class="wrapper">
        <div class="row row1">
            <section>
                <div class="details">
                    <span class="title"><a href="#facebook"><i class="fab fa-facebook"></i></a>&nbsp;<a href="#facebook"><i class="fab fa-facebook"></i></a>&nbsp;<a href="#facebook"><i class="fab fa-facebook"></i></a>&nbsp;<a href="#facebook"><i class="fab fa-facebook"></i></a>&nbsp;</span>
                    <?php 
                    $users = "SELECT * FROM users ";
                    $users_rs = mysqli_query($conn, $users);
                    if(isset($users_rs)){
                        while($row_rs = mysqli_fetch_assoc($users_rs)){
                        $id  =  $row_rs['id'];
                        $name = $row_rs['fname'] . " ".$row_rs['lname'];
                    }
                    
                    ?>
                    <?php 
                        $time = $row['time'];
                        
                    ?>
                    <span class="title"><a href="profile.php?=id=<?php echo $id; ?>""><img src="img/me.jpg" alt=""><br><span><?php echo $name ?></span></span></a>
                    <span class="date"><i class="fas fa-history"></i> <br><?php echo "الوقت : " . $row['time'] .'<br> التاريخ : '. $row['date'];?>  </span>


                </div>
                <p><?php echo $row['post']; ?> </p>
                <div class="bottom">
                    <a href="v-post.php?id=<?php echo  $post_id; ?>" class="support"> دعم <i class="fas fa-hand-holding-heart"></i></a>
                    <a href="v-post.php?id=<?php echo  $post_id; ?>" class="support"> تعليق <i class="fas fa-hand-holding-heart"></i></a>
                    <a href="v-post.php?id=<?php echo  $post_id; ?>"  class="share" > حذف <i class="fas fa-trash-alt"></i></a>
                    <a href="v-post.php?id=<?php echo  $post_id; ?>"  class="share" >مشاركه <i class="fas fa-share-alt"></i></a>
                </div>
            </section>
        </div>
    </div> 
    <br>

    </div>
    </div>
    <br>
</body>
</html>
<?php }  } } ?>