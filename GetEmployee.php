<?php
session_start();
$host = "localhost";
$username = "ubfpaldfbdol1";
$password = "cst@8238";
$database = "db1x7kaoxmgk89";

// $username = "cst8238";
// $password = "cst@8238";
// $database = "cst8238";


$q = intval($_GET['q']);
$con = mysqli_connect($host,$username,$password,$database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM Employee WHERE EmployeeId= '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
        <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email Address</th>
        <th>Telephone Number</th>
        <th>SIN</th>
        <th>Password</th>
        </tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['EmailAddress'] . "</td>";
    echo "<td>" . $row['TelephoneNumber'] . "</td>";
    echo "<td>" . $row['SocialInsuranceNumber'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
