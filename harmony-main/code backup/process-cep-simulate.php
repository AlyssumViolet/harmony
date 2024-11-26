<?php

    // Check if the user is logged in
    $host = "localhost";
    $dbname = "harmony_db";
    $username = "harmony";
    $password = "FVBxQ#w5q@A";

    $mysqli = new mysqli(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);
                     
    if ($mysqli->connect_errno) {
        die("Connection error: " . $mysqli->connect_error);
    }

 
    $sql = "SELECT uname_fld, role_fld 
            FROM user_tbl WHERE uname_id_fld = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", 1);
    // $stmt->execute();

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        var_dump($result);
        exit;
    } else {
        die("Database error: " . $stmt->error);
    }

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();


        var_dump($user);

            
           

?>
