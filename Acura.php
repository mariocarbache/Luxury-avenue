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
        <h1>Acura</h1>
        <p>Acura is the luxury and performance division of Honda Motor Company, Ltd.. The brand was launched in the United States and Canada on March 27, 1986, marketing luxury and performance automobiles with particular care for the design of their interiors.</p>
        <div>
            <img class="center rounded" src="Assests/Images/TLXAcura.png" width="1000" height="400">
            <form method="post">
                <p>Acura TLX</p>
                <select class="buttonRounded" name="TLXAcuraType" id="TLX">
                    <option value="37500">TLX Standard $37,500</option>
                    <option value="39500">TLX Hybrid $39,500</option>
                    <option value="49500">TLX Type S $49,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteTLX" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('TLX','TLXresults')">Calculate standard monthly payments</button>
            <p id="TLXresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/RDXAcura.png" width="1000" height="400">
            <form method="post">
                <p>Acura RDX</p>
                <select class="buttonRounded" name="RDXAcuraType" id="RDX">
                    <option value="39500">RDX Standard $39,500</option>
                    <option value="41500">RDX Hybrid $41,500</option>
                    <option value="51500">RDX Type S $51,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteRDX" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('RDX','RDXresults')">Calculate standard monthly payments</button>
            <p id="RDXresults"></p>
        </div>
        <div>
            <img class="center rounded" src="Assests/Images/MDXAcura.png" width="1000" height="400">
            <form method="post">
                <p>Acura MDX</p>
                <select class="buttonRounded" name="MDXAcuraType" id="MDX">
                    <option value="47500">MDX Standard $47,500</option>
                    <option value="49500">MDX Hybrid $49,500</option>
                    <option value="59500">MDX Type S $59,500</option>
                </select>
                <input class="buttonRounded" type="submit" name="favoriteMDX" value="Add to Favorites"/>
            </form>
            <button onclick="calculate('MDX','MDXresults')">Calculate standard monthly payments</button>
            <p id="MDXresults"></p>
        </div>
    </body>
</html>
<?php
if(isset($_POST['favoriteTLX'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="TLX";
        $price=$_POST['TLXAcuraType'];
        if($price==37500){
            $carType="Standard";
        }else if($price==39500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Acura";
        $image_path="Assests/Images/TLXAcura.png";
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
if(isset($_POST['favoriteRDX'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="RDX";
        $price=$_POST['RDXAcuraType'];
        if($price==39500){
            $carType="Standard";
        }else if($price==41500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Acura";
        $image_path="Assests/Images/RDXAcura.png";
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
if(isset($_POST['favoriteMDX'])){
    if($_SESSION['username']!=="Profile"){
        $username=$_SESSION['username'];
        $carModel="MDX";
        $price=$_POST['MDXAcuraType'];
        if($price==47500){
            $carType="Standard";
        }else if($price==49500){
            $carType="Hybrid";
        }else{
            $carType="Type S";
        }
        $manufacturer="Acura";
        $image_path="Assests/Images/MDXAcura.png";
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