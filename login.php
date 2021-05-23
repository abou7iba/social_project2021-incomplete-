<?php
    session_start();
    if(isset($_SESSION['id']))
        header('LOCATION: timeline.php');
    else
    
    include_once 'include/db.php';

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
    <link rel="stylesheet" href="css/login.css"">
    <title>تسجيل الدخول</title>
</head>
<body dir="rtl">
    <div class="signup" >
    <form action="" method="post" >
    <a href=""><img src="img/me.jpg" alt=""></a>
        <h1>تسجيل الدخول</h1>
        <br>
        <input type="email" placeholder="الأيميل او أسم المستخدم " name="email" >
        <input type="password" placeholder=" البين كود او الباسورد" name="pass" >
        <input type="checkbox" name="remember" id=""> تذكرني
        <input type="submit" value="دخول" placeholder="" name="btnlog" >
        <?php
        if(isset($_POST['btnlog'])){
            $email  = $_POST['email'];
            $pass   = $_POST['pass'];
        
            $query  = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
            $result =  mysqli_query($conn, $query);
            $row    =  mysqli_fetch_assoc($result);
            if(in_array($email,$row) && in_array($pass,$row)){
                echo "<div style='color:#fff; background: teal;  border-radius:10px;'>"." اهلا يا صديقي بعودتك جاري تسجيل الدخول ..."."</div>";
                $_SESSION['id']  = $row['id'];
                if($_POST['remember'] == true){         
                    $cookie_name = "id";
                    $cookie_value = $row['id'];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 30), "/"); // 86400 = 1 day
                }
                header('REFRESH:1;URL=timeline.php');
            }else{
                echo "<div  style='color:#fff; background: e40017;  border-radius:10px;>"."من فضلك تأكد من الأيميل والباسورد وأعادة المحاوله"."</div>";
                header('REFRESH:1;URL=login.php');
            }
        }

        ?>
    <p>Developed By abou7iba.com</p>
</form><br>
    <a href="repass.php">نسيت كلمة السر ؟</a>
    <span> &nbsp;&nbsp;او &nbsp;&nbsp;</span>
    <a href="signup.php ">تسجيل حساب جديد </a>
    </div>
</body>
</html>
<!-- <?php include_once 'headerb.html'; ?> -->