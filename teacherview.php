<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `teacher` WHERE CONCAT(`id`, `first_name`, `last_name`, `present_address`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `teacher`";
    $search_result = filterTable($query);
}
// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "uni_info");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>STUDENT</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="teacherview.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
			<form action = "teacherview.php"><input type = "submit" value = "Reload"/></form><br><br>

            
            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
					<th>Date Of Birth</th>
					<th>Bsc</th>
                    <th>Msc</th>
					<th>Phd</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
					<td><?php echo $row['date_of_birth'];?></td>
					<td><?php echo $row['bsc'];?></td>
					<td><?php echo $row['msc'];?></td>
					<td><?php echo $row['phd'];?></td>
                    
                </tr>
                <?php endwhile;?>
            </table><br><br>
				<form action = "admin.html"><input type = "submit" value = "Home"/></form><br>
				<form action = "teacherform.php"><input type = "submit" value = "ADD DATA"/></form><br>
			
        </form>
        
    </body>
</html>