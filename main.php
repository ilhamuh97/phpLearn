<html>
   <head>
      <title>PHP-Test</title>
   </head>
   <body>
      <h1>Welcome to my Website</h1>
      <a href="main.php">Home</a>
      <a href="form.php">Register</a>
      <a href="search.php">Search</a>
      <h2> User Data</h2>
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
         //echo "Connected successfully";
         
         //call sql items
         $sql = "SELECT * FROM Users";
	    ?>
       <form method="POST" action="delete.php">
        <?php
         if($result = mysqli_query($conn, $sql)){
         			if(mysqli_num_rows($result) > 0){
             			echo "<table>";
                 			echo "<tr>";
								echo "<th>No</th>";
								echo "<th>Select</th>";
                     			echo "<th>Name</th>";
                     			echo "<th>Address</th>";
                     			echo "<th>Age</th>";
                     			echo "<th>Gender</th>";
                 			echo "</tr>";
             				while($row = mysqli_fetch_array($result)){
                 			echo "<tr>";
								echo "<td class='personid'></td>";
                     			echo "<td><input type ='checkbox' name ='checkbox[]' value ='" . $row[0] . "'></td><td>" . $row[0] . "</td>";
                     			echo "<td>" . $row[1] . "</td>";
                     			echo "<td>" . $row[2] . "</td>";
                     			echo "<td>" . $row[3] . "</td>";
                 			echo "</tr>";
             				}
             			echo "</table>";
             			// Free result set
             			mysqli_free_result($result);
         			}else{
             		echo "No records matching your query were found.";
         }
         }else{
         		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
         }
		   mysqli_close($conn);
         ?>
         <input type="submit" name="delete" id="delete" value="delete records">
         </form>
		<script>
    		var list = document.getElementsByClassName("personid");
			for (var i = 0; i <= list.length-1; i++) {
    			list[i].innerHTML = i+1;
			}	
	   </script>
   </body>
</html>