<? php
session_start();

if($_SESSION["current_username"]){
	//CODE GOES HERE
	//echo "Hey guys this is ".$_SESSION["current_username"];
	
}else{
	header("Location: http://dalab.ee.duth.gr/~57385/files/login.php ");
	
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
						<li><a href="index.html">Home</a></li>
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

				<form action="http://dalab.ee.duth.gr/~57385/files/insert.php" method = "POST">
					  Insert a new contact here :<br><br>
						FIRST NAME<input type="text" name="firstname"><br>
						LAST NAME<input type="text" name="lastname"><br>  
						ADDRESS<input type="text" name="address"><br>  
						PHONE NUMBER <input type="text" name="number"><br>  
						EMAIL <input type="text" name="email"><br>  
					  
					  <input type="submit" value="Submit">
					</form>

					<form>
						Name <input type="text" onkeyup="showNames(this.value)">    
					</form>
					<p> Suggestions: <span id = "txtHint"></span></p>
					<script>
					function showNames(str) {
						if (str.length == 0) { 
							document.getElementById("txtHint").innerHTML = "";
							return;
						} else {
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
									document.getElementById("txtHint").innerHTML = this.responseText;
								} };
							xmlhttp.open("GET", "getnames.php?q=" + str, true);
							xmlhttp.send();
						}
					}
					</script>	

					<form action="http://dalab.ee.duth.gr/~57385/files/edit_contact.php" method = "GET">
					  To edit or delete an existing contact press here :<br><br>
					  <input type="submit" value="Edit Contact">
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
