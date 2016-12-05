<?php
	session_start();

	$dbname = 'cheapomail';
	$dbhost = 'localhost'; 
	$dbuser = 'root'; 
	$dbpass = '';

	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser,$dbpass);

	if(isset($_POST['ID'])) {

	  	$id=$_POST['ID'];
	    $password=$_POST['password'];

	    $stmt =$conn->query("SELECT * FROM user");
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($results as $row) {
	      if($id == $row['id']) {
	        $digest = $row['password'];
	        break;
	      }
	    }
	    if( md5($password)==$digest) {
          header("Location: inbox.php");
      	}
      	else{
      		header("Location: index.html");
      	}
    }
?>