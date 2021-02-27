<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `grade` WHERE CONCAT( `name`,'course_id') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `grade`";
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
        
        <form action="submitview.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
			<form action = "submitview.php"><input type = "submit" value = "Reload"/></form><br><br>

            
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Student ID</th>
                    <th>Name</th>
					<th>Course ID</th>
					<th>Section</th>
                    <th>Grade</th>
					<th>Semester</th>
					<th>Year</th>
					
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['student_id'];?></td>
                    <td><?php echo $row['name'];?></td>
					<td><?php echo $row['course_id'];?></td>
					<td><?php echo $row['section'];?></td>
					<td><?php echo $row['grade'];?></td>
					<td><?php echo $row['semester'];?></td>
					<td><?php echo $row['year'];?></td>
					
					
                    
                </tr>
                <?php endwhile;?>
            </table><br><br>
				<form action = "admin.html"><input type = "submit" value = "Home"/></form><br>
				<form action = "submitform.php"><input type = "submit" value = "ADD NEW DATA"/></form><br>
			
        </form>
        
    </body>
</html>