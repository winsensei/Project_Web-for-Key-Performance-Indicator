<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['project_leader01_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>

<?php
include("config/dbcon.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หัวหน้าโครงการ - KPI</title>
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
                        <a id="report-link" class="nav-link" href="project_leader01.php">
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

    <section class="home">
            <div class="report">
                <h4>เเผงควบคุม</h4>
                <a href="project_leader01.php" style="color: gray; text-decoration: none;">
                    <span>Home</span>
                </a>
                <span style="color: gray; margin-left:0px; font-size: 14px;"> - เเผงควบคุม</span>
                <h1>ยินดีต้อนรับเข้าสู่ระบบโครงการผู้สูงอายุ ม.พะเยา</h1>
            </div>
    </section>

    <section class="dashboard" style="display: none;">
    <div class="dashboard-content">
        <div class="report">
            <h4>รายงาน</h4>
            <a href="project_leader01.php" style="color: gray; text-decoration: none;">
                <span>Home</span>
            </a>
            <span style="color: gray; margin-left:0px; font-size: 14px;"> - รอบการตรวจ</span>
        </div>
        <div class="dashboard-content-box">
        <div class="form-outline">
        <div class="search-box">
            <i class='bx bx-search' style='font-size: 20px; color: #888888;'></i>
            <input type="text" id="getQuery" placeholder="ค้นหา">
            <span class="clear-search"><i class='bx bx-x'></i></span>
        </div>  
        </div>
            <div class="search-box">
                <i class='bx bx-search' style='font-size: 20px; color: #888888;'></i>
                <input type="text" placeholder="ค้นหา">  
            </div>
            <div class="search-box">
                <i class='bx bx-search' style='font-size: 20px; color: #888888;'></i>
                <input type="text" placeholder="ค้นหา">  
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>วันที่บันทึก</th>
                        <th>รอบการตรวจ</th>
                        <th>ข้อมูลทั่วไปเเละสุขภาพ<br>ทางกาย</th>
                        <th>ความสมบูรณ์ของเม็ด<br>เลือด (CBC)</th>
                        <th>สมรรถภาพทางกาย</th>
                        <th>ทักษะหลังเข้ารับการ<br>อบรมกับ UPILI</th>
                    </tr>

                    <tbody id="showdata">
                    <?php  
                        $sql = "SELECT * FROM users";
                        $query = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($query))
                        {
                        echo "<td><h6>".$row['date']."</h6></td>";
                        echo "<td><h6>".$row['round_no']."</h6></td>";
                        echo "<td><a href='project_leader01_tags01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>";
                        echo "<td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>";
                        echo "<td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>";
                        echo "<td><a href='project_leader01.php'><i class='bx bx-show' style='font-size: 24px; color: gray;'></i></a></td>"; 
                        echo "</tr>"; 
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php  
                $sql = "SELECT * FROM users";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($query))
                {
                echo "<td><h6 style='font-size: 16px; font-weight: normal;'>ทั้งหมด " . $row['id'] . " รายการ</h6></td>";
                } 
                ?>
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

        //กล่องค้นหา
        $('#getQuery').on("keyup", function() {
            var query = $(this).val().toLowerCase().trim();
            $.ajax({
                method: 'POST',
                url: 'searchajax.php',
                data: { query: query },
                success: function(response) {
                    $("#showdata").html(response);
                }
            });

            if ($(this).val().length > 0) {
                $('.clear-search').show();
            } else {
                $('.clear-search').hide();
            }
        });

        $('.clear-search').click(function() {
            $('#getQuery').val(''); 
            $(this).hide(); 
            $('#getQuery').keyup();
        });
    });
    </script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
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

        .nav-link a .icon {
            color: gray; 
        }

        .nav-link a .nav-text {
            color: gray; 
        }

        .nav-link.active {
            background-color: #573588;
            color: #ffffff;
        }

        .bottom-content li a{
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
            flex-direction: row; 
            flex-wrap: wrap; 
            justify-content: flex-start;
            align-items: center; 
            background-color: #ffffff;
            width: 93%;
            padding: 2rem;
            margin-left: 40px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .search-box-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative; 
            width: 240px;
            height: 45px;
            padding: 10px;
            background-color: #f3f6f9;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-right: 20px; 
            margin-bottom: 20px; 
        }

        .search-box input[type="text"] {
            flex: 1;
            border: none;
            outline: none;
            padding: 8px;
            font-size: 16px;
            color: #424242;
        }

        .clear-search {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            display: none; 
        }

        .clear-search i {
            color: #888888;
            font-size: 25px;
            border: 1px solid #888888; 
            padding: 5px; 
            border-radius: 50%; 
        }

        .search-box:hover .clear-search {
            display: block; 
        }

        .search-box button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 8px;
            cursor: pointer;
        }

        .table {
            width: 100%;
            overflow-x: auto; 
        }

        table {
            width: 100%;
            margin-top: 20px; 
            margin-bottom: 80px;
        }

        th, td {
            height: 70px;
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd; 
            font-weight: normal;
            border-right: 1px solid #ddd; 
        }

        th {
            background-color: #f5f5f5;
            font-size: 14px;
            font-weight: normal;
            color: #000000;
        }

        td {
            background-color: #ffffff;
            font-size: 14px;
            color: #424242;
        }
    </style>

</body>
</html>
