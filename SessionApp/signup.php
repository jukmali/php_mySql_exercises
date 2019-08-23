<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Sign Up</h1>
<?php
/* This php block will only be executed after the user submits the signup data
 by clicking the sign-up button
*/
session_start();
require_once('dbinfo.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['signing-up'])) {
    // Get the signup data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username'])); //mysqli_real_escape_string is used to enhance security
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $city = mysqli_real_escape_string($dbc, trim($_POST['city']));

    if (!empty($username) && !empty($password1) && !empty($password2) && !empty($city) && ($password1 == $password2)) {
      // Check that the provided username does not yet exist in the database
      $query = "SELECT * FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username does not exist yet, so insert the data into the database.
      	// No need to add userid, because teh userid is configured with AUTO-INCREMENT in the table. MySQL will automatically generate the userid
        // SHA is used to encrypt the password
      	$query = "INSERT INTO user (username, password, city) VALUES ('$username', SHA('$password1'), '$city')"; 
        mysqli_query($dbc, $query);
        
        // Get the userid of the just created account
        $query = "SELECT userid FROM user WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);
        
        // Set the session variables to hold the userid, username, and city of the just created account. Set also the cookies.
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $username;
        $_SESSION['city'] = $city;
        setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        setcookie('username', $username, time() + (60 * 60 * 24 * 30));  // expires in 30 days     
        setcookie('city', $city, time() + (60 * 60 * 24 * 30));  // expires in 30 days
        
        mysqli_close($dbc);
                
        // Confirm success with the user
        echo 'Thanks for signing up, '. $username .'!</br>';
        echo '<p>Your new account has been successfully created. <a href="index.php">Go back to the homepage</a>.</p>';
        
        // echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
            
        // mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo 'An account already exists for this username. Please use a different address.';
        $username = "";
      }
    }
    else {
      echo 'You must enter all of the sign-up data, including the desired password twice.';
    }
  }

  mysqli_close($dbc);
?>

        <p>Provide a username and password to sign up.</p>
        <form action='signup.php' method='post'>
            Enter your username:<br>
            <input type='text' name='username'>
            <br><br>

            In which city were you born?:<br>
            <input type='text' name='city'>
            <br><br>

            Enter a password:<br>
            <input type='password' name='password1'>
            <br><br>

            Retype the password:<br>
            <input type='password' name='password2'>
            <br><br>

            <input type='submit' value='Sign Up' name='signing-up'>
        </form>
    </body>
</html>