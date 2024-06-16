<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - KPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="background">
            <img src="image/logo_up_big_size.png" width="38%" height="35%">
            <h1>โครงการผู้สูงอายุ ม.พะเยา</h1>
        </div>
        <form action="signin_db.php" method="post" class="signin-form">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
                <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control input-lg" name="email" aria-describedby="email" placeholder="อีเมล">
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control input-lg" name="password" placeholder="รหัสผ่าน">
            </div>
            <button type="submit" name="signin" class="btn btn-primary">เข้าสู่ระบบ</button>
            <div class="member">
            <span>สำหรับลงทะเบียนผู้เก็บข้อมูล</span>
            <a href="index.php" style="color: purple;">สมัครสมาชิก</a>
            </div>
        </form>
    </div>
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        font-family: "Kanit", sans-serif;
    }
    .container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #fff;
        padding: 0;
        margin: 0;
    }
    .background {
        width: 45%;
        background-color: rgb(87, 53, 136);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100vh;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        padding: 20px;
        box-sizing: border-box;
    }
    .background img {
        margin-top: -150px;
        margin-bottom: 70px;
    }
    .background h1 {
        color: #f0f0f0;
        font-size: 45px;
        font-weight: normal;
    }
    .signin-form {
        width: 40%;
        margin-left: auto;
        margin-right: -20px;
        margin-top: -80px;
    }
    .mb-3 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 70px;
        width: 100%;
    }
    .form-control.input-lg {
        width: calc(100% - 130px); 
        height: 80px;
        font-size: 16px; 
        padding: 10px;
        background-color: #f0f0f0;
        border: none;
        border-radius: 10px;
        margin-bottom: 10px; 
    }
    .btn-primary {
        width: calc(100% - 130px); 
        height: 60px;
        background-color: rgb(87, 53, 136);
        border-radius: 10px;
    }
    .member {
        margin-top: 20px;
        margin-left: 65px;
    }
    </style>

</body>
</html>
