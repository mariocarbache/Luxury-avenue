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
        <h1>Mercedes-Benz</h1>
        <p>Mercedes-Benz is a German luxury automotive marque. Mercedes-Benz produces consumer luxury vehicles and commercial vehicles and it was founded in 1926.</p>
        <div>
            <img class="center rounded" src="Assests/Images/C-ClassMercedes.png" width="1000" height="400">
            <form method="post">
                <p>Mercedes C-Class</p>
                <select class="buttonRounded" name="CClassType" id="Cclass">
                    <option value="41500">C-Class Standard $41,500</option>
                    <option value="43500">C-Class Hybrid $43,500</option>
                    <option value="53500">C-Class Type S $53,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteCClass" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('Cclass','Cclassresults')">Calculate standard monthly payments</button>
            <p id="Cclassresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/GLEMercedes.png" width="1000" height="400">
            <form method="post">
                <p>Mercedes GLE</p>
                <select class="buttonRounded" name="GLEType" id="GLE">
                    <option value="55500">GLE Standard $55,500</option>
                    <option value="57500">GLE Hybrid $57,500</option>
                    <option value="67500">GLE Type S $67,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteGLE" value="Add to favorites"/>
            </form>
            <button onclick="calculate('GLE','GLEresults')">Calculate standard monthly payments</button>
            <p id="GLEresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/GLSMercedes.png" width="1000" height="400">
            <form method="post">
                <p>Mercedes GLS</p>
                <select class="buttonRounded" name="GLSType" id="GLS">
                    <option value="77500">GLS Standard $77,500</option>
                    <option value="79500">GLS Hybrid $79,500</option>
                    <option value="89500">GLS Type S $89,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteGLS" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('GLS','GLSresults')">Calculate standard monthly payments</button>
            <p id="GLSresults"></p>
        </div>
    </body>
</html>
<?php
if(isset($_POST['favoriteCClass'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="C-class";
        $price=$_POST['CClassType'];
        if($price==41500){
            $carType="Standard";
        }else if($price==43500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Mercedes";
        $image_path="Assests/Images/C-ClassMercedes.png";
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
if(isset($_POST['favoriteGLE'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="GLE";
        $price=$_POST['GLEType'];
        if($price==55500){
            $carType="Standard";
        }else if($price==57500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Mercedes";
        $image_path="Assests/Images/GLEMercedes.png";
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
if(isset($_POST['favoriteGLS'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="GLS";
        $price=$_POST['GLSType'];
        if($price==77500){
            $carType="Standard";
        }else if($price==79500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Mercedes";
        $image_path="Assests/Images/GLSMercedes.png";
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