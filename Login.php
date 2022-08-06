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
    		
    		<div id="Login.php">
    			<?php
    			$error = "";
    			
    			if(!isset($_POST["email"]) || !isset($_POST["password"])){
    			    $error = "**** TRY AGAIN. DON'T FORGOT TO ENTER EMAIL AND PASSWORD ****";
    			}else {
    			    if($_POST["email"] != "" && $_POST["password"] != ""){
    			        
    			        try{
    			            $pdo = new PDO("mysql:host=$host;dbname=$database",$username,$password);
    			            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			            echo "Connected successfully"."</br>";
    			            $sqlQuery = "SELECT * FROM Employee";
    			            $result = $pdo->query($sqlQuery);
    			            $rowCount = $result->rowCount();
    			            
    			            $emailID = $_POST["email"];
    			            $passwd = $_POST["password"];
    			            
    			            for($i=0;$i<$rowCount;++$i){
    			                $row = $result->fetch();
    			                if ($emailID==$row[3] && $passwd==$row[6]){
									echo '<script type="text/javascript"> window.location="ViewAllEmployees.php";</script>';
    			                }else{
    			                    echo "Invalide email or password.";
    			                }
    			            }
    			            $pdo = null;
    			        }catch (PDOException $e){
    			            echo "Connection failed: " .$e->getMessage();
    			        }
    			    }else{
    			        $error = "**** PLEASE FILL UP EVERY DETAIL AND TRY AGAIN ****";
    			    }
    			}
    			?>
    			<form action="Login.php" method="post">
    			     <div>
    			     	Email Address: <input type="email" name="email"><br>
    			     	Password: <input type="text" name="password"><br>
    			     	<input type="submit" name="Login" value="Login"/>
    			     </div>
    			</form>
    		</div>
    		
    		<div id="footer">
    			<?php include_once 'Footer.php';?>
    		</div>
    </body>
</html>