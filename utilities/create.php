<?php
    include_once("config.php");

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $level = mysqli_real_escape_string($conn, $_POST['level']);
        $school_address = mysqli_real_escape_string($conn, $_POST['school_address']);
        $home_address = mysqli_real_escape_string($conn, $_POST['home_address']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $unit = mysqli_real_escape_string($conn, $_POST['unit']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $zone = mysqli_real_escape_string($conn, $_POST['zone']);

        if(empty($name) || empty($email) || empty($phone) || empty($faculty) || empty($dept) || empty($level) || empty($school_address) ||empty($home_address) || empty($status) || empty($unit) || empty($dob) || empty($sex)) {
            echo "<script type='text/javascript'>
            alert('One or more fields are missing!');
            window.location= '../home.php';
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO `users` (`id`, `name`, `email`, `phone`, `faculty`, `dept`, `level`, `school_address`, `home_address`, `unit`, `status`, `dob`, `sex`, `zone`) 
            VALUES (NULL, '$name', '$email', '$phone', '$faculty', '$dept', '$level', '$school_address', '$home_address', '$unit', '$status', '$dob', '$sex', '$zone');";
            mysqli_query($conn, $sql);
            echo "<script type='text/javascript'>
            alert('Member Added!');
            window.location= '../home.php';
            </script>";
            exit();
        }
    } else {
        header('Location: ../home.php');
        exit();
    }
