<?php

    $servername = "127.0.0.1:50818";
    $username = "azure";
    $password = "6#vWHD_$";
    $dbname = "localdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br/>";

    $sql = "SELECT * FROM testtable";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["Name"]. "<br>";
        }
    } else {
        echo "0 results";
    }

?>