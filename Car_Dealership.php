<?php
session_start();
if(empty($_SESSION['username'])){
    $_SESSION['username']="Profile";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="DealershipStyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">  
    </head>
    <body background="Assests/Images/MainBackground.jpeg">
        <title>Luxury Avenue</title>
        <div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="Car_Dealership.php"> Home</a></li>
                    <li><a href="Lexus.php">Lexus</a></li>
                    <li><a href="Acura.php">Acura</a></li>
                    <li><a href="Mercedes.php">Mercedes-Benz</a></li>
                    <li><a href="Profile.php"><?php echo $_SESSION['username'];?></a></li>
                  </ul>
            </nav>
            <h1>Luxury Avenue</h1>
            <p>Here at Luxury Avenue we are commited to provide you with the best cars the luxury world has to offer and make the process of car ownership as easy as possible so you can drive the car of your dreams today! <br>For a better experience across the website please consider signing up!</p>
            <a href="SigningUp.php"><button>Sign Up Here</button></a>
            <p>Have an Account Already?</p>
            <a href="Login.php"><button>Login</button></a>
        </div>
        <div class="row">
            <div class="column"><a href="Lexus.php"><img src="Assests/Images/Lexus.png" width="300" height="200"></a></div>
            <div class="column"><a href="Acura.php"><img src="Assests/Images/Acura.png" width="300" height="200"></a></div>
            <div class="column"><a href="Mercedes.php"><img src="Assests/Images/Mercedes.png" width="300" height="200"></a></div>
        </div>
    </body>
</html>