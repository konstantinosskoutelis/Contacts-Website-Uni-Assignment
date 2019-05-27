<?php
$del_id = $_GET["id"];
$cur_user = $_SESSION["current_username"];

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
$query = "DELETE FROM `contacts` WHERE id = '$del_id'";

if(mysqli_query($conn,$query)){
    echo "Contact deleted";
    header("Location: http://dalab.ee.duth.gr/~57385/files/main.php ");
}else{
        //echo "Error: ".$query."<br>".mysqli_error($conn);
        //header('files/login.php');        
}
?>