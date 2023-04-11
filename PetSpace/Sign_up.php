<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="Styles/Sign_up.css">
    </head>
    <body>
        <div class="center"> <!-- it is a section of html which is then used to style with css or used in JS -->
            <h1> Sign Up </h1>
            <form method="post" >
                <div class="txt_field">
                    <input type="text" required name='Username'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <label> Username </label>
                </div>
            <div class="txt_field">
                    <input type="password" required name='password'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <span></span>
                    <label> Password </label>
                </div>
            <div class="txt_field">
                    <input type="number" required name='mobile_number'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <span></span>
                    <label> Contact </label>
                </div> 
            <input type="submit" value='Register' name="submit"> <!-- login button -->

            </form>
        </div>
        <?php
        $UserName = $Password = "";

        if (isset($_POST['submit'])) {

            $UserName = $_POST['Username'];
            $Password = $_POST['password'];
            $Contact = $_POST['mobile_number'];

            $con = mysqli_connect("localhost", "root", "", "petspace");
            //username: root, password: Yashaswini

            $query = "INSERT INTO `user` (Username, Password, Contact) VALUES ('$UserName','$Password','$Contact')";
            $result = mysqli_query($con, $query);
            if (mysqli_connect_errno()) {
                echo "failed to connect to MySQL: " . mysqli_connect_error();
            }

            if ($result) {
                echo '<script>alert("Registration successful");</script>';
            } else {
                echo '<script>alert("Registration failed");</script>';
            }
        }
        ?>
    </body>
</html>
