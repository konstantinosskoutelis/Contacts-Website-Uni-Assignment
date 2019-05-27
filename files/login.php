<?php
session_start();

//echo "log in<br>"; 
error_reporting(E_ALL); ini_set('display_errors', 1);
//$u_n = $_POST["username"];
//$psw = md5($_POST["psw"]);
$servername = "localhost";
$username = "57385";
$password = "AM57385";
$dbname = "db_57385";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form       
      $myusername = mysqli_real_escape_string($conn,$_POST['login']);
      $mypassword = mysqli_real_escape_string($conn,md5($_POST['password']));
      
	  echo $myusername."<br>".$mypassword;
      $sql = "SELECT id FROM `users` WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
		 //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         $_SESSION["current_username"] = $myusername;
		 //$_SESSION["current_password"] = $mypassword;
		 header("Location: http://dalab.ee.duth.gr/~57385/files/main.php ");			  
         
      }else {
         $error = "Your Login Name or Password is invalid";
		 echo $error."<br>";
		 //echo($mypassword);
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
                                <li><a href="http://dalab.ee.duth.gr/~57385/files/logout.php?">Αποσύνδεση</a></li>
                                
								
							</ul>
						</li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Συνδεθείτε εδώ εφόσον έχετε ήδη κάνει εγγραφή</h2>
					<form action ="login.php" method = "POST">
						Username: <input type ="text" name = "login" maxlength="15">
						<br/>
						Password: <input type = "password" name = "password" maxlength="16">
						<br/>
						<input type ="submit" value="Login" >    
						</form>
							
						<form action ="sign_up.php" method = "POST">
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
