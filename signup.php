<?php  
    session_start();
    if(isset($_SESSION['id']))
        header('LOCATION: timeline.php');
    include_once ('include/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/signup.css"">
    <title>حساب جديد</title>
</head>
<body dir="rtl">
    <div class="signup" >
    <form action="" method="post" >
        <a href=""><img src="img/me.jpg" alt=""></a>
        <h1>تسجيل حساب جديد </h1>
        <p>التسجيل مجاني - سهل - سريع &#128640</p>
        <input type="text" placeholder="الاسم الاول" value="<?php echo isset($_POST['fname'])?$_POST['fname']:'' ?>" name="fname" required >
        <input type="text" placeholder="الاسم الثاني" value="<?php echo isset($_POST['lname'])?$_POST['lname']:'' ?>" name="lname" required>
        <input type="email" placeholder="الأيميل" value="<?php echo isset($_POST['email'])?$_POST['email']:''  ?>" name="email" required>
        <input type="password" placeholder="الباسورد" value="<?php echo isset($_POST['password'])?$_POST['password']:'' ?>" name="password" required>
        <input type="password" placeholder="البين كود" value="<?php echo isset($_POST['pin'])?$_POST['pin']:'' ?>" name="pin" required>
        <input type="submit" value="تسجيل" placeholder="" name="btnsign" >
        <?php
        if(isset($_POST['btnsign'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password']; 
            $pin = $_POST['pin'];

            $query = "INSERT INTO `users`( `fname`, `lname`, `email`, `password`, `pin`) VALUES ('$fname','$lname','$email','$password','$pin');";
            mysqli_query($conn,$query);
                
            }


        ?>
       <a href="login.php">لدي حساب بالفعل</a>

    </form>
    </div>
</body>
</html>
