<?php
error_reporting(0);


$conn = mysqli_connect("localhost", "root", "", "admin");


if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo '';
}
$email = $_POST['email'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "select * from register where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count === 1) {
    if ($_POST['submit1']) {
        header('location:home1.php');
    }
} else if ($count === 0) {
    if ($_POST['submit1']) {
        header("location: login.php?error=Incorrect Email or Password");
    }
}

?>

<DOCTYPE html>
    <html>

    <head>
        <title>
            METRO
        </title>
        <style>
            * {
                padding: 0;
                margin: 0;
            }

            body {
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }

            h1 {
                color: blue;
            }

            .login {
                width: 380px;
                line-height: 200px;
                top: 20%;
                left: 35%;
                transform: translate(0);
                position: absolute;
                background: rgba(128, 85, 30, 0.692);
                overflow: hidden;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                border-radius: 25px;

            }


            .login form {
                padding: 0 40px;
            }

            .login h3 {
                font-size: 55px;
                text-transform: uppercase;
                left: 90px;
                top: -50px;
                position: relative;
                /* border-bottom: 1.5px solid black; */
            }

            .login p {
                font-size: 20px;
                margin: 15px 0;
            }

            .login input {
                font-size: 18px;
                width: 100%;
                padding: 9px 10px;
            }

            .form .txt_field {
                margin: 50px 0;
            }

            .error {
                color: red;
                position: absolute;
                top: -9px;
            }

            a1 {
                display: block;
                background: red;
                color: #fff;
                padding: 30px;
                cursor: pointer;
                text-decoration: none;
                width: 400px;
                text-align: center;
                border-radius: 10px;
                font-size: 20px;
                margin: 0 200px;
            }

            .home {
                display: block;
                line-height: 40px;
                margin: 30px 40px;
                width: 90px;
                background: rgba(128, 85, 30, 0.692);
                position: absolute;
                text-align: center;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                border-radius: 18px;
            }

            .home a {
                color: black;
                text-decoration: none;

            }

            .admin {
                display: block;
                line-height: 40px;
                margin: 30px 190px;
                position: absolute;
                width: 150px;
                background: rgba(128, 85, 30, 0.692);
                text-align: center;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
                border-radius: 18px;
            }

            .admin a {
                color: black;
                text-decoration: none;

            }

            .btn {

                background-color: cornflowerblue;
            }

            .submt {
                border-radius: 10px;
                position: absolute;
                top: 290px;
                width: 300px;
            }

            .submt input {
                background-color: skyblue;
                border-radius: 25px;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            }

            .eml {
                top: 35px;
                position: absolute;

            }

            .emlbox {
                position: absolute;
                top: 150px;
                width: 300px;
            }

            .emlbox input {
                background-color: lightgray;
            }


            .pswd {
                position: absolute;
                top: 115px;
            }

            .psswrdbox {
                position: absolute;
                top: 230px;
                width: 300px;
            }

            .psswrdbox input {
                background-color: lightgray;
            }

            .newaccount {
                top: 60px;
                position: relative;
            }

            .solid {
                border-bottom: 1.5px solid black;
                position: absolute;
                width: 380px;
                left: 0px;
                top: 90px;

            }
        </style>
    </head>

    <body style="background-color:bisque;
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">
        <div class="home">
            <a href="index.php" name="home">HOME</a>
        </div>
        <div class="admin">
            <a href="Metro admin\admin1.php" name="metro">ADMIN LOGIN</a>
        </div>

        <div class="login">
            <h3>Login</h3>

            <form action='#' method="post">
                <div class="solid"></div>

                <div class="eml">
                    <label for="email">Email</label>
                </div>

                <div class="emlbox">
                    <input type="text" name="email" placeholder="User Email" id="email" required />
                </div>

                <div class="pswd">
                    <label for="password">Password</label>
                </div>

                <div class="psswrdbox">
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

                <div class="newaccount">
                    <a href='register.php'>create new account</a>
                </div>



        </div>

    </body>

    </html>