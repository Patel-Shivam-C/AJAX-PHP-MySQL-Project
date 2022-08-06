<?php
session_start();
$host = "localhost";
$username = "ubfpaldfbdol1";
$password = "cst@8238";
$database = "db1x7kaoxmgk89";

// $username = "cst8238";
// $password = "cst@8238";
// $database = "cst8238";
?>

<html>
    <head>
    	<title>Lab 10 - PHP, AJAX and MySQL</title>
    	<link href="StyleSheet.css" rel="StyleSheet">
    </head>
    
    <body>
    		<div id="container">
        		<div id="header">
        			<?php include_once 'headers.php';?>
        		</div>
    		</div>
    		
       		<div id="menu">
        		<?php include_once 'Menu.php';?>
         	</div>
    		
    		<div id="ViewAllEmpolyees.php">
    			<?php 
    			try{
    			    $pdo = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			    echo "Connected successfully"."</br>";
    			    $sqlQuery = "SELECT * FROM Employee";
    			    $result = $pdo->query($sqlQuery);
    			    $rowCount = $result->rowCount();
    			    
    			    if ($rowCount == 0){
    			        echo "**** There are no rows to display from the Table ****";
    			    }else{
    			        for($i=0;$i<$rowCount;++$i){
    			            $row = $result->fetch();
    			            echo "<br/>";
    			            echo "<strong>Employee", $i+1, "</strong>";
    			            echo "<br/>";
    			            echo "First Name: ".$row[1]."<br/>";
    			            echo "Last Name: ".$row[2]."<br/>";
    			            echo "Email Address: ".$row[3]."<br/>";
    			            echo "Phone Number: ".$row[4]."<br/>";
    			            echo "SIN: ".$row[5]."<br/>";
    			            echo "Password: ".$row[6]."<br/>";
    			        }
    			    }
    			    $pdo = null;
    			}catch (PDOException $e){
    			    echo "Connection failed: " .$e->getMessage();
    			}
    			?>
    		</div>
    		
    		<div id="footer">
    			<?php include_once 'Footer.php';?>
    		</div>
    </body>
</html>