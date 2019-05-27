<?php
	session_start();
	$name2 = $_POST["name"];
    $address2 = $_POST["address"];
    $number2 = $_POST["number"];
    $email2 = $_POST["email"];

	echo $name2.'<br>';
	echo $address2.'<br>';
	echo $number2.'<br>';
	echo $email2.'<br>';

	$del_id = $_SESSION["id"];
	
	$query = "UPDATE `contacts` SET email = '$email2' AND phone = '$number2' AND address = '$address2' AND name = '$name2' WHERE id = '$del_id'";

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

    if(mysqli_query($conn,$query)){
        echo "Contact edited";
        //header("Location: http://dalab.ee.duth.gr/~57385/files/main.php ");    
    }
	
?>
