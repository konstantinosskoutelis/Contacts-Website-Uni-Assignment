<?php
session_start();
    
    //previous elements
    $del_id = $_GET["id"];
    $del_name = $_GET["name"];
    $del_phone = $_GET["phone"];
    $del_address = $_GET["address"];
    $del_email = $_GET["email"];
/*    
    echo $del_id.'<br>';
    echo $del_name.'<br>';
    echo $del_phone.'<br>';
    echo $del_address.'<br>';
    echo $del_email.'<br>';   
	*/
    if(isset($_POST["name"]) || isset($_POST["address"]) || isset($_POST["number"]) || isset($_POST["email"])){
        echo "NEW";
        //new elements
        $name2 = $_POST["name"];
        $address2 = $_POST["address"];
        $number2 = $_POST["number"];
        $email2 = $_POST["email"];
        $id2 = $_POST["id"];
        /*echo $name2;
        echo "<br>";
        echo $address2;
        echo "<br>";
        echo $number2;
        echo "<br>";
        echo $email2;
        echo "<br>";
        echo $id2; 
        echo "<br>";
		*/
        
        $query = "UPDATE `contacts` SET email = '$email2', phone = '$number2', address = '$address2', name = '$name2' WHERE id = '$id2'";        
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
            //echo "Connected successfully";
        }   

        if(mysqli_query($conn,$query)){
            //echo "<br> Contact edited";
            header("Location: http://dalab.ee.duth.gr/~57385/files/main.php ");        
        }    
        
    }
    
?>


<html>
	<head>
		<title> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<style>
	form{
		margin:0 auto;
		width:250px;
	}
	h1{
		color:white;
	}
	h2{
		color:white;
	}
	body{
		color:black;
	}
	input[type=text] {
		background-color: ##1c2a1c;
		color: black;
	}
	
	input[type=text]:focus {
		background-color: lightblue;
	}
		
	
	</style>
	<body class="landing" style="background-color:#403E3E" >

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<form action="edit.php" method = "POST">
					  <h1>Επεξεργαστείτε εδώ </h1><br>
						<p class="name"> <h2>NAME</h2><br><input type="text" value="<?php echo $del_name?>" name="name"></p>
						<p class="address"> <h2>ADDRESS</h2><br><input type="text" value="<?php echo $del_address?>" name="address"></p>
						<p class="number"> <h2>PHONE NUMBER</h2><br><input type="text" value="<?php echo $del_phone?>" name="number"></p>
						<p class="email"> <h2>EMAIL</h2><br><input type="text" value="<?php echo $del_email?>" name="email"></p>
						<p class="id"> id<br><input type="text" value="<?php echo $del_id?>" name="id" readonly></p>
						
					  <input type="submit" value="Submit">
					</form>
				</div>
			</section>
		
		

	</body>
</html>
