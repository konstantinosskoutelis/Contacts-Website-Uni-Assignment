



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
					<?php
					session_start();
					//HERE WE WILL TRY TO PUT NAMES OF THE DB IN AN ARRAY
					//user currently logged in
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
					$query = "SELECT * FROM `contacts` WHERE user_id = '$cur_user'";

					mysqli_select_db($conn,$dbname);

					$result = mysqli_query($conn,$query);

					echo "<table> <tr> <th>Full Name</th> <th>Phone Number</th> <th>Address</th> <th>E-mail</th> <th>Modify</th>   </tr>";
					//$a = array();
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";    
						echo "<td>" . $row['phone'] . "</td>";
						echo "<td>" . $row['address'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . '<a href="delete.php/?id='.$row["id"].'" >DELETE</a>' ." or ". '<a href="edit.php/?id='.$row["id"].'&name='.$row["name"].'&phone='.$row["phone"].'&address='.$row["address"].'&email='.$row["email"].'">EDIT</a>' ."</td>";
						echo "</tr>";
						//array_push($a,$row['name']);
					}
					echo "</table>";
					mysqli_close($conn);
					?>

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
