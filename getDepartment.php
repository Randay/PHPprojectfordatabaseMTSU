
<?php

//department value from html  
$DnoE = $_POST["Dno"];

//The connection to the mysql database  
$mysqlilink = new mysqli('localhost' , 'root', 'root', 'company');
// //test connection 
if(mysqli_connect_errno()){
    exit();
}

//select the department requested from the html  
$query = "SELECT * FROM EMPLOYEE WHERE Dno = '$DnoE'";
$result = $mysqlilink->query($query);
if ($result->num_rows > 0) {
    echo '<table cellpadding="5" cellspacing="5">
            <tr>
            <th>Fname</th>
            <th>Minit</th>
            <th>Lname</th>
            <th>Ssn</th>
            <th>BDATE</th>
            <th>Address</th>
            <th>Sex</th>
            <th>Salary</th>
            <th>Super_ssn</th>
            <th>Dno</th>
            </tr>';
    while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Fname'] . "</td>";
            echo "<td>" . $row['Minit'] . "</td>";
            echo "<td>" . $row['Lname'] . "</td>";
            echo "<td>" . $row['Ssn'] . "</td>";
            echo "<td>" . $row['BDATE'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Sex'] . "</td>";
            echo "<td>" . $row['Salary'] . "</td>";
            echo "<td>" . $row['Super_ssn'] . "</td>";
            echo "<td>" . $row['Dno'] . "</td>";
            echo "</tr>";
    } 
    echo "</table>";
}
else {
    //Don't return any value '
    echo "0 results"."<br>";
}
//close the DBlink 
mysqli_close($mysqlilink);
?>