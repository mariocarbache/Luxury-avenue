<?php
session_start();
$host="localhost"; // server name
$user="root"; // username
$password=""; // password
$database="Project"; // database name you need to access
$conn=mysqli_connect($host, $user, $password, $database);// open the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="DealershipStyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">        
        <script type="text/javascript" src="calculate.js"></script>
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
        </div>
        <h1>Login</h1>
        <div>
            <form name="myForm" onsubmit="return validateLogin()" method="post">
                <table class="centertable">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="usernameLogin"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="passwordLogin"></td>
                    </tr>
                    <tr>
                        <td><input class="buttonRounded" name="login" type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['login'])){
    $username=$_POST['usernameLogin'];
    $password=$_POST['passwordLogin'];
    $sql= "SELECT * FROM Users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
        echo '<p>Successful Login!</p>';
        $_SESSION['username']=$_POST['usernameLogin'];
    }else{
        echo '<p>Wrong Password or Username</p>';
}
}
mysqli_close($conn);
?>