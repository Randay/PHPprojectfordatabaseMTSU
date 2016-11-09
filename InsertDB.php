<?php

//variables received from the html   
$EssnW = $_POST["Essn"];
$PnoW = $_POST["Pno"];
$HoursE = $_POST["hours"];

//The connection to the mysql database  
$mysqlilink = new mysqli('localhost' , 'root', 'root', 'company');

//test connection 
if(mysqli_connect_errno()){
    exit();
}

//inserting input from the html into the database 
$sql = "INSERT INTO WORKS_ON(Essn, Pno, Hours) VALUES ('$EssnW','$PnoW','$HoursE')";

//if the insert passes or fails 
if (mysqli_query($mysqlilink, $sql)) {
    echo " New record created successfully"."<hr/>"."<br>";
} else {
    echo "Error: " . $sql . "  " . mysqli_error($mysqlilink)."<br>";
}

//return the values to show they were entered into the database
$query = "SELECT Essn, Pno, Hours FROM WORKS_ON WHERE Essn = '$EssnW'";
$result = $mysqlilink->query($query);
if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Essn: " . $row["Essn"]. "   Pno: " . $row["Pno"]. "   Hours: " . $row["Hours"]."<hr/>" ."<br>";
    } 
}
else {
    //if nothing was effected then output this message 
    echo "0 results"."<br>";
}

//close the DBlink 
mysqli_close($mysqlilink);

?>