<?php

//The connection to the mysql database  
$mysqlilink = new mysqli('localhost' , 'root', 'root', 'company');

// //test connection 
if(mysqli_connect_errno()){
    exit();
}

//Update the salary by 10%
$sql = "UPDATE EMPLOYEE SET Salary = Salary + (Salary * 0.10)";
if ($mysqlilink->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqlilink->error;
}

//Display the affected rows 
$query = "SELECT Fname, Minit, Lname, Salary FROM EMPLOYEE ";
$result = $mysqlilink->query($query);
if ($result->num_rows > 0) {
    echo '<table cellpadding="5" cellspacing="5">
            <tr>
            <th>Fname</th>
            <th>Minit</th>
            <th>Lname</th>
            <th>Salary</th>
            </tr>';
    while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Fname'] . "</td>";
            echo "<td>" . $row['Minit'] . "</td>";
            echo "<td>" . $row['Lname'] . "</td>";
            echo "<td>" . $row['Salary'] . "</td>";
            echo "</tr>";
    } 
    echo "</table>";
}
else {
    echo "0 results"."<br>";
}
//close the DBlink 
mysqli_close($mysqlilink);
?>