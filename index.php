<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - KPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="background">
            <img src="image/logo_up_big_size.png" width="38%" height="33%">
            <h1>โครงการผู้สูงอายุ ม.พะเยา</h1>
        </div>
        <form action="signup_db.php" method="post" class="signup-form">
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
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <div class="header">
                <h6>สมัครสมาชิก</h6>
            </div>
            <div class="box">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control input-lg" id="firstname" name="firstname" aria-describedby="firstname" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-6">
                        <label for="lastname" class="form-label">สกุล</label>
                        <input type="text" class="form-control input-lg" id="lastname" name="lastname" aria-describedby="lastname" placeholder="สกุล">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control input-lg" id="email" name="email" aria-describedby="email" placeholder="อีเมล">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control input-lg" id="password" name="password" placeholder="รหัสผ่าน">
            </div>
            <div class="mb-4">
                <label for="c_password" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control input-lg" id="c_password" name="c_password" placeholder="ยืนยันรหัสผ่าน">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">สมัครสมาชิก</button>
            
            <div class="or-section">
                <hr class="hr-line">
                <span class="or-text">หรือ</span>
                <hr class="hr-line">
            </div>
            
            <div class="bth">
                <a href="signin.php" class="btn btn-primary-submit">เข้าสู่ระบบ</a>
            </div>

        </form>
    </div>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        * {
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
            height: 105vh;
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
        .header h6 {
            font-weight: normal;
            font-size: 20px;
            margin-left: 230px;
            margin-top: 15px;
            margin-bottom: 30px;
            font-size: 18px;
        }
        .mb-3, .mb-4 {
            width: calc(100% - 240px);
            margin-left: 230px;
        }
        .box .row {
            width: calc(100% - 230px);
            margin-left: 230px; 
        }
        .box .col-md-6 {
            padding-left: 0;
        }
        .form-control.input-lg {
            width: 100%; 
            height: 50px;
            font-size: 16px; 
            padding: 10px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 10px;
            margin-bottom: 10px; 
        }
        .btn-primary {
            width: calc(100% - 230px); 
            height: 50px;
            background-color: rgb(87, 53, 136);
            border-radius: 10px;
            margin-left: 230px;
        }
        .or-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0; 
            width: calc(100% - 230px);
            margin-left: 230px;
        }
        .hr-line {
            flex: 1;
            border: 0;
            border-top: 3px solid #000;
            margin: 0 10px;
            border-radius: 5px;
        }
        .or-text {
            font-size: 16px;
            font-weight: normal;
            color: #000;
            padding: 0 10px;
        }
        .bth a{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .btn-primary-submit {
            width: calc(100% - 230px);
            height: 50px;
            background-color: #fff;
            border-radius: 10px;
            margin-left: 230px;
            color: #000;
            border: 1px solid rgba(0, 0, 0, 0.2);
        }
    </style>
</body>
</html>
