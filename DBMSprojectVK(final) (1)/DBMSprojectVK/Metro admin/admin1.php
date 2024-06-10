<?php

error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo '';
}
$id = $_POST['id'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$id = stripcslashes($id);
$password = stripcslashes($password);
$id = mysqli_real_escape_string($conn, $id);
$password = mysqli_real_escape_string($conn, $password);

$sql = "select * from login where id = '$id' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count === 1) {
    if ($_POST['submit1']) {
        header('location:adminhome.php');
    }
} else if ($count === 0) {
    if ($_POST['submit1']) {
        header("location: admin1.php?error=Incorrect Id or Password");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>admin</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        h1 {
            color: blue;
        }

        .login {
            width: 400px;
            padding: 120px 0px;
            top: 50%;
            right: 19%;
            transform: translate(-50%, -50%);
            position: absolute;
            background: white;
            border-radius: 25px;
            background: khaki;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);

        }

        .solid {
            top: -25px;
            position: relative;
            border-bottom: 1.5px solid black;
        }

        .login form {
            padding: 80px 40px;
            box-sizing: border-box;
        }

        .login h3 {
            font-size: 45px;
            text-align: center;
            text-transform: uppercase;
            position: absolute;
            top: 23px;
            left: 60px;
        }

        .login p {
            font-size: 20px;
            margin: 15px 0;
        }

        .login input {
            font-size: 16px;
            width: 100%;
            padding: 10px 18px;
            top: 50px;
        }

        .form .txt_field {
            margin: 60px 0;
        }

        .error {
            color: red;
            position: absolute;
            top: 95px;
        }

        .admn {
            top: 145px;
            position: absolute;
            width: 280px;
        }

        .pswd {
            position: absolute;
            top: 230px;
            width: 280px;
        }

        .submt {
            position: absolute;
            top: 320px;
            width: 320px;
            left: 40px;

        }

        .submt input {
            border-radius: 20px;
            background-color: skyblue;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
</head>

<body style="background : skyblue;
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">
    <div class="login">
        <h3>Admin Login</h3>
        <div class="solid"></div>
        <form action='#' method="post">
            <div class="admn">
                <label for="id">ADMIN ID</label>
                <input type="text" name="id" placeholder="Id" id="id" required />
            </div>

            <div class="pswd">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password" required />
            </div>

            <div class="submt">
                <input type="submit" name="submit1" value="Login">
            </div>

            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php }
            ?>



    </div>
</body>

</html>