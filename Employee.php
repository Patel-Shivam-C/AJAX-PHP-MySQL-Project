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
    	<script>
            function showUser(str) {
            	if (str == "") {
            		document.getElementById("txtHint").innerHTML = "";
            		return;
            	} else {
            		if (window.XMLHttpRequest) {
            			xmlhttp = new XMLHttpRequest();
            		} else {
            			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            		}
            		xmlhttp.onreadystatechange = function() {
            			if (this.readyState == 4 && this.status == 200) {
            				document.getElementById("txtHint").innerHTML = this.responseText;
            			}
            		};
                    xmlhttp.open("GET","GetEmployee.php?q="+str,true);
                    xmlhttp.send();
            	}
            }
        </script>
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
    		
    		<div id="Employee.php">
    			<?php
    			try{
    			    $pdo = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			    echo "Connected successfully"."</br>";
    			    $sqlQuery = "SELECT * FROM Employee";
    			    $result = $pdo->query($sqlQuery);
    			    $rowCount = $result->rowCount();
    			    
    			    echo '<form>
                			     <select name=users onchange=showUser(this.value)>
                                 <option value="">Select an employee:</option>';
    			    for($i=0;$i<$rowCount;++$i){
        			    $row = $result->fetch();
                        echo '<option value='.($i+1).'>'.$row[1]." ".$row[2].'</option>';
    			    }
                    echo '</select>
                			</form>';
    			    $pdo = null;
    			}catch (PDOException $e){
    			    echo "Connection failed: " .$e->getMessage();
    			}
    			?>
    			<br>
    			<div id="txtHint">
    				<b>Employee Detail</b>
    			</div>
    		</div>
    		
    		<div id="footer">
    			<?php include_once 'Footer.php';?>
    		</div>
    </body>
</html>