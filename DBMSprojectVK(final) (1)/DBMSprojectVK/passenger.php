<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo 'database not selected';
}

$query2 = "select * from passenger order by pass_id desc limit 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_array($result2);
$last_id = $row['pass_id'];
if ($last_id == "") {
    $customer_ID = "PASS1";
} else {
    $customer_ID = substr($last_id, 4);
    $customer_ID = intval($customer_ID);
    $customer_ID = "PASS" . ($customer_ID + 1);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['pass_id'];
    $reg = $_POST['reg_id'];
    $name = $_POST['passname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    $sql = "UPDATE `passenger` SET  `reg_id`='$reg', `passname`='$name', `email`='$email', `gender`='$gender', `age`='$age', `phone`='$phone' where `pass_id`='$pass' ";


    if (!mysqli_query($conn, $sql)) {
        echo "not inserted";
    } else {
        echo "inserted";
        if ($_POST['submit1']) {
            header('Location:home1.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>PASSENGER</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: cursive;
        }

        h1 {
            color: black;
            position: relative;
            left: 35px;
        }

        .passenger {
            width: 500px;
            top: 500px;
            right: 12%;
            transform: translate(-50%, -50%);
            position: absolute;
            background: silver;
            border-radius: 25px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            height: 800px;
        }

        .passenger form {
            padding: 0 30px;
        }

        .passenger input {
            font-size: 16px;
            width: 400px;
            padding: 10px 10px;
        }

        .form .txt_field {
            margin: 50px 0;
        }

        body {
            background-color: goldenrod;

        }

        .submit input {
            width: 425px;
            border-radius: 30px;
            background-color: skyblue;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .M {
            position: absolute;
            left: -100px;
            top: 473px;
        }

        .F {
            position: absolute;
            left: -100px;
            top: 515px;
        }
    </style>
</head>

<body>
    <div class="passenger">
        <form action='<?php echo ($_SERVER["PHP_SELF"]); ?>' method="POST">
            <br>
            <h1>PASSENGER DETAILS</h1>
            <br>
            <label for="pass_id">Passenger_id</label>
            <input type="text" name="pass_id" value="<?php echo $customer_ID; ?>" placeholder="passenger id" >
            <br>
            <br>
            <label for="reg_id">Reg_id</label>
            <input type="text" name="reg_id" placeholder="registration id">
            <br>
            <br>
            <label for="name">Name</label>
            <input type="text" name="passname" placeholder="name">
            <br>
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email">
            <br>
            <br>
            <label for="gender">Gender</label>
            <br>
            <div class="M">
                <input type="radio" name="gender" value="Male">
            </div>
            <p>Male</p>
            <br>
            <div class="F">
                <input type="radio" name="gender" value="Female">
            </div>
            <p>Female</p>
            <br>
            <label for="age">Age</label>
            <br>
            <input type="number" name="age" placeholder="age">
            <br>
            <label for="phone">Phone</label>
            <input type="number" name="phone" placeholder="phone number">
            <br><br>
            <div class="submit">
                <input type="submit" name="submit1" value="Submit">
            </div>
        </form>


</body>

</html>