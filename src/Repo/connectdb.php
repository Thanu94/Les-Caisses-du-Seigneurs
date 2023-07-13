<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>
<?php
/*
* Change the value of $password if you have set a password on the root userid
* Change NULL to port number to use DBMS other than the default using port 3306
*
*/
$user = 'root';
$password = 'HLyeafaW2ajD4Y'; //To be completed if you have set a password to root
$database = 'LesCaissesduSeigneurs'; //To be completed to connect to a database. The database must exist.
$port = 3306; 
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

//////////////////////////////////////////////////////////



if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo '<p>Connection OK '. $mysqli->host_info.'</p>';
echo '<p>Server '.$mysqli->server_info.'</p>';
echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';
$sql = "SELECT username, password FROM users";
$result = $mysqli->query($sql);


///////////////////////////////////////////////////////////////



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["username"]. "<br>";
  }
} else {
  echo "0 results";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    echo "CONNEXION";

}
$mysqli->close();
?>
</body></html>