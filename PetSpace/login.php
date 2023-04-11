<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="Styles/login.css">
    </head>
    <body>
        <div class="center"> <!-- it is a section of html which is then used to style with css or used in JS -->
            <h1> Login Please <br><br> </h1>
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
                <br><!-- comment --><br><!-- comment --><br>
                <input type="submit" value='Login' name='submit'> <!-- login button -->
                <div class='sign_up'>
                    <a href= 'Sign_up.php'> Register </a>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $UserName = $_POST['Username'];
            $password = $_POST['password'];
            $con = mysqli_connect("localhost", "root", "", "petspace");
            if (mysqli_connect_errno()) {
                echo "failed to connect to MySQL: " . mysqli_connect_error();
            }
            $query1 = "select Username,Password from `user` where Username='$UserName' and Password='$password'";
            $result1 = mysqli_query($con, $query1);
            if ($result1) {
                if (mysqli_num_rows($result1) > 0) {//make sure there is atleast one row in a database
                    //if atleast one entry present start session
                    session_start();
                    $_SESSION['Username'] = $UserName;
                    header("Location: home.php");
                } else {
                    echo '<script>alert("Invalid Credentials");</script>';
                }
            } else {
                echo'<script>alert("Invalid Credentials");</script>';
            }
        }
        ?>

    </body>

</html>
