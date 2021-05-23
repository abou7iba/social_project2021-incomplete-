
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/usernav.css">
    <title>User Nav</title>
</head>
<body dir="rtl">
    <div class="action">
        <div class="usernav" onclick=" menuToggle();">
            <img src="img/me.jpg" alt="" srcset="">
        </div>
        <div class="menu">
            <h4>احمد ابوهيبه<br><span>مطور مواقع الويب</span></h4>
            <ul>
                <li><i class="fas fa-user-plus"></i><a href=""> الصفحه الشخصيه </a></li>
                <li><i class="fas fa-user-plus"></i><a href=""> تعديل الصفحه </a></li>
                <li><i class="fas fa-user-plus"></i><a href=""> مراحل التطوير </a></li>
                <li><i class="fas fa-user-plus"></i><a href=""> المهام اليوميه </a></li>
                <li><i class="fas fa-user-plus"></i><a href=""> الكورسات </a></li>
                <li><i class="fas fa-user-plus"></i><a href=""> تسجيل الخروج </a></li>
            </ul>
        </div>
    </div>
    
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu')
        toggleMenu.classList.toggle('active')
        }

    </script>
</body>
</html>
