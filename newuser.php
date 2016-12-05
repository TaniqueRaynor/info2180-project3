<?php
	$dbname = 'cheapomail';
	$dbhost = 'localhost'; 
	$dbuser = 'root'; 
	$dbpass = '';
	
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$password = $_POST['pword'];

	$digest = md5($password);
	
	$passwordregex ='/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i';

	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser,$dbpass);

	$conn->exec("INSERT INTO user(id, firstName, lastName, userName, password)
		VALUES('$id','$fname','$lname','$uname','$digest')");
?>
<html>
	<head>
	    <title>New Cheapomail User</title>
	    <link href="styles/newuser.css" type="text/css" rel="stylesheet"/>
	    <script src="scripts/newuser.js" type="text/javascript"></script>
	</head>
	<body>
		<form action="newuser.html" class="form">
			<div>
	            <span class="label1">User Info Submitted</span><br/>
	        </div>
		    <input type="submit" value="Add another user"/>
	    </form>
	</body>
</html>