<?php
    require_once("include/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet">
    <style>

    </style>
    <link rel="stylesheet" href="css/market.css">
    <title>Market</title>
</head>
<body dir="rtl">
    <center><br>
    <h5>داعـم ماركت <span> <a href="">&#x1f6d2 </a> </span><br> اسهل واسرع اونلاين ماركت في <span style="color:red;">مصر</span> &#128640  </h5><br>
    <div class="container">
        <form action="" method="post" >
        <input type="text" placeholder="ادخل اسمك هنا من فضلك ..."  class="form-control" name="txtname" value="<?php echo isset($_POST['txtname'])?$_POST['txtname']:'' ?>" required>
        <br><input type="text" maxlength="11" minlength="11" placeholder="ادخل رقمك هنا من فضلك ..."  class="form-control" name="txtnum" value="<?php echo isset($_POST['txtnum'])?$_POST['txtnum']:'' ?>" required>
        <br>
        <select name="department" id=""  class="form-control" >
            <option value="a"  style="display: none;">-- الصنف -- </option>
            <option value="a">a</option>
        </select>
        <br>
        <select name="type" id=""  class="form-control">
            <option value="a" style="display: none;">-- النوع --</option>
            <option value="a">a</option>

        </select>
        <br>
        <select name="Quanrity" id=""  class="form-control">
            <option value="a" style="display: none;">-- الكميه --</option>
            <option value="a">1</option>
            <option value="b">2</option>
            <option value="c">3</option>
            <option value="d">4</option>
            <option value="f">5</option>
        </select>
        <br>
        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="xvsdvsdv">

        </textarea>
        <br>
        <button type="submit" class="btn btn-primary btn-block">طلب الأن</button><br>
        <?php
        
        ?>
        <h3 style="color:red;"> يتم طلب العنوان مع تأكيد الطلب هاتفيا</h3>
        </form>
    </div>
    </center>

            <!-- 1-1149071536211 -->
</body>
</html>