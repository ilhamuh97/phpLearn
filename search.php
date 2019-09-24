<?php

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * FROM Users where CONCAT (Name , Address, age, gender) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * FROM Users";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect       = mysqli_connect("localhost", "root", "root", "test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<html>
   <head>
      <title>PHP-Test</title>
   </head>
   <body>
      <h1>Search</h1>
      <a href="main.php">Home</a>
      <a href="form.php">Register</a>
      <a href="search.php">Search</a>
      <h2> Search Data</h2>
      <form action="search.php" method="post">
         Search: <input type="text" name="valueToSearch">
         <input type="submit" name="search" value="Filter">
         <table>
            <tr>
              	<th>No</th>
               <th>Name</th>
               <th>Address</th>
               <th>Age</th>
               <th>Gender</th>
            </tr>
            <!-- populate table from mysql database -->
            <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
             <!-- change soon -->
              <?php echo "<td class='personid'></td>";?>
               <td><?php echo $row['Name'];?></td>
               <td><?php echo $row['Address'];?></td>
               <td><?php echo $row['Age'];?></td>
               <td><?php echo $row['Gender'];?></td>
            </tr>
            <?php endwhile;?>
         </table>
      </form>
      <script>
    		var list = document.getElementsByClassName("personid");
			for (var i = 0; i <= list.length-1; i++) {
    			list[i].innerHTML = i+1;
			}	
	   </script>
   </body>
</html>