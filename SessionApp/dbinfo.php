<?php
    $connectstr_dbhost = '';
    $connectstr_dbname = '';
    $connectstr_dbusername = '';
    $connectstr_dbpassword = '';

    foreach ($_SERVER as $key => $value) {
        if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
            continue;
        }

        $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    }

    // Define database connection constants
    if($connectstr_dbhost != ""){
	define('DB_HOST', $connectstr_dbhost);
	define('DB_USER',  $connectstr_dbusername);
	define('DB_PASSWORD', $connectstr_dbpassword);
	define('DB_NAME', $connectstr_dbname);
    } else {
	define('DB_HOST', "localhost");
	define('DB_USER',  "yt4Wvs67_jer335");
	define('DB_PASSWORD', "PE3GXn3qJpwEvybr");
	define('DB_NAME', "session_db");
    }
?>
