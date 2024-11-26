<?php

    session_start();

    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user_tbl
                WHERE uname_id_fld = {$_SESSION["user_id"]};";

        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();
    }

    if (isset($user) && ($user["role_fld"]) === "Administrator") {

        $mysqli = require __DIR__ . "/database.php";

        $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, 
                                             department_id_fld, 
                                             program_id_fld, 
                                             uname_id_fld, 
                                             is_final_fld)
                VALUES (?, ?, ?, ?, ?)";
                
        $stmt = $mysqli->stmt_init();

        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("sssss",
                            $_POST["queue-number-search"],
                            $_POST["department-search"],
                            $_POST["program-search"],
                            $_POST["user-search"],
                            $_POST["is-final-search"]
                        );

        if ($stmt->execute()) {
            header("Location: queue-rule-creation.php");
            exit;
        } else {
            die("Insert error: " . $stmt->error);
        }


    }else{
            
        header("Location: index.php");
        exit;
            
        }


































