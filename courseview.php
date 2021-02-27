<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `courses` WHERE CONCAT(`serial`, `course_id`, `teacher_initial`, `section`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `courses`";
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
        
        <form action="courseview.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
			<form action = "courseview.php"><input type = "submit" value = "Reload"/></form><br><br>

            
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Course ID</th>
                    <th>Teacher Initial</th>
					<th>Section</th>
					<th>Timing</th>
                    <th>Room No</th>
					
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['course_id'];?></td>
                    <td><?php echo $row['teacher_initial'];?></td>
					<td><?php echo $row['section'];?></td>
					<td><?php echo $row['timing'];?></td>
					<td><?php echo $row['room_no'];?></td>
					
                    
                </tr>
                <?php endwhile;?>
            </table><br><br>
				<form action = "admin.html"><input type = "submit" value = "Home"/></form><br>
				<form action = "courseform.php"><input type = "submit" value = "ADD NEW DATA"/></form><br>
			
        </form>
        
    </body>
</html>