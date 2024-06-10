<?php
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo 'database not selected';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $update = true;

    $result = $conn->query("SELECT * FROM passenger WHERE reg_id='$id'");

    $items = $result->fetch_array();
    $pass = $items['pass_id'];
    $name = $items['passname'];
    $email = $items['email'];
    $gender = $items['gender'];
    $age = $items['age'];
    $phone = $items['phone'];
}



?>
<!DOCTYPE html>
<html>
<div class="user">
    <header class="user__header">
        <h1 class="user__title">PROFILE</h1>
        <style>
            
            $font-family: "Roboto";
            $font-size: 14px;

            $color-primary: #ABA194;
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: $font-family;
                font-size: $font-size;
                background-size: 200% 100% !important;
                transform: translate3d(0, 0, 0);
                background: linear-gradient(black, blue);
                height: 100vh;
            }

            .user {
                width: 90%;
                max-width: 340px;
                margin: 10vh auto;
            }

            .user__header {
                text-align: center;
            }

            .user__title {
                font-size: $font-size;
                margin-bottom: -10px;
                font-weight: 500;
                color: white;
            }

            .form {
                margin-top: 18px;
                border-radius: 10px;
                box-sizing: border-box;
                box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            }



            .form__input {
                display: block;
                width: 100%;
                padding: 20px;
                font-family: $font-family;
                -webkit-appearance: none;
                border: 0;
                outline: 0;
                transition: 0.3s;

                &:focus {
                    background: darken(#fff, 3%);
                }
            }

            .details .btn {
                display: block;
                width: 100%;
                padding: 20px;
                font-family: $font-family;
                -webkit-appearance: none;
                outline: 0;
                border: 0;
                color: white;
                background: $color-primary;
                transition: 0.3s;

                &:hover {
                    background: darken($color-primary, 5%);
                }
            }

            .container {
                display: none;
            }

            .show-btn {
                background: #fff;
                padding: 10px 20px;
                font-size: 20px;
                font-weight: 500;
                cursor: pointer;
            }

            #show:checked~.container {
                display: block;
            }
        </style>
    </header>

    <body>

        <form class="form">
            <div class="details">
                <div class="form__group">
                    <input type="text" placeholder="pass_id" name="pass_id" value="<?php echo 'PASSENGER ID : ', $pass; ?>" class="form__input" readonly />
                </div>

                <div class="form__group">
                    <input type="text" placeholder="passname" name="passname" value="<?php echo 'NAME : ', $name; ?>" class="form__input" readonly />
                </div>

                <div class="form__group">
                    <input type="text" placeholder="email" name="email" value="<?php echo 'EMAIL : ', $email; ?>" class="form__input" readonly />
                </div>

                <div class="form__group">
                    <input type="text" placeholder="gender" name="gender" value="<?php echo 'GENDER : ', $gender; ?>" class="form__input" readonly />
                </div>

                <div class="form__group">
                    <input type="text" placeholder="age" name="age" value="<?php echo 'AGE : ', $age; ?>" class="form__input" readonly />
                </div>

                <div class="form__group">
                    <input type="text" placeholder="phone" name="phone" value="<?php echo 'PHONE : ', $phone; ?>" class="form__input" readonly />
                </div>
        </form>
</div>

</body>



</html>