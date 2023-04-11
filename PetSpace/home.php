<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="Styles/home.css">
    </head>
    <body>

        <div class="option">
            <div class="appointment" ">
                <form action="appointment.php">
                    <input type="submit" name="appointment" value="See Your PreviousAppointments">
                </form>
            </div>
            <div class="services">
                <form action="service_registration.php">
                    <input type="submit" name="service_registration" value="Get Appointment">
                </form>
            </div>
            
        </div>
        <div>
            <form action="logout.php">
                <input type="submit" name="logout" value="logout">
            </form>
        </div>
        <?php
        session_start();
        $session_id = $_SESSION['session_id'];
        $Username = $_SESSION["Username"];
        $con = mysqli_connect("localhost", "root", "", "petspace");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "SELECT * FROM services";
        $result = mysqli_query($con, $sql);
        echo "<div style='text-align: center;'>
          <table style='width: 50%; margin: auto;' border='1'>
               <caption>Service and Charge</caption>
               <tr>
                    <th>Service</th>
                    <th>Charge</th>
               </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><center>" . $row["Service_Name"] . "</center></td>";
                echo "<td><center>" . $row["Per_Service_Charge"] . "</center></td>";
                echo "</tr>";
            }
        } else {
            echo '<script>alert("error");</script>';
        }
        echo "</table>
      </div>";
        ?>
    </body>
</html>
