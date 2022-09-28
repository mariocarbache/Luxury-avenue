<?php
session_start();
$style="";
$style2="style='display:none;'";
if($_SESSION['username']!=="Profile"){
    $style = "style='display:none;'";
    $style2 = "";
}
$host="localhost"; // server name
$user="root"; // username
$password=""; // password
$database="Project"; // database name you need to access
$conn=mysqli_connect($host, $user, $password, $database);// open the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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
        </div>
        <div <?php echo $style;?>>
            <img class="center rounded" src="Assests/Images/Oops.png" width="600" height="400">
            <p>Oops! It seems you're not logged in</p>
            <a href="SigningUp.php"><button>Sign Up Here</button></a>
            <p>Have an Account Already?</p>
            <a href="Login.php"><button>Login</button></a>
        </div>
        <?php
        $username=$_SESSION['username'];
        $sql = "SELECT carModel, carType, manufacturer, price, image_path FROM Favorited_Cars WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "<h1>Saved Cars</h1>";
            echo "<table>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>Model: ".$row["carModel"]."</td><td> Type: ".$row["carType"]."</td><td> Manufacturer: ".$row["manufacturer"]."</td><td>  Price: $".$row["price"]."</td><td><img class=\"center rounded\" src=\"".$row["image_path"]."\" width=\"225\" height=\"125\"></td><br></tr>";
            }
            echo "</table>";
          } else {
            echo "<h1 ".$style2.">No Saved Cars</h1>";
          }
        ?>
        <div <?php echo $style2;?>>
        <br>
        <form method="post">
            <input class="buttonRounded" type="submit" name="remove" value="Remove All"/>
        </form>
        <br>
            <form method="post">
                <input class="buttonRounded" type="submit" name="logout" value="Logout"/>
           </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['remove'])){
    $sql2="DELETE FROM Favorited_Cars WHERE username='$username'";
    if ($conn->query($sql2) === TRUE) {
        header("Location:Profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location:Car_Dealership.php");
}
mysqli_close($conn);
?>