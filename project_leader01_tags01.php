<?php 
    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['project_leader01_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน - KPI</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="image/logo_up_big_size.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">โครงการผู้สูงอายุ ม.พะเยา</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a id="report-link" class="nav-link active" href="project_leader01.php">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">รายงาน</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li>
                    <a href="signin.php">
                        <img src="image/user.png" alt="">
                        <span class="text nav-text">หัวหน้าโครงการ<br>project_leader01</span>
                        <i class='bx bx-log-out icon'></i>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <section class="dashboard">
    <div class="dashboard-content">
        <div class="report">
            <h4>รายงาน</h4>
            <a href="project_leader01.php" style="color: gray; text-decoration: none;">
                <span>Home</span>
            </a>
            <span style="color: gray; margin-left:0px; font-size: 14px;"> - รอบการตรวจ - ข้อมูลทั่วไปเเละสุขภาพทางกาย</span>
        </div>

        <div class="back-button-container">
            <button onclick="goToPage()">ย้อนกลับ</button>
        </div>

        <div class="dashboard-content-box">
            <img src="image/logo_up_big_size.png" width="10%" height="10%">
            <h3>คณะสหเวชศาสตร์</h3>
            <h4>ผู้เข้าร่วมทั้งหมด 1 คน</h4>
            <span>ส่วนที่ 1 ข้อมูลทั่วไป</span>
        </div>
    </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const toggle = document.querySelector('.toggle');
        const reportLink = document.getElementById('report-link');
        const homeSection = document.querySelector('.home');
        const dashboardSection = document.querySelector('.dashboard');

        toggle.addEventListener('click', function() {
            sidebar.classList.toggle('close');
        });

        reportLink.addEventListener('click', function(event) {
            event.preventDefault();
            reportLink.classList.add('active');
            homeSection.style.display = 'none';
            dashboardSection.style.display = 'block';
        });
    });

    //ปุ่มย้อนกลับ
    function goToPage() {
            window.location.href = 'project_leader01.php';
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Kanit", sans-serif;
            font-weight: normal;
        }

        :root {
            --body-color: #E4E9F7;
            --sidebar-color: #fff; 
            --primary-color: #573588;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #fff; 
            --tran-03: all 0.3s ease;
            --tran-05: all 0.5s ease;
        }

        body {
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 350px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
            z-index: 100;
        }

        .sidebar.close {
            width: 100px;
        }

        .sidebar li {
            height: 50px;
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .bottom-content li {
            height: 70px;
        }

        .sidebar header .image,
        .sidebar .icon {
            min-width: 60px;
            border-radius: 6px;
        }

        .sidebar .icon {
            min-width: 60px;
            border-radius: 6px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .sidebar .text,
        .sidebar .icon {
            color: var(--text-color);
            transition: var(--tran-03);
        }

        .sidebar .text {
            font-size: 14px;
            font-weight: normal; 
            white-space: nowrap;
            margin-right: 30px;
            opacity: 1;
        }

        .sidebar.close .text {
            opacity: 0;
        }

        .sidebar header {
            position: relative;
        }

        .sidebar header .image-text {
            display: flex;
            align-items: center;
        }

        .sidebar header .logo-text {
            display: flex;
            flex-direction: column;
        }

        header .image-text .name {
            margin-top: 2px;
            font-size: 18px;
            font-weight: normal; 
            color: #573588;
        }

        .sidebar header .image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar header .image img {
            width: 40px;
        }

        .sidebar header .toggle {
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            transition: var(--tran-05);
        }

        .sidebar.close .toggle {
            transform: translateY(-50%) rotate(0deg);
        }

        .sidebar .menu {
            margin-top: 40px;
        }

        .sidebar li a {
            list-style: none;
            height: 100%;
            background-color: #fff; 
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
            padding-left: 15px;
            color: #573588; 
        }

        .nav-link .icon {
            color: gray; 
        }

        .nav-link .nav-text {
            color: gray; 
        }

        .nav-link.active {
            background-color: #573588;
            color: #ffffff;
        }

        .bottom-content li a {
            background-color: #573588; 
        }

        .sidebar li a:hover {
            background-color: #573588; 
            color: #ffffff; 
        }

        .menu-bar {
            height: calc(100% - 55px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: scroll;
        }

        .menu-bar::-webkit-scrollbar {
            display: none;
        }

        .bottom-content img {
            margin-right: 60px;
        }

        .bottom-content li a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .bottom-content li a .text {
            margin-left: 10px; 
            font-size: 14px;
        }

        .bottom-content li a i{
            margin-left: 50px;
        }

        .bottom-content li a img {
            margin-right: 10px;
        }

        .home {
            position: absolute;
            top: 0;
            left: 350px;
            height: 100vh;
            width: calc(100% - 350px);
            background-color: #f3f6f9;
            transition: var(--tran-05);
        }

        .home .text {
            margin-top: 10px;
            font-size: 18px;
            font-weight: normal; 
            color: #000000;
            padding: 12px 60px;
        }

        .sidebar.close ~ .home {
            left: 100px;
            height: 100vh;
            width: calc(100% - 100px);
        }   

        .dashboard-content {
            position: absolute;
            top: 0;
            left: 350px;
            height: 100vh;
            width: calc(100% - 350px);
            background-color: #f3f6f9;
            transition: var(--tran-05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); 
        }

        .sidebar.close ~ .dashboard .dashboard-content {
            left: 100px;
            width: calc(100% - 100px);
        }

        .home .report h1{
            margin-top: 25px;
            margin-left: 40px;
            font-weight: normal;
            font-size: 20px;
        }

        .home .report h4,
        .dashboard .dashboard-content .report h4{
            font-weight: normal;
            margin-top: 20px;
            margin-bottom: 10px;
            margin-left: 40px;
        }

        .home .report span,
        .dashboard .dashboard-content .report span{
            margin-left: 40px;
        }
        /* หน้ารายงาน */
        .dashboard-content-box {
            display: flex;
            flex-direction: column; 
            flex-wrap: wrap; 
            justify-content: center;
            align-items: center; 
            background-color: #ffffff;
            width: 93%;
            padding: 2rem;
            margin-left: 40px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .back-button-container {
            text-align: right; 
            margin-right: 40px; 
            margin-top: 20px; 
        }

        button {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.4s ease;
            margin-top: 10px;
        }

        button:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        button:active {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .dashboard-content-box img{
            margin-top: 10px;
        }

        .dashboard-content-box h3{
            color: #573588;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .dashboard-content-box h4{
            color: #000000;
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 50px;
        }

        .dashboard-content-box span{
            color: #573588;
            font-size: 16px;
            text-align: left; 
            align-self: flex-start; 
            margin-top: 18px; 
        }
    </style>

</body>
</html>
