<?php
session_start();
session_destroy();
require "vendor/autoload.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>

	<h1>Quiz Web Application</h1>
	<h3>Register your basic information before starting the quiz.</h3>

	<form method="POST" action="register.php">
	<div class= "inner_content">
	<form name= "myForm" method="POST" action="register.php">
		Enter your full name:<br />
		<input type="text" name="complete_name" placeholder="Full Name" />
		<br />
    Email Address:<br />
    <input type= "email" name="email" placehodler= "Email" />
    <br />
		Birthdate:<br />
		<input type="date" name="birthdate" />
    <br />
		<input type="submit">
    
  </div>
	</form>

</body>
</html>

<!-- DEBUG MODE -->
<pre>
<?php
var_dump($_SESSION);
?>
</pre>