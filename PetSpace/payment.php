<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Payment </title>
        <link rel="stylesheet" href="Styles/payment.css">
    </head>
    <body>
        <h1> Here is your summary of appointment </h1>
        <?php
        session_start();
        $session_id = $_SESSION['session_id'];
        $Username = $_SESSION["Username"];
        $con = mysqli_connect("localhost", "root", "", "petspace");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "select * from appointment where Session_Id='$session_id'";
        $result = mysqli_query($con, $sql);
        echo "<table style='width:50%' border='1'>
                        <caption> Appointment Summary </caption>
                        <tr>
                        <th>Appointment_Id</th>
                        <th>Total_Charge</th>
                        <th>Date</th>    
                        <th>Time</th>
                        <th>User</th>
                        <th>Service choosen </th>
                        </tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><center>" . $row["Appointment_Id"] . "</center></td>";
                echo "<td><center>" . $row["Total_Charge"] . "</center></td>";
                echo "<td><center>" . $row["Date"] . "</center></td>";
                echo "<td><center>" . $row["Time"] . "</center></td>";
                echo "<td><center>" . $row["User"] . "</center></td>";
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
        if (isset($_POST['Make_Payment'])) {
            $status = 'yes';
            $sql = "UPDATE appointment SET Payment='$status' Where Session_Id = '$session_id'  ";
            $result = mysqli_query($con, $sql);
            ob_start();
            echo'<script>alert("Payment_Successful ");</script>';
            header("refresh:0.1;url=home.php");
            $output = ob_get_clean();
            echo $output;
        }
        if (isset($_POST['Cancel'])) {
            $status = 'no';
            $sql = "UPDATE appointment SET Payment='$status' Where Session_Id = '$session_id'  ";
            $result = mysqli_query($con, $sql);
            ob_start();
            echo'<script>alert("Payment_Not_Successful ");</script>';
            header("refresh:0.1;url=home.php");
            $output = ob_get_clean();
            echo $output;
        }
        ?>
        <form method="post"> 
            <div class="submit">
                <input type="submit" name="Make_Payment" value="Make_Payment">  
                <br><br><br>
            </div>
            <div class="submit">
                <input type="submit" name="Cancel" value="Cancel">  
                <br><br><br>
            </div>
        </form>


    </body>
</html>
