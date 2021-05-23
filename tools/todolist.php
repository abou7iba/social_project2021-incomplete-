<?php
    $errors = "";
    require_once("../include/db.php");
    session_start();
    $my_id = $_COOKIE['id'];
    if(isset($_SESSION['id']))
        echo '';
    else
        header('LOCATION: ../signup.php');
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
    <title>المهام</title>
</head>
<body dir="rtl">
    <div class="page">
         <div class="heading">
        <h6>قال تعالي : </h6>
        <p>[وَأَنْ لَيْسَ لِلإِنسَانِ إِلَّا مَا سَعَى ۝ وَأَنَّ سَعْيَهُ سَوْفَ يُرَى ۝ ثُمَّ يُجْزَاهُ الْجَزَاءَ الأَوْفَى]</p>
        <h6>صدق الله العظيم</h6>
        <h3> اضافة تحدي ونجاح جديد &#9889; </h3>
        <h5>داعم | هيساندك وقت الشده &#128170;</h5>

        </div>
        <div class="add">



        <form action="" method="post">
        <input type="text" placeholder="التحدي" name="task">
        <input type="text" name="note" id="" placeholder="ملاحظات" class="addnote">
        <input type="text" name="note" id="" placeholder="المشاكل اللي هتواجهك " class="addnote">
        <input type="date" name="finish">
        <input type="submit" value="اضافه  &#128293;" name="btnadd" class="publish">
        <?php

        if(isset($_POST['btnadd'])){
            $task = $_POST['task'];
            $note = $_POST['note'];
            $finish = $_POST['finish'];
            

            if(empty($task)){
                $errors = "<div class='empty'>لا يمكن ترك المربع فارغا  </div>";
            }else{
                $query = "INSERT INTO todolist( task, note, finish, user_id ) VALUES ('$task','$note', '$finish', '$my_id')";
                mysqli_query($conn,$query);
                header("location: todolist.php");
            }

        }
        $res = mysqli_query($conn, "SELECT * FROM todolist  WHERE user_id='$my_id' ORDER BY finish DESC");
        if(isset($_GET['del_task'])){
            $de_id = $_GET['del_task'];
            mysqli_query($conn, "DELETE FROM todolist WHERE id=$de_id");
            header("location: todolist.php");
        }
        ?>

        </form>
        </div>
        <!-- table -->
        <div class="content">
        <table class="table">

        <thead>
            <th id="num">&#128467;</th>
            <th class="task">&#128161;</th>
            <th id="note">&#128221;</th>
            <th id="time">&#8986; </th>
            <th id="date">&#128197;</th>
            <th id="ago">&#8987;</th>
            <th id="ago">&#10067;</th>
            <th id="ago">&#128064;</th>
            <th class="del"> &#10060;</th>
        </thead>

        <tbody>
        <tr>
        <div class="heading">
        <h3>قائمة التحديات &#128221; </h3>

        </div>

        <?php 
        $i = 1;
        while ($row = mysqli_fetch_array($res)){
            // from database
            $datenow = $row['date'];
            $finishat = $row['finish']; 
            ?>
            <td id="num" data-label="&#128204;"><?php echo $i;?></td>
            <td class="task" data-label="&#128161;"><?php echo $row['task']?></td>
            <td id="note" data-label="&#128221;"><?php echo $row['note']?></td>
            <td id="time" data-label="&#8986;"><?php echo $row['time']?></td>
            <td id="date" data-label="&#128197;" ><?php echo $datenow;?></td>

            <td id="date"  data-label=" &#8987;"><?php

            // Change to time 
            $exp = strtotime($finishat);
            $td = strtotime($datenow);
            // If Con
            if($td>$exp){
                echo "<div id='done'> تم انتهاء المدة </div>";
            }else{
                echo " <div id='now'> جاري </div>" . " هتنتهي في : ". $finishat;

            }?></td>
            <td id="date" data-label="&#10067;" >
                <a href="help.php?id=<?php echo $row['id'];?>">طلب مساعدة </a>
            </td>
            <td id="date" data-label="&#128064;" >
                <a href="suggestion.php?id=<?php echo $row['id'];?>">عرض الحلول</a>
            </td>

            <td class="btn" data-label="&#10060;">
                <a href="todolist.php?del_task=<?php echo $row['id']?>" class="btn">&#10134; </a>
            </td>
            </tr>
        </tbody>

        <?php $i++;} ?>
    </table>
    <center>
    <h5>Developed By abou7iba.com</h5><br>
    </center>
        </div>
    </div>

            <!-- 1-1149071536211 -->
</body>
</html>