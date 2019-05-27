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
    //echo "Connected successfully";
}
$query = "SELECT * FROM `contacts` WHERE user_id = '$cur_user'";

mysqli_select_db($conn,$dbname);

$result = mysqli_query($conn,$query);

//echo "<table> <tr> <th>Full Name</th> <th>Phone Number</th> <th>Address</th> <th>E-mail</th> </tr>";
$a = array();
while($row = mysqli_fetch_array($result)) {
    /*echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";    
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";*/
    $s = $row['name']."  ".$row['phone']."  ".$row['address']."  ".$row['email'];
    array_push($a,$s);
}
echo "</table>";
mysqli_close($conn);

$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") { $hint = $name; }
            else {  $hint .= ", $name"; } } } }
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;


?>