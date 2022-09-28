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
<!DOCTYPE html>
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
        <h1>Lexus</h1>
        <p>Lexus is the luxury vehicle division of the Japanese automaker Toyota. It was founded in 1989 and it is not only known worldwilde for its luxury standards but also for the execptional reliability in their products.</p>
        <div>
            <img class="center rounded" src="Assests/Images/LSLexus.png" width="900" height="400">
            <form method="post"> 
                <p>Lexus LS</p>
                <select class="buttonRounded" name="LSLexusType" id="LS">
                    <option value="38000">LS Standard $38,000</option>
                    <option value="40000">LS Hybrid $40,000</option>
                    <option value="50000">LS Type S $50,000</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteLS" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('LS','LSresults')">Calculate standard monthly payments</button>
            <p id="LSresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/NXLexus.png" width="900" height="400">
            <form method="post">
                <p>Lexus NX</p>
                <select class="buttonRounded" name="NXLexusType" id="NX">
                    <option value="42000">NX Standard $42,000</option>
                    <option value="44000">NX Hybrid $44,000</option>
                    <option value="54000">NX Type S $54,000</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteNX" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('NX','NXresults')">Calculate standard monthly payments</button>
            <p id="NXresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/GXLexus.png" width="900" height="400">
            <form method="post">
                <p>Lexus GX</p>
                <select class="buttonRounded" name="GXLexusType" id="GX">
                    <option value="55000">GX Standard $55,000</option>
                    <option value="57000">GX Hybrid $57,000</option>
                    <option value="67000">GX Type S $67,000</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteGX" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('GX','GXresults')">Calculate standard monthly payments</button>
            <p id="GXresults"></p>
        </div>
    </body>
</html>
<?php
if(isset($_POST['favoriteLS'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="LS";
        $price=$_POST['LSLexusType'];
        if($price==38000){
            $carType="Standard";
        }else if($price==40000){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Lexus";
        $image_path="Assests/Images/LSLexus.png";
        $sql = "INSERT INTO Favorited_Cars (username, carModel, carType, manufacturer, price, image_path) VALUES ('$username', '$carModel', '$carType', '$manufacturer', '$price', '$image_path')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Added to Your Profile!</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
    }else{
        echo '<script>alert("You Must Created or Login to Your Account First!")</script>';
    }
}
if(isset($_POST['favoriteNX'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="NX";
        $price=$_POST['NXLexusType'];
        if($price==42000){
            $carType="Standard";
        }else if($price==44000){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Lexus";
        $image_path="Assests/Images/NXLexus.png";
        $sql = "INSERT INTO Favorited_Cars (username, carModel, carType, manufacturer, price, image_path) VALUES ('$username', '$carModel', '$carType', '$manufacturer', '$price', '$image_path')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Added to Your Profile!</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
    }else{
        echo '<script>alert("You Must Created or Login to Your Account First!")</script>';
    }
}
if(isset($_POST['favoriteGX'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="GX";
        $price=$_POST['GXLexusType'];
        if($price==55000){
            $carType="Standard";
        }else if($price==57000){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Lexus";
        $image_path="Assests/Images/GXLexus.png";
        $sql = "INSERT INTO Favorited_Cars (username, carModel, carType, manufacturer, price, image_path) VALUES ('$username', '$carModel', '$carType', '$manufacturer', '$price', '$image_path')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Added to Your Profile!</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
    }else{
        echo '<script>alert("You Must Created or Login to Your Account First!")</script>';
    }
}
mysqli_close($conn);
?>