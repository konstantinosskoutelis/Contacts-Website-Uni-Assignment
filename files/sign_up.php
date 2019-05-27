<?php
if(isset($_POST["login"])){
	$login = trim($_POST["login"]);
	if(trim($_POST["password"]) == trim($_POST["password_check"])){
        $psw = trim($_POST["password"]);
    }else{
        header("Location: http://dalab.ee.duth.gr/~57385/files/sign_up.php ");
    }
	
	//Encrypt
	$psw = md5($psw);
	
	//Connect to db
	$servername = "localhost";
	$username = "57385";
	$password = "AM57385";
	//615723 sthn db toy tsouloucha kai username : gtsoulou
	$dbname = "db_57385";
    
	$conn  = mysqli_connect($servername,$username,$password,$dbname);
    
	//Check connection
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	echo "connected successfully";
	
	$query = "INSERT INTO `users` (`username`,`password`) VALUES('$login','$psw') ";    //sto users tha valoyme to koumpi me thn perispwmenh
	//$query = "INSERT INTO `USERS` (`login`,`password`, `online`) VALUES('".$_POST["login"]."','$password','0') "; //2os tropos
	
	if(mysqli_query($conn,$query)){
		echo "new record created";
        header("Location: http://dalab.ee.duth.gr/~57385/files/login.php ");
	}else{
        //echo "Error: ".$query."<br>".mysqli_error($conn);
        //header('files/login.php');        
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
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt skel-layers-fixed">
				<nav id="nav">
					<ul>
						<li><a href="http://dalab.ee.duth.gr/~57385/">Home</a></li>
						<li>
							<a href="" class="icon fa-angle-down">Περιήγηση</a>
							<ul>
								<li><a href="http://dalab.ee.duth.gr/~57385/files/login.php?">Συνδεθείτε</a></li>
								<li><a href="http://dalab.ee.duth.gr/~57385/files/sign_up.php?">Κάνετε εγγραφή</a></li>
								<li><a href="http://dalab.ee.duth.gr/~57385/files/main.php?">Σελίδα καταλόγου</a></li>
								
							</ul>
						</li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Κάνετε εγγραφή</h2>
					<form action ="sign_up.php" method = "POST">
						Login: <input type ="text" name = "login" maxlength="15">
						<br/>
						Password: <input type = "password" name = "password" maxlength="16">
						<br/>
                        Type Password again: <input type = "password" name = "password_check" maxlength="16">
						<br/>
						<input type ="submit" value="Sign up">
					</form>
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				
				<ul class="menu">
					<li><a href="#">Σκουτέλης Κωνσταντίνος</a></li>
					
				</ul>
				<span class="copyright">
					&copy; Copyright. All rights reserved
				</span>
			</footer>

	</body>
</html>
