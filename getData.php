<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<?php
    $mysqlDB = mysqli_connect('69.172.204.200', 'ejcontrerast_ejcontrerast', 'zyIFFTr6YQ','ejcontrerast_myDB');

    if ($mysqlDB->connect_error) {
        die("Connection failed: " . $mysqlDB->connect_error);
      }

    // get the post records
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    
    // database insert SQL code
    $sql = "SELECT * FROM DataReport";
    
    // insert in database 
    $result = $mysqlDB->query($sql);
    $resultstr = "<pre><table>";
    $resultstr .="<tr><th>FirstName</th><th>Lastname</th><th>E-mail</th><th>Telephone</th></tr>";

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $resultstr .= sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$row["FirstName"],$row["LastName"],
        $row["Email"],$row["Telephone"]);
      }
      $resultstr .= "<table></pre>";
    } else {
      $resultstr = "0 results";
    }
    
    echo $resultstr;
    $mysqlDB->close();
?>
</body>
</html>