<?php
    
    require_once("include/db.php");
    $id = $_COOKIE['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="css/posts.css">
</head>
<body dir="rtl">
    <form action="" method="post" class="post">
        <?php

        $sd = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id' ");
        while ($row = mysqli_fetch_array($sd)){
        $idimg = $row['id'];
        $extimg = $row['ext'];
        $img = 'user_pic/'.$idimg.'.'.$extimg;
        ?>
        <a href="profile.php?=id=<?php echo $id; ?>""><img src="<?php echo $img; ?>" alt=""><br><span><?php echo $row['fname']. " ". $row['lname']?> <?php echo " | ".  $row['position']?> </span></a><br>
        <?php }         
        $time = date('m/d/y g:ia');
        echo 'الوقت الأن  <i class="fas fa-history"></i> : ' . $time ?>
        <hr>

        <a href="signup.php">#داعم</a>
        <a href="market/Market.html">#الدكان</a>
        <a href="job.html">#الوظائف</a>
        <a href="profile.php?=id=<?php echo $id; ?>">#صفحتي</a>
        <a href="tools/todolist.php">#المهام</a>
        <a href="courses.html">#الكورسات</a>
        <a href="editpro.php?=id=<?php echo $id; ?>">#تعديل</a><br>


        <a href="#">#الامنيات</a>
        <a href="#">#الهدايا</a>
        <a href="#">#المسابقات</a>
        <a href="#">#الشات</a>

        <a href="#">#التجمعات</a>
        <a href="#">#التحديات</a>
        <a href="#">#المدونه</a>
        <a href="#">#ادعمنا</a>
    <br>
    <a href="logout.php">#تسجيل خروج</a>

        <hr>

        <input type="text" placeholder="هتقولنا اي جديد النهارده .... " name="textpost">
        <input type="submit" value="نشر" class="publish" name="btnpost">
        <?php
        if(isset($_POST['btnpost'])){
            $textpost = $_POST['textpost'];

            $query = "INSERT INTO `posts`( `post`) VALUES ('$textpost');";
            mysqli_query($conn,$query);
            echo "<div style='color: teal; background: ;  border-radius:10px;'>"." تم النشر بنجاح "."</div>";
            header('REFRESH:1;URL=timeline.php');

        
        }



        ?>
    </form>
            <!-- 1-1149071536211 -->
</body>
</html>