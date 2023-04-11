<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Your Service</title>
        <link rel="stylesheet" href="Styles/service_registration.css">
    </head>
    <body>

        <?php
        session_start();
        $session_id = uniqid();
        $_SESSION['session_id'] = $session_id;
        $Username = $_SESSION["Username"];
        $pet_day_care = isset($_POST["Pet_Day_Care"]) ? $_POST["Pet_Day_Care"] : "";
        $pet_day_out = isset($_POST["Pet_Day_Out"]) ? $_POST["Pet_Day_Out"] : "";
        $pet_grooming = isset($_POST["Pet_Grooming"]) ? $_POST["Pet_Grooming"] : "";
        $pool_sessions = isset($_POST["Pool_Sessions"]) ? $_POST["Pool_Sessions"] : "";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "petspace";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM services";
        $result = mysqli_query($conn, $sql);
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
        }else {
            echo '<script>alert("error");</script>';
        }
        echo "</table>
        </div>";
        if (isset($_POST['submit'])) {
        if (isset($_POST['Pet_Day_Care'])) {
                $query1 = "insert into service_registration(Session_Id,Service,User) values('$session_id','$pet_day_care','$Username')";
                $result1 = mysqli_query($conn, $query1);
            }
            if (isset($_POST['Pet_Grooming'])) {
            $query2 = "insert into service_registration(Session_Id,Service,User) values('$session_id','$pet_grooming','$Username')";
                $result2 = mysqli_query($conn, $query2);
            }
            if (isset($_POST['Pool_Sessions'])) {
            $query3 = "insert into service_registration (Session_Id,Service,User) values ('$session_id','$pool_sessions','$Username')";
                $result3 = mysqli_query($conn, $query3);
            }
            if (isset($_POST['Pet_Day_Out'])) {
                $query4 = "insert into service_registration (Session_Id,Service,User) values ('$session_id','$pet_day_out','$Username')";
                $result4 = mysqli_query($conn, $query4);
            }
            $random_number = uniqid();
            $query5 = "SELECT Service FROM service_registration WHERE User='$Username' and Session_Id='$session_id'";
            $result5 = mysqli_query($conn, $query5);
            $total_charge = 0; // initialize the total charge variable
            while ($row1 = mysqli_fetch_assoc($result5)) {
                $service = $row1['Service'];
                $query51 = "SELECT Per_Service_Charge FROM services WHERE Service_Name='$service' ";
                $result51 = mysqli_query($conn, $query51);
                $row2 = mysqli_fetch_assoc($result51);
                $per_service_charge = $row2['Per_Service_Charge'];
                $total_charge += $per_service_charge;
            }
            echo "Total charge: " . $total_charge;
            $date_input = $_POST['date_input'];
            $time_input = $_POST['time_input'];
            $query6 = "insert into appointment (Date,Time,User,Appointment_Id,Total_Charge,Session_Id) values ('$date_input','$time_input','$Username','$random_number','$total_charge','$session_id')";
            $result6 = mysqli_query($conn, $query6);
            ob_start();
            echo'<script>alert("Your Choice is been saved! ");</script>';
            header("refresh:0.1;url=payment.php");
            $output = ob_get_clean();
            echo $output;
        }
        ?>
        <h2 text-align="center">Pet Services</h2>
        <br>
        <form method="post" >
            <div class="options">
                <h3 style="margin:2px;"> Please note to choose the valid time slot between: 7:00AM to 11:00PM <br>
                    In case invalid time slot is choosen, your appointment will be scheduled on the date
                    mentioned but at the valid slot.</h3>
                <label><input type="checkbox" name="Pet_Day_Care" value="Pet_Day_Care">Pet Day Care</label>
                <label><input type="checkbox" name="Pet_Grooming" value="Pet_Grooming">Pet Grooming</label>
                <label><input type="checkbox" name="Pool_Sessions" value="Pool_Sessions">Pool Sessions</label>
                <label><input type="checkbox" name="Pet_Day_Out" value="Pet_Day_Out" >Pet Day Out</label>
            </div>
            <br><br>
            <div class="label">
                <label for="date_input">Date:</label>
                <input type="date" id="date_input" name="date_input">

                <label for="time_input">Time:</label>
                <input type="time" id="time_input" name="time_input">
                <br><br>

            </div>	

            <div class="submit">
                <input type="submit" name="submit" value="submit">  
                <br><br><br>
            </div>

        </form>

    </body>
</html>
