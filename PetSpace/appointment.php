<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Previous appointments</title>
        <link rel="stylesheet" href="Styles/appointment.css">

    </head>
    <body>
        <?php
        session_start();
        $session_id = $_SESSION['session_id'];
        $Username = $_SESSION["Username"];
        $con = mysqli_connect("localhost", "root", "", "petspace");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "select * from services";
        $result = mysqli_query($con, $sql);
        echo "<table style='width:50%' border='1' text-align='center'>
                        <caption> Service and Charge </caption>
                        <tr>
                        <th>Service</th>
                        <th>Charge</th>
                        
                        </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><center>" . $row["Service_Name"] . "</center></td>";
                echo "<td><center>" . $row["Per_Service_Charge"] . "</center></td>";
            }
        } else {
            echo '<script>alert("error");</script>';
        }
        echo "\n\n";
        $sql = "select * from appointment";
        $result = mysqli_query($con, $sql);
        echo "<table style='width:50%' border='1'>
                        <caption> Your Appointments </caption>
                        <tr>
                        <th>Appointment_Id</th>
                        <th> Session_id </th>
                        <th>Total_Charge</th>
                        <th>Date</th>    
                        <th>Time</th>
                        <th>User</th>
                        <th>Paymet</th>
                        <th>Service choosen </th>
                        </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><center>" . $row["Appointment_Id"] . "</center></td>";
                echo "<td><center>" . $row["Session_Id"] . "</center></td>";
                echo "<td><center>" . $row["Total_Charge"] . "</center></td>";
                echo "<td><center>" . $row["Date"] . "</center></td>";
                echo "<td><center>" . $row["Time"] . "</center></td>";
                echo "<td><center>" . $row["User"] . "</center></td>";
                echo "<td><center>" . $row["Payment"] . "</center></td>";
                $session_id = $row["Session_Id"];
                $sql1 = "select Service from service_registration where Session_Id='$session_id'";
                $result1 = mysqli_query($con, $sql1);
                while ($row0 = mysqli_fetch_assoc($result1)) {
                    echo "<td><center>" . $row0["Service"] . "</center></td>";
                    continue;
                }
            }
        } else {
            echo '<script>alert("error");</script>';
        }
        ?>

    </body>
</html>
