<!DOCTYPE html>

<?php 
// This file demonstrates how to implement "self-processing forms"
// This PHP section processes the data submitted via the HTML form defined below. See "HTML FORM"

	if ($_SERVER['REQUEST_METHOD'] == 'POST') /* Check that this file is being executed as the result of a POST method, not as the result of a GET (when we navigate to this page, before entering the form data). The php code below is only executed if this script is being executed via a POST method */
	{
        // Calculate a value for the variable $result depending of which button was pressed
		
		if (isset($_POST['adding'])) { /* 'Add' was pressed. $_POST['adding'] will only be defined (set) if the 'Add' button is pressed */
			$result = $_POST['valuex'] + $_POST['valuey'];
		}
		else if (isset($_POST['subtracting'])){ // 'Subtract' was pressed
			$result = $_POST['valuex'] - $_POST['valuey'];
		}
		else { // 'Clear' was pressed
			$result = ''; // Setting an empty value to $result
		}
    }
?>

<!-- HTML FORM. This section of the file defines the HTML form that displays
the calculator. The HTML code below will always be processed, independently if this file is executed via a POST method or not. -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Simple Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2> Simple Calculator </h2>
            <!-- In a self-processing form, the action URL points to this same file, i.e $_SERVER['PHP_SELF'] -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                Enter a value for X:<br>
                <!-- Pay attention to the embedded PHP code in the next line. What is it actually doing? -->
                <input type="text" name="valuex" value="<?php echo !empty($result)?$_POST['valuex']:'';?>">
                <br><br>

                Enter a value for Y:<br>
                <!-- Here again, we use the same PHP code. As this is a self-processing form the script can remember the values the user entered before pressing the submit button. This way the values remain visible in the form until the user presses 'Clear' -->
                <input type="text" name="valuey" value="<?php echo !empty($result)?$_POST['valuey']:'';?>">
                <br><br>

                Result: <?php echo !empty($result)?$result:'';?>
                <br><br>

                <input type="submit" name="adding" value="X+Y">
                <input type="submit" name="subtracting" value="X-Y">
                <input type="submit" name="clearing" value="Clear">
            </form>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
