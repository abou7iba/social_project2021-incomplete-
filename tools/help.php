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
    <link rel="stylesheet" href="../css/timeline.css">
    <title> طرق التنفيذ </title>
</head>
<body dir="rtl">

<div class="wrapper">
        <div class="row row1">
            <section>
                <div class="details">
                    <?php 
                                $sd = mysqli_query($conn,"SELECT * FROM todolist WHERE id='$helpid' ");
                                while ($row = mysqli_fetch_array($sd)){
                                    $task = $row['task'];
                                    $note = $row['note'];
                                    $time = $row['time'];
                                    $date = $row['date'];
                                    $finish = $row['finish'];
                                    $desproblem = $row['desproblem'];
                           } 
              
                    ?>
                    <!-- <span class="title"><a href="profile.php?=id=<?php echo $id; ?>""><img src="img/me.jpg" alt=""><br><span><?php  ?></span></span></a> -->
                    <span class="date"><i class="fas fa-history"></i> <br><?php echo '  بداية : '.$date;?>  </span>
                    <span class="date"><i class="fas fa-history"></i> <br><?php echo ' الوقت المتبقي  : '. $finish;?>  </span>
                    <span class="date"><i class="fas fa-history"></i> <br><?php echo '  انتهاء : '. $finish;?>  </span>
               </div>
                <p><?php echo "<div style='color:#000;'> التحدي     : </div>" . $task  ."<br><br> <div style='color:#000;'>ملاحظات : </div>" . $note;?> </p>

                <div class="bottom">
                    <a href="#" class="support"> مساعدة <i class="fas fa-hand-holding-heart"></i></a>
                    <a href="#"  class="share" >مشاركه <i class="fas fa-share-alt"></i></a>
                </div>
            </section>
            <br>
        </div>

        <div class="comment">
        
                <div class="add-comment">
                <form action="" method="post">
                    <input type="text" class="add-co-inp" placeholder="اضافة مساعدة او طريقة تنفيذ">
                    <input type="submit" value="ارسال">
                </form>

                </div>
                <div class="show-comment">
                    <!-- <span>name</span><br>
                    <span>comment</span> -->
                </div>
            </div>

    </div> 
    </div>
    </div>
</body>
</html>