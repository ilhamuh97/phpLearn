<?php
$name    = $_POST['name'];
$address = $_POST['address'];
$age     = $_POST['age'];
$gender  = $_POST['gender'];

$servername = "localhost:8889";
$username   = "root";
$password   = "root";
$dbname     = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "INSERT INTO Users (Name, Address, Age, Gender) Values ('$name','$address', $age, '$gender')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br>";
        
        echo "<a href='main.php'>Back to Home</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>