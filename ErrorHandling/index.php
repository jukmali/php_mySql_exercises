<!-- This file contains a PHP self-processing form used to demonstrate PHP error handling
concepts described in class -->

<!DOCTYPE html>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['calculate'])) {
			$value = $_POST['valueInteger'];
			
			$msg = "The result is ".(100/$value);
		}
		else if (isset($_POST['connectDb'])){

			$servername = "localhost";
			$username = "root";
			$password = "";
			$value = $_POST['valueDbName'];
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $value); // Connecting to the database
			
			$msg = "You are now connected to the database.";
		}
		else { 
			$value = ''; // Setting an empty value
		}
    }
?>

<!-- HTML FORM. This section of the file defines the HTML form -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Validation and sanitization examples</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
 
<body>
    <h1>Error Handling</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Divide 100 by (or enter "0" to produce an error):
		<input type="text" name="valueInteger">
		<input type="submit" name="calculate" value="Divide"><br><br>

		Enter the name of a database you want to connect to:
		<input type="text" name="valueDbName">
		<input type="submit" name="connectDb" value="Connect to db"><br><br>

	</form>

	<br>
	Result: <br><?php echo !empty($value)?$msg:'';?>
  	<br><br>
</body>
</html>
