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
        <h1>Create Account</h1>
        <div>
            <form name="myForm" onsubmit="return validateSignUp()" method="post">
                <table class="centertable">
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="firstname"></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lastname"></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><input class="buttonRounded" name="signin" type="submit" value="Create Account"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['signin'])){
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sql = "INSERT INTO Users (username, firstname, lastname, password, email) VALUES ('$username','$firstname','$lastname','$password','$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>New account created successfully</p>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
mysqli_close($conn);
?>