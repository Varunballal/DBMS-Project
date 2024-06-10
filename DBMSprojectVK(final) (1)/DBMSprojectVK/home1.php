<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>metro</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .button a {
            display: block;
            color: black;
            padding: 20px;
            cursor: pointer;
            text-decoration: none;
            width: 300px;
            text-align: center;
            border-radius: 20px;
            font-size: 25px;
            margin: -5px 470px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            background: rgba(255, 255, 255, 0.500);
        }

        .home {
            position: absolute;
            left: 50px;
            top: 40px;
            padding: 15px;
            background: rgba(225, 113, 0, 0.500);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            text-align: center;
            width: 60px;
            border-radius: 20px;

        }

        .home a {
            color: black;
            text-decoration: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .pro {
            position: absolute;
            left: 480px;
            top: 40px;
            padding: 15px;
            background: rgba(225, 113, 0, 0.500);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            text-align: center;
            width: 60px;
            border-radius: 20px;
        }

        .pro a {
            color: black;
            text-decoration: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .update {
            top: 40px;
            position: absolute;
            left: 210px;
            padding: 15px;
            background: rgba(225, 113, 0, 0.500);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            text-align: center;
            width: 180px;
            border-radius: 20px;
        }

        .update a {
            color: black;
            text-decoration: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>

</head>
<script src="alert.js"></script>

<body style="background:url(Beautiful_Kochi_Metro_Train_edited.jpg);
                background-size: contain;
                background-repeat: no-repeat;
                background-size: cover;">

    <div class="home">
        <a href="index.php" name="home">HOME</a>
    </div>
    <div class="update">
        <a href="passenger.php" name="metro">UPDATE MY DETAILS</a>
    </div>

    <div class="pro">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "admin");
        $query = "SELECT * FROM passenger";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $items) {
                $itemid = $items['reg_id'];
            }
        ?>
            <a href="passengerprofile.php?id=<?php echo $itemid; ?>" data-toggle="
            tooltip" data-placement="bottom" title="PROFILE" id="profile"> <i class="fa fa-trash" aria-hidden="true">PROFILE</i> </a></li>
        <?php }
        ?>
    </div>

    <div class="button"><br><br><br><br><br><br><br><br><br>
        <a href="bookmetro.php" METRO>BOOKING </a><br><br>
        <a href="bookingdetails.php" name="book">BOOKING DETAILS </a><br><br>
        <a href="metro1.php" METRO>METRO DETAILS </a><br><br>
        <a href="routedetails.php" ROUTE>ROUTE DETAILS </a>
    </div>
</body>

</html>