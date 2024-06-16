<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['project_leader03_login'])) {
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
    <title>หัวหน้าโครงการ - KPI</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav class="sidebar close">
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
                        <a href="project_leader01.php">
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
                        <span class="text nav-text">หัวหน้าโครงการ<br>project_leader03</span>
                        <i class='bx bx-log-out icon' ></i>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">รายงาน</div>
        <h6>Home - รอบตรวจ</h6>
    </section>

    <script>
        const body = document.querySelector('body'),
              sidebar = body.querySelector('nav'),
              toggle = body.querySelector(".toggle");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Kanit", sans-serif;
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
            background-color: transparent;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
            padding-left: 15px;
            background-color: var(--primary-color);
        }

        .sidebar li a .icon {
            left: -80px;
        }

        .sidebar .menu-bar {
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
            font-weight: normal;
            color: #ffffff;
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
            background-color: #f0f8ff;
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

        .home h6{
            color: #778899;
            margin-left: 60px;
            font-size: 13px;
            font-weight: normal;
        }
    </style>
</body>
</html>