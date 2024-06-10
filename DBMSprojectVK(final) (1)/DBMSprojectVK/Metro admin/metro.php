<?php

$conn = mysqli_connect("localhost", "root", "", "admin");

$id = 0;

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo 'database not selected';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $metro = $_POST['metro_no'];
    $atime = $_POST['arr_time'];
    $dtime = $_POST['dep_time'];
    $line = $_POST['lines'];


    $sql = "INSERT INTO `metro_details`(`metro_no`,`arr_time`,`dep_time`,`lines`) VALUES ('$metro','$atime','$dtime','$line')";

    if (!mysqli_query($conn, $sql)) {
        echo "not inserted";
    } else {
        echo "inserted";
        if ($_POST['submit1']) {
            header('Location:adminhome.php');
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
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: black;
        }

        h1 {
            color: black;
            left: 43px;
            top: 30px;
            position: absolute;
            font-size: 30px;
        }

        .passenger {
            width: 500px;
            line-height: 25px;
            top: 50%;
            right: 12%;
            transform: translate(-50%, -50%);
            position: absolute;
            background: gray;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .passenger form {
            padding: 10px 50px;
        }

        .passenger input {
            font-size: 16px;
            width: 380px;
            padding: 10px 10px;
        }

        .form .txt_field {
            margin: 50px 0;
        }

        body {
            background-color: purple;
        }

        .submit input {
            padding-left: 10px;
            border-radius: 20px;
            background-color: skyblue;
            width: 405px;
            color: black;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
</head>

<body>
    <div class="passenger">
        <form action='#' method="post">
            <br>
            <h1>UPDATE METRO DETAILS</h1>
            <br>
            <br>
            <label for="metro_no">Metro number</label>
            <input type="text" name="metro_no" placeholder="metro number">
            <br>
            <label for="arrival_time">Arrival time</label>
            <input type="time" name="arr_time" placeholder="arrival time">
            <br>
            <label for="departure_time">Departure time</label>
            <input type="time" name="dep_time" placeholder="departure time">
            <br>
            <label for="lines">Line</label>
            <input type="text" name="lines" placeholder="Line">
            <br><br>
            <div class="submit">
                <input type="submit" name="submit1" value="Submit">
            </div>
            <br>

</body>

</html>