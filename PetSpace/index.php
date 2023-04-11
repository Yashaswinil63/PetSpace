<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8"> <!-- meta tag -->
        <title> PetSpace Login </title> <!--title is displayed as name of tab -->
        <link rel="stylesheet" href="Styles/index.css"> <!--link tag -->
        <link rel="icon" type="image/x-icon" href="favicon2.ico">
    </head>
    <body>

        <div class="left_column">
            <h1 align="center">Welcome to PetSpace </h1>
            <p id="intro" style="word-wrap: break-word; ">
                Welcome to PetSpace, your ultimate destination for all things related to pets! 
                We are a passionate community of pet lovers, dedicated to providing the best information, products,
                and services to pet owners all around the world. PetSpace offers a wide range of pet care services to help you 
                take care of your furry friends.<em>From boarding and day care facilities to pool sessions and 
                grooming services</em>,we provide everything you need to ensure that your pets are happy, healthy, 
                and well-cared for.Our team of experienced and certified pet care professionals is dedicated to 
                providing the best possible care for your pets, so you can have peace of mind knowing that your 
                pets are in good hands.
            </p>
        </div>
        <img class="dog"src="Images/doggy.jpg" />
        <div class="h2" >
            <br/><br/><br/>
            <h2 align="center"> Services We Offer For Your Furry Friends </h2>
        </div>
        <div class="services">
            <form >
                <button name="Day Care" value="Day_Care">Day Care</button>
                <button name="Pet Grooming" value="Pet_Grooming">Pet Grooming</button>
                <button name="Pool Sessions" value="Pool_Sessions">Pool Sessions</button>
                <button name="Pet Day Out" value="Pet_Day_Out">Pet day out</button>
            </form>
        </div>
        <br><br>
        <div class="avail">
            <form action="login.php">
                <input type="submit" name="Avail_Service" >
                <br>
                <label for="Avail_Service" id="avail_label">Register</label>
                <br><br><br>
            </form>
        </div>
        <div class="contact-details">
            <h4> Have a Special Request or Concern </h4><!-- comment -->
            <p> Contact us : <br>
                Sneha <br><!-- comment -->
                Veterinarian <br><!-- comment -->
                +91 7582859632 <br>
                sneha@gmail.com
            </p>
        </div>

        <?php
        // put your code here
        ?>
    </body>
</html>
