<?php
session_start();
//user currently logged in
$cur_user = $_SESSION["current_username"];

$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$address = $_POST["address"];
$number = $_POST["number"];
$email = $_POST["email"];

echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $address;
echo "<br>";
echo $number;
echo "<br>";
echo $email;
echo "<br>";
$name = $first_name." ".$last_name;
echo $name;
echo "<br>";
//DB CONNECTION STUFF
$servername = "localhost";
$username = "57385";
$password = "AM57385";
$dbname = "db_57385";
$conn  = mysqli_connect($servername,$username,$password,$dbname);    
//Check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}else{
    echo "Connected successfully";
}

$query = "INSERT INTO `contacts` (`phone`,`address`,`name`,`email`,`user_id`) VALUES('$number','$address','$name','$email','$cur_user')"; 

if(mysqli_query($conn,$query)){
    echo "new record created";
    header("Location: http://dalab.ee.duth.gr/~57385/files/main.php ");
}else{
    //echo "Error: ".$query."<br>".mysqli_error($conn);
    //header('files/login.php');        
}
    
?>