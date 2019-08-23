<?php
  session_start();

  /* If the session data does not exist (i.e we are starting a new session), try to set the session's data with 
     the cookies that were saved when the user made his/her last login (i.e: the cookies that the client browser is sending in its HTTP GET request to this index.php script)
     This is the code that allows the app to remember the user that last logged in to the app (in the browser/computer that's issuing the HTTP GET request) and left the app without logging out 
  */
  if (!isset($_SESSION['userid'])) {
    if (isset($_COOKIE['userid']) && isset($_COOKIE['username'])) {
      $_SESSION['userid'] = $_COOKIE['userid'];
      $_SESSION['username'] = $_COOKIE['username'];
      // Using city here is for demonstration purposes. In real applications, you should not save personal data in cookies
      $_SESSION['city'] = $_COOKIE['city']; 
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SessionApp</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Session App</h1>
<?php
 
  // Generate the navigation menu
  if (isset($_SESSION['userid'])) {
  	echo 'Hello, '. $_SESSION['username'] . '!'; 
  	echo '<br>';
  	echo 'Here is the proof that I remember you:<br>';
    echo 'You were born in ' . $_SESSION['city'] . '!';
    echo '<br><br>';
    echo '<a href="logout.php">Log Out</a>';
  }
  else {
    echo "Hi!<br>Sign Up if you don't have an account.<br>Login if you already have an account.<br>";
  	echo '<a href="login.php">Log In</a><br>';
    echo '<a href="signup.php">Sign Up</a>';
  }
?>
    </body>
</html>
