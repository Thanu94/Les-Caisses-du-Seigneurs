<?php

session_start(); 
// require_once "C:\wamp64\www\Les-Caisses-du-Seigneurs\src\Repo\connectdb.php";



$user = 'root';
$password = 'HLyeafaW2ajD4Y';
$database = 'lescaissesduseigneurs'; 

$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




// Start a PHP session if you haven't already

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ss", $username, $password);

        // Execute the prepared statement
        $stmt->execute();

        // Check if a matching row is found
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            // User authenticated successfully
            $_SESSION['username'] = $username;
            // Redirect to a logged-in page or perform any other necessary actions
            header("Location: ../admin.php");
            exit();
        } else {
            // Invalid login credentials
            echo '<script>alert("Invalid username or password!");</script>';
            header("Location: ./login.html");
            exit();
        }

        $stmt->close();
    }
}
?>
<?php
// $conn->close();
?>
