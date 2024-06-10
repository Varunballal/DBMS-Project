<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo 'database not selected';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $metro = $_POST['metro_no'];
    $route = $_POST['route_id'];
    $from = $_POST['from_route'];
    $to = $_POST['to_route'];
    $line = $_POST['lines'];

    $sql = "INSERT INTO `routes`(`metro_no`, `route_id`, `from_route`, `to_route`,`lines`) VALUES ('$metro','$route','$from','$to','$line')";

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
    <title>ROUTE</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
        }

        h1 {
            color: black;
            left: 55px;
            position: absolute;
        }

        .passenger {
            width: 500px;
            line-height: 20px;
            top: 50%;
            right: 12%;
            transform: translate(-50%, -50%);
            position: absolute;
            background: wheat;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .passenger form {
            padding: 12px 60px;
        
        }

        .passenger input {
            font-size: 16px;
            width: 100%;
            padding: 15px 1px;
        }

        .form .txt_field {
            margin: 50px 0;
        }

        body {
            background: rgb(200, 150, 160);
        }

        .passenger label {
            font-size: 20px;
        }

        .submit input {
            padding-left: 10px;
            border-radius: 20px;
            background-color: skyblue;
            color: black;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
</head>

<body>
    <div class="passenger">
        <form action='#' method="post">
            <br>
            <h1>UPDATE ROUTE DETAILS</h1>
            <br><br>
            <label for="metro_no">Metro number</label>
            <input type="text" name="metro_no" placeholder="metro number">
            <br>
            <label for="route_id">Route id</label>
            <input type="text" name="route_id" placeholder="route id">
            <br>
            <label for="departure_time">From route</label>
            <input type="text" name="from_route" placeholder="from route">
            <br>
            <label for="avail_seats">To route</label>
            <input type="text" name="to_route" placeholder="to route">
            <br>
            <label for="lines">Line</label>
            <input type="text" name="lines" placeholder="Line">
            <br>
            <br>
            <div class="submit">
                <input type="submit" name="submit1" value="Submit">
            </div>
            <br>

</body>

</html>