<?php 
	require_once('my_functions.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['check'])) { 
			$day = $_POST['day'];
		}
		else { 
			$day = ''; 
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Check if weekend</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Check if Weekend</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		What day today is?<br>
		<input type="text" name="day">
 		<br><br>
		<input type="submit" name="check" value="Is weekend?">
	</form>

	<br>
	Result: 
	<?php 
		if (isset($day))
			echo (is_weekend($day)?"It is weekend!":"It is school day!");
	?>
  	<br><br>
</body>
</html>
