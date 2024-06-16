<?php 
session_start();
require_once 'config/db.php';

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: signin.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: signin.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: signin.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: signin.php");
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                if ($email == $row['email']) {
                    if (password_verify($password, $row['password'])) {
                        if ($row['urole'] == 'user') {
                            $_SESSION['user_login'] = $row['id'];
                            header("location: user.php");
                        } elseif ($row['urole'] == 'project_leader01') {
                            $_SESSION['project_leader01_login'] = $row['id'];
                            header("location: project_leader01.php");
                        } 
                        elseif ($row['urole'] == 'project_leader02') {
                            $_SESSION['project_leader02_login'] = $row['id'];
                            header("location: project_leader02.php");
                        } 
                        elseif ($row['urole'] == 'project_leader03') {
                            $_SESSION['project_leader03_login'] = $row['id'];
                            header("location: project_leader03.php");
                        } 
                        elseif ($row['urole'] == 'project_leader04') {
                            $_SESSION['project_leader04_login'] = $row['id'];
                            header("location: project_leader04.php");
                        } 
                        elseif ($row['urole'] == 'project_leader05') {
                            $_SESSION['project_leader05_login'] = $row['id'];
                            header("location: project_leader05.php");
                        } 
                        elseif ($row['urole'] == 'executive') {
                            $_SESSION['executive_login'] = $row['id'];
                            header("location: executive.php");
                        } 
                        elseif ($row['urole'] == 'super_admin') {
                            $_SESSION['super_admin_login'] = $row['id'];
                            header("location: super_admin.php");
                        } 
                        else {
                            $_SESSION['user_login'] = $row['id'];
                            header("location: user.php");
                        }
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านผิด';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = 'อีเมลผิด';
                    header("location: signin.php");
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("location: signin.php");
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
