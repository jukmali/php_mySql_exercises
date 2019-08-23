<?php
  require_once('dbinfo.php');

  // Start a session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log him/her in
  if (!isset($_SESSION['userid'])) 
  {
    if (isset($_POST['loging-in'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($username) && !empty($password)) {
        // Fetch the userid, username, password, and city from the database
        $query = "SELECT userid, username, city FROM user WHERE username = '$username' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The login is OK. Set the userid, username, and city session variables. Set the cookies. Redirect to the home page
          $row = mysqli_fetch_array($data);
          
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['city'] = $row['city'];
          
          setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          setcookie('city', $row['city'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          
          // Check this nice way to get the URL of the app's home page
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username or password are incorrect so set an error message
          $error_msg = 'Sorry, the username/password you entered is not correct. Try again!';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in. Try again!';
      }
    }
  }
?>

<!DOCTYPE html>

<html>

<?php
  // If the session data is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['userid'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Login</h1>
  <form method="post" action="login.php">
	Enter your username:<br>
	<input type='text' name='username'>
 	<br>
 	<br>
  
  	Enter your password:<br>
  	<input type='password' name='password'>
  	<br>
  	<br>    
  	
  	<input type="submit" value="Log In" name="loging-in" />
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>

</body>
</html>