<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `teacherlist` WHERE CONCAT( `initial`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `teacherlist`";
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
        <title>TEACHER LIST</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="teacheraboutview.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
			<form action = "teacheraboutview.php"><input type = "submit" value = "Reload"/></form><br><br>

            
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Initial</th>
					<th>Role</th>
					<th>Room No</th>
                    <th>Office Hour</th>
					<th>Publication</th>
					<th>Teaching</th>
					
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['initial'];?></td>
					<td><?php echo $row['role'];?></td>
					<td><?php echo $row['room_no'];?></td>
					<td><?php echo $row['office_hour'];?></td>
					<td><?php echo $row['publication'];?></td>
					<td><?php echo $row['teaching'];?></td>
					
                    
                </tr>
                <?php endwhile;?>
            </table><br><br>
				<form action = "index2.html"><input type = "submit" value = "Home"/></form><br>
				
			
        </form>
        
    </body>
</html>