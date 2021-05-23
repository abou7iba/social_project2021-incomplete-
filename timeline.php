<?php
    session_start();
    include_once 'include/db.php';  
    $id = $_COOKIE['id'];
    if(isset($_SESSION['id']))
        echo "";
    else
        header('LOCATION: login.php');
    include_once 'posts.php';

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
    <link rel="stylesheet" href="css/timeline.css">
    <title>الصفحه الرئيسية</title>
</head>
<body dir="rtl">
            <?php 
                $query = "SELECT * FROM posts ";
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