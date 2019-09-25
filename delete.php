<?php

		$servername = "localhost:8889";
         $username = "root";
         $password = "root";
         $dbname = "test";
         
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         
         // Check connection
         if ($conn->connect_error) {
         			die("Connection failed: " . $conn->connect_error);
         }
         echo "Connected successfully";
         
         if(isset($_POST['delete'])){	
			$chkarr = $_POST['checkbox'];
			 echo $chkarr;
			 //foreach($chkarr as $name){
			 	
			 foreach($chkarr as $name){
				 $query = "DELETE FROM Users WHERE Name ='$name'";
				mysqli_query($conn, $query);
			 }
			 header("Location:main.php");
		}
			 //header("Location:main.php");
			 mysqli_close($conn);
?>