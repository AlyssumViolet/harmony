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

        if (empty($_POST["uname_lbl"])) {
            die("Username is required");
        }

        if (strlen($_POST["uname_lbl"]) < 5) {
            die("Username must be at least 8 characters");
        }

        if (empty($_POST["fname_lbl"])) {
            die("First Name is required");
        }

        if (strlen($_POST["fname_lbl"]) < 2) {
            die("First Name must be at least 2 characters");
        }

        if (empty($_POST["lname_lbl"])) {
            die("Last Name is required");
        }

        if (strlen($_POST["lname_lbl"]) < 2) {
            die("Last Name must be at least 2 characters");
        }

        if ( ! filter_var($_POST["email_lbl"], FILTER_VALIDATE_EMAIL)) {
            die("Valid email is required");
        }

        if (strlen($_POST["password_lbl"]) < 8) {
            die("Password must have at least 8 characters");
        }

        if ( ! preg_match("/[a-z]/i", $_POST["password_lbl"])) {
            die("Password must contain at least one letter");
        }

        if ( ! preg_match("/[0-9]/", $_POST["password_lbl"])) {
            die("Password must contain at least one number");
        }

        if ($_POST["password_lbl"] !== $_POST["password_confirmation_lbl"]) {
            die("Passwords must match");
        }

        $password_hash = password_hash($_POST["password_lbl"], PASSWORD_DEFAULT);

        $mysqli = require __DIR__ . "/database.php";

        $sql = "INSERT INTO user_tbl (uname_fld, fname_fld, lname_fld, role_fld, email_fld, password_hash_fld)
                VALUES (?, ?, ?, ?, ?, ?)";
                
        $stmt = $mysqli->stmt_init();

        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("ssssss",
                        $_POST["uname_lbl"],
                        $_POST["fname_lbl"],
                        $_POST["lname_lbl"],
                        $_POST["role_lbl"],
                        $_POST["email_lbl"],
                        $password_hash);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            if ($mysqli->errno === 1062) {
                die("email already taken");
            } 
        }

        header("Location: user-account-creation.php");
        exit;


    }else{
            
        header("Location: index.php");
        exit;
            
        }
