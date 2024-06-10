<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    echo "not connected to server";
}

if (!mysqli_select_db($conn, 'admin')) {
    echo 'database not selected';
}
?>
<?php
$query2 = "select * from booking order by token_no desc limit 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_array($result2);
$last_id = $row['token_no'];
if ($last_id == "") {
    $customer_ID = "CUS1";
} else {
    $customer_ID = substr($last_id, 3);
    $customer_ID = intval($customer_ID);
    $customer_ID = "CUS" . ($customer_ID + 1);
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "admin");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token_no = $_POST['token_no'];
    $pass_id = $_POST['pass_id'];
    $metro_no = $_POST['metro_no'];
    $from = $_POST['from_route'];
    $to = $_POST['to_route'];
    $route_id = $_POST['date'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO `booking`(`token_no`, `pass_id`, `metro_no`, `from_route`, `to_route`, `date`) VALUES ('$token_no','$pass_id','$metro_no','$from','$to','$route_id')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        if ($_POST['submit1']) {
            header('Location:home1.php');
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        h1 {
            color: black;
            position: absolute;
            left: 160px;
            top: 10px;
        }

        .passenger {
            width: 500px;
            line-height: 20px;
            top: 310px;
            left: 630px;
            transform: translate(-50%, -50%);
            position: absolute;
            background: wheat;
            border-radius: 25px;
            padding: 60px 15px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .passenger form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        .passenger input {
            font-size: 16px;
            padding: 1px 100px;
        }

        .form .txt_field {
            margin: 50px 0;
        }

        body {
            background-color: maroon;
        }

        .sub input {
            position: absolute;
            top: 400px;
            left: 130px;
            border-radius: 20px;
            background-color: skyblue;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);

        }
    </style>


    <script>
        function lselect() {
            var d = document.getElementById("fromroute");
            var displaytext = d.options[d.selectedIndex].text;
            document.getElementById("fromvalue").value = displaytext;
        }

        function rselect() {
            var d = document.getElementById("toroute");
            var displaytext = d.options[d.selectedIndex].text;
            document.getElementById("tovalue").value = displaytext;
        }

        function xselect() {
            var d = document.getElementById("metrono");
            var displaytext = d.options[d.selectedIndex].text;
            document.getElementById("novalue").value = displaytext;
        }

        function yselect() {
            var d = document.getElementById("routeid");
            var displaytext = d.options[d.selectedIndex].text;
            document.getElementById("idvalue").value = displaytext;
        }
    </script>
</head>

<body>
    <div class="passenger">
        <div class="row">
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>BOOK METRO</h1>
                <label for="token_no">Token_no</label>
                <input type="text" name="token_no" placeholder="token no" id="token_no" style="color: red" value="<?php echo $customer_ID; ?>">
                <br>
                <label for="pass_id">Passenger_id</label>
                <input type="text" name="pass_id" placeholder="passenger id">
                <br>
                <label for="from_route">From</label>
                <select id="fromroute" onchange="lselect()">
                    <option>--select--</option>
                    <option>Lalbagh</option>
                    <option>RV Road</option>
                    <option>KR Puram</option>
                    <option>Central Silk Board</option>
                    <option>Gottigere</option>
                    
                </select>
                <br>
                <input type="text" id="fromvalue" name="from_route" />
                <br>
                <label for="to_route">to</label>
                <select id="toroute" onchange="rselect()">
                    <option>--select--</option>
                    <option>Trinity</option>
                    <option>Cubbon Park</option>
                    <option>Chickpet</option>
                    <option>Dasarahalli</option>
                    <option>Kuvempu Road</option>
                </select>
                <br>
                <input type="text" id="tovalue" name="to_route" />
                <br>
                </select>
                <br>
                <label for="metro_no">Metro no</label>
                <select id="metrono" onchange="xselect()">
                    <option>--select--</option>
                    <option>M3132 (Lalbagh-Trinity)</option>
                    <option>M6352 (Lalbagh-Cubbon Park)</option>
                    <option>M2156 (Lalbagh-Chickpet)</option>
                    <option>M7362 (Lalbagh-Dasarahalli)</option>
                    <option>M8292 (Lalbagh-Kuvempu Road)</option>

                    <br>
                    <input type="text" id="novalue" name="metro_no" />
                    <br>
                    <br>
                    <label for="date">Date</label>
                    <br>
                    Note : Please select the date of your journey
                    <input type="date" name="date">
                    <br>
                    <br>
                    <div class="sub">
                        <input type="submit" name="submit1" value="Submit">
                    </div>
</body>

</html>