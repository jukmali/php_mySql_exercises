<!-- This file contains a PHP self-processing form used to demonstrate data validation and sanitization
concepts described in class -->

<!DOCTYPE html>

<!-- PHP Code. This section of the file contains the validation and sanitization examples -->
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['checkInteger'])) { // Check if an input value is an integer
			$value = $_POST['valueInteger'];
			if (filter_var($value, FILTER_VALIDATE_INT) == true) {
				$msg = "The input value ".$value." is an integer";
			} else {
				$msg = "The input value ".$value." is NOT an integer";
			}
		}
		else if (isset($_POST['removeSpaces'])){ // Removing spaces
			$value = $_POST['valueSpaces'];
			$msg = "Your input: '".$value."'"."<br> Your input without spaces: '".trim($value)."'";
		}
		else if (isset($_POST['checkEmail'])){ // Checking if email is valid
			$value = $_POST['valueEmail'];
			if (filter_var($value, FILTER_VALIDATE_EMAIL) == true) {
				$msg = "The input value '".$value."' is a valid email address";
			} else {
				$msg = "The input value '".$value."' is NOT a valid email address";
			}
		}
		else if (isset($_POST['removeTags'])){ // Sanitizing input from suspicious tags
			$value = $_POST['valueTags'];			
			$msg = "Your input: '".htmlspecialchars($value)."'"."<br> Sanitized input: '".filter_var($value, FILTER_SANITIZE_STRING)."'";
		}
		else if (isset($_POST['checkLength'])){ // Checking text length
			$value = $_POST['valueLength'];
			if (strlen($value)<=5) {
				$msg = "The input value '".$value."' does not exceed the max length";
			} else {
				$msg = "The input value '".$value."' EXCEEDS the maximum allowed length of 5 chars";
			}
		}
		else if (isset($_POST['checkQuestion'])){ // Checking expected return values for the radio box selections
			$value = $_POST['question'];
			switch ($value)
			{
				case 'yes':
					$msg = "It's great that you like to code in PHP!";
					break;
				
				case 'no':
					$msg = "Keep practising and you will end up liking coding in PHP!";
					break;
				default:
					$msg = "Invalid option!";
					break;
			}
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
</head>
 
<body>
	<!-- In a self-processing form, the action URL points to this same file, i.e $_SERVER['PHP_SELF'] -->
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Enter an integer value:
		<input type="text" name="valueInteger">
		<input type="submit" name="checkInteger" value="Check integer"><br><br>

		Enter a string with spaces at the beginning and/or at the end:
		<input type="text" name="valueSpaces">
		<input type="submit" name="removeSpaces" value="Remove spaces"><br><br>

		Enter an email address:
		<input type="text" name="valueEmail">
		<input type="submit" name="checkEmail" value="Valid email?"><br><br>

		<?php echo "Enter a text containing suspicious tags<br>"."(ex: "."My name is ".htmlspecialchars("<script //malicious code </script>").")";?><br>
		<input type="text" size="100" name="valueTags">
		<input type="submit" name="removeTags" value="Remove tags"><br><br>

		Enter some text with maximum length of 5 characters :
		<input type="text" name="valueLength">
		<input type="submit" name="checkLength" value="Exceeds 5 chars?"><br><br>

		Do you like to code in PHP?:
		<input type="radio" name="question" id="question_yes" value="yes">
		<label for="question_yes">Yes</label>
		<input type="radio" name="question" id="question_no" value="no">
		<label for="question_no">No</label>
		<input type="submit" name="checkQuestion" value="Check my answer"><br><br>
		
		</form>

	<br>
	Result: <br><?php echo !empty($value)?$msg:'';?>
  	<br><br>
</body>
</html>
