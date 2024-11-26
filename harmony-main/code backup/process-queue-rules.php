<?php

    // session_start();

    // if (isset($_SESSION["user_id"])) {
    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "SELECT * FROM user_tbl
    //             WHERE uname_id_fld = {$_SESSION["user_id"]};";

    //     $result = $mysqli->query($sql);
        
    //     $user = $result->fetch_assoc();
    // }

    // if (isset($user) && ($user["role_fld"]) === "Administrator") {

    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, 
    //                                          department_id_fld, 
    //                                          program_id_fld, 
    //                                          uname_id_fld, 
    //                                          is_final_fld)
    //             VALUES (?, ?, ?, ?, ?)";
                
    //     $stmt = $mysqli->stmt_init();

    //     if ( ! $stmt->prepare($sql)) {
    //         die("SQL error: " . $mysqli->error);
    //     }

    //     $stmt->bind_param("sssss",
    //                         $_POST["user-search"],
    //                         $_POST["department-search"],
    //                         $_POST["program-search"],
    //                         $_POST["queue-number-search"],
    //                         $_POST["is-final-search"]
    //                     );

    //     header("Location: queue-rule-creation.php");
    //     exit;


    // }else{
            
    //     header("Location: index.php");
    //     exit;
            
    //     }





























    
    // session_start();

    // if (isset($_SESSION["user_id"])) {
    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "SELECT * FROM user_tbl
    //             WHERE uname_id_fld = {$_SESSION["user_id"]};";

    //     $result = $mysqli->query($sql);
        
    //     $user = $result->fetch_assoc();
    // }

    // if (isset($user) && ($user["role_fld"]) === "Administrator") {

    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, 
    //                                          department_id_fld, 
    //                                          program_id_fld, 
    //                                          uname_id_fld, 
    //                                          is_final_fld)
    //             VALUES (?, ?, ?, ?, ?)";
                
    //     $stmt = $mysqli->stmt_init();

    //     if ( ! $stmt->prepare($sql)) {
    //         die("SQL error: " . $mysqli->error);
    //     }

    //     $stmt->bind_param("sssss",
    //                         $_POST["user-search"],
    //                         $_POST["department-search"],
    //                         $_POST["program-search"],
    //                         $_POST["queue-number-search"],
    //                         $_POST["is-final-search"]
    //                     );

    //     header("Location: queue-rule-creation.php");
    //     exit;


    // }else{
            
    //     header("Location: index.php");
    //     exit;
            
    //     }

























    // session_start();

    // if (isset($_SESSION["user_id"])) {
    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "SELECT * FROM user_tbl
    //             WHERE uname_id_fld = {$_SESSION["user_id"]};";

    //     $result = $mysqli->query($sql);
        
    //     $user = $result->fetch_assoc();
    // }

    // if (isset($user) && ($user["role_fld"]) === "Administrator") {

    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, 
    //                                          department_id_fld, 
    //                                          program_id_fld, 
    //                                          uname_id_fld, 
    //                                          is_final_fld)
    //             VALUES (?, ?, ?, ?, ?)";
                
    //     $stmt = $mysqli->stmt_init();

    //     if (
    //         !isset($_POST["user-search"], 
    //                $_POST["department-search"], 
    //                $_POST["program-search"], 
    //                $_POST["queue-number-search"], 
    //                $_POST["is-final-search"])
    //         || empty($_POST["user-search"]) || empty($_POST["department-search"])
    //         || empty($_POST["program-search"]) || empty($_POST["queue-number-search"])
    //         || empty($_POST["is-final-search"])
    //         ) {
    //             var_dump($_POST);
    //             exit;
    //             die("Invalid input: All fields are required.");
    //         }
        





    //     if ( ! $stmt->prepare($sql)) {
    //         die("SQL error: " . $mysqli->error);
    //     }
        

    //     $stmt->bind_param("sssss",
    //                         $_POST["user-search"],
    //                         $_POST["department-search"],
    //                         $_POST["program-search"],
    //                         $_POST["queue-number-search"],
    //                         $_POST["is-final-search"]
    //     );
    
    //     // Execute the query
    //     if ($stmt->execute()) {
    //         header("Location: queue-rule-creation.php");
    //         exit;
    //     } else {
    //         die("Execution failed: " . $stmt->error);
    //     }
        

    //     header("Location: queue-rule-creation.php");
    //     exit;


    // }else{
            
    //     header("Location: index.php");
    //     exit;
            
    //     }






























    // session_start();

    //     if (isset($_SESSION["user_id"])) {
    //         $mysqli = require __DIR__ . "/database.php";

    //         $sql = "SELECT * FROM user_tbl WHERE uname_id_fld = ?";
    //         $stmt = $mysqli->prepare($sql);
    //         $stmt->bind_param("s", $_SESSION["user_id"]);
    //         $stmt->execute();
    //         $user = $stmt->get_result()->fetch_assoc();
    //     }

    // // Determines if the values are properly caught as it should be 
    //     // echo "Queue Number: " . $_POST["queue-number-search"] . "<br>";
    //     // echo "Department: " . $_POST["department-search"] . "<br>";
    //     // echo "Program: " . $_POST["program-search"] . "<br>";
    //     // echo "User: " . $_POST["user-search"] . "<br>";
    //     // echo "Is Final: " . $_POST["is-final-search"] . "<br>";
    //     // echo "Length of Queue Number: " . strlen(trim($_POST["queue-number-search"])) . "<br>";


    // if (isset($user) && $user["role_fld"] === "Administrator") {
        
    //     $mysqli = require __DIR__ . "/database.php";

    //     $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, 
    //                                          department_id_fld, 
    //                                          program_id_fld, 
    //                                          uname_id_fld, 
    //                                          is_final_fld)
    //             VALUES (?, ?, ?, ?, ?)";

    // if (!empty($_POST["queue-number-search"]) && !empty($_POST["department-search"]) &&
    //     !empty($_POST["program-search"]) && !empty($_POST["user-search"]) && 
    //     !empty($_POST["is-final-search"])) {

    //     $stmt = $mysqli->prepare($sql);
    //         $queueNumber = trim($_POST["queue-number-search"]);
    //         $department = trim($_POST["department-search"]);
    //         $program = trim($_POST["program-search"]);
    //         $user = trim($_POST["user-search"]);
    //         $isFinal = trim($_POST["is-final-search"]);
    //     $stmt->bind_param(
    //         "sssss",
    //         $queueNumber,
    //         $department,
    //         $program,
    //         $user,
    //         $isFinal
    //     );

    //     if ($stmt->execute()) {
    //         header("Location: queue-rule-creation.php");
    //         exit;
    //     } else {
    //         die("Insert error: " . $stmt->error);
    //     }
    // }
        

    //     header("Location: queue-rule-creation.php");
    //     exit;
    // } else {
    //     header("Location: index.php");
    //     exit;
    // }



































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


































