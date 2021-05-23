<?php
    session_start();
    $id = $_COOKIE['id'];
    if(isset($_SESSION['id']))
        echo "";
    else
        header('LOCATION: login.php');
    include_once 'include/db.php';  
?>
<center>
 <?php
        $sd = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id' ");
        while ($row = mysqli_fetch_array($sd)){
        $idimg = $row['id'];
        $extimg = $row['ext'];
        $img = 'user_pic/'.$idimg.'.'.$extimg;
        ?>
        <a href="profile.php?=id=<?php echo $id; ?>""><img src="<?php echo $img; ?>" alt=""><br><span><?php echo $row['fname']. " ". $row['lname']?> <?php echo " | ".  $row['position']?> </span></a><br>
        <?php } ?>
        </center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
    <style>
    *{
    font-family: 'Changa', sans-serif;

    }
    img{
        width: 100px;
        height: 100px;
    }
 hr{
    text-align: center;
    border:0.2px solid #1a508b;
}
 a{
    text-decoration: none;
    color: #1a508b;
}
a:hover{
    text-decoration: none;
    color: #00af91;
}
h3{
    color: #1a508b;
    font-weight: 600;   
}
p{
    color: #1a508b;
    font-weight: 600;
}
input[type = 'text'],input[type = 'password'],input[type = 'email'], input[type = 'date']{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center; 
    border: 2px solid #ddd;
    padding: 10px 15px ;
    width: 70%;
    outline: none;
    color: #1a508b;
    font-weight:600;
    border-radius: 10px;
    transition: 0.25s;
    font-family: 'Changa', sans-serif;
}
input[type = 'text']:focus,  input[type = 'password']:focus, input[type = 'email']:focus
{
    border-color:#1a508b;
    font-weight:600;
    font-family: 'Changa', sans-serif;
    
}

 input[type = 'submit']{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center; 
    border: 2px solid #1a508b;
    padding: 10px 20px ;
    width: 25%;
    outline: none;
    color: #1a508b;
    border-radius: 10px;
    font-weight:600;
    transition: 0.25s;
    cursor: pointer;
    font-family: 'Changa', sans-serif;
}
input[type = 'submit']:hover{
    background: #00af91;
    border: 2px solid #00af91;

    color: #fff;
}



    </style>
    <title>Edit Profile</title>
</head>
<body dir="rtl" >
<center>
        <a href="signup.php">#داعم</a>
        <a href="Market.php">#الدكان</a>
        <a href="job.html">#الوظائف</a>
        <a href="profile.php?=id=<?php echo $id; ?>">#صفحتي</a>
        <a href="todolist.php">#المهام</a>
        <a href="courses.html">#الكورسات</a>
        <a href="editpro.php?=id=<?php echo $id; ?>">#تعديل</a>
        <br>
        </center>
    <!-- Upload Pic -->
    <form action="" method="post" class="post">
        <?php
        $sd = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id' ");
        while ($row = mysqli_fetch_assoc($sd)){?>
        <hr>
        <center>
        <h3> المعلومات الأساسية : </h3>
        <input type="text" name="fname" value="<?php echo $row['fname'] ?>">
        <input type="text" name="lname" value="<?php echo $row['lname'] ?>">
        <input type="text" name="email" value="<?php echo $row['email'] ?>">
        <input type="password" name="pin" value="<?php echo $row['password'] ?>">
        <input type="password" name="password" value="<?php echo $row['pin'] ?>">
        <input type="text" name="position" value="<?php echo $row['position'] ?>">
        <input type="date" name="birthday" value="<?php echo $row['birthday'] ?>">
      <?php 
                $gender = $row['gender'];
                $gm = '';
                $gf = '';
            if($gender =='male'){
                $gm = 'checked';
                $gf = '';
            }elseif($gender=='female'){
                $gm = '';
                $gf = 'checked';
            }
            
            ?>
        النوع :  
        <input type="radio" name="gender" value="male" <?php echo $gm; ?>> مذكر 
        <input type="radio" name="gender" value="female" <?php echo $gf; ?> >مؤنث <br>

       <input type="submit" value="تعديل" name="editbtn">
        <?php } ?>
        <?php 
        if(isset($_POST['editbtn'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $pin = $_POST['pin'];
            $gender = $_POST['gender'];
            $position = $_POST['position'];
            $bir_thday = $_POST['birthday'];


            $sqledit = "UPDATE users SET fname = '$fname' , lname = '$lname' , email = '$email' , password = '$password' , pin = '$pin' , gender = '$gender' , position= '$position', birthday= '$bir_thday' WHERE id='$id' ";
            mysqli_query($conn,$sqledit);
            header('REFRESH:1;URL=editpro.php');
        }

        ?>
        </center>
    </form>
    <hr>
    <form action=""  method="post" enctype="multipart/form-data">
<center>
            <h3>  اختار صورتك الشخصية :  </h3>
   <input type="file" name="user_pic" id=""><br>

    <input type="submit" value="رفع الصوره" name="upload">
    <?php 
        if(isset($_POST['upload'])){
            // path
            $current_path = getcwd();
            $path = $current_path."/user_pic/";
            // file path ext
            $fpath=$path.$_FILES['user_pic']['name'];
            $path_parts = pathinfo($fpath);
            $ext =  $path_parts['extension'];
            $allowed_ext = array('jpg','JPG','png','PNG','gif','GIF','bmp','BMP','jpeg','JPEG');
            // Condition for file path ext
                if(in_array($ext,$allowed_ext)){

                    $_FILES['user_pic']['name'] = $_COOKIE['id'].".".$ext;

                    $cid = $_COOKIE['id'];
                    $sql = "UPDATE `users` SET `ext`='$ext' WHERE `id`='$cid' ";
                    mysqli_query($conn,$sql); 

                    move_uploaded_file($_FILES['user_pic']['tmp_name'],$path.$_FILES['user_pic']['name']);
                    echo "<h5>تم رفع الصوره</h5>";
                    header('REFRESH:1;URL=editpro.php');

                }
                else
                {
                    echo "<h5>يمكنك رفع الصور فقط ولا يسمح بملفات  بصيغ اخري </h5>";
                    echo "<h5>الصيغ المسموح بها : jpeg , jpg - png - gif - bmp</h5>";                    
                }
    }

    ?>
    </center>
    </form>
    <hr>
</body>
</html>