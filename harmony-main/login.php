<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user_tbl
                    WHERE email_fld = '%s'",
                    $mysqli->real_escape_string($_POST["email_lbl"]));


    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password_lbl"], $user["password_hash_fld"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["uname_id_fld"];
            $_SESSION["role"] = $user["role_fld"];

            header("Location: harmony_index.php");
            exit;
        }
    }

    $is_invalid = true;

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
<!-- LOGIN PAGE -->
        <title>Harmony</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./harmony_logo_1.png">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
                html,body,h1,h2,h3,h4,h5 {
                    font-family: "Raleway", sans-serif;
                }
                button {display: "flex";}
                * {
                    box-sizing: border-box;
                }
                
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .login-container {
                    width: 100%;
                    max-width: 400px;
                    background-color: white;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    text-align: left;
                    position: static;
                }

                .login-container h2 {
                    margin-bottom: 20px;
                }

                .login-container input {
                    width: 100%;
                    padding: 12px;
                    margin: 10px 0;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                }

                .login-container button {
                    width: 100%;
                    padding: 12px;
                    background-color: #5902ba;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color ease;
                    margin-top: 20px;
                }

                .login-container button:hover {
                    background-color: #7000ed;
                }

                .error-message {
                    color: red;
                    margin-bottom: 15px;
                }
            </style>
    </head>
        <body style ="min-height: 150%;" class="w3-light-grey">

            <!-- Header Content -->
            <div class="w3-bar w3-top w3-purple w3-large" style="z-index:4; box-shadow: 1px 1px 1px black;">

                <!-- Harmony Logo -->
                <a href="index.php" 
                    style="text-decoration: none;"
                    target="_BLANK"> 
                    <span class="w3-bar-item w3-left" style="
                                    background-image:url('harmony_logo_1.png');
                                    background-size: 100% 100%;
                                    padding: 30px;
                                    margin-left: 13px;   
                                    margin-right: 3px;
                                    margin-top: 3px;
                                    margin-bottom: 3px;">   
                    </span>  
                    <span class="w3-bar-item w3-left" 
                            style="background-image:url('harmony_logo_4.png');
                                background-size: 100% 100%;

                                padding-top: 8px;
                                padding-bottom: 20px;
                                padding-left: 0px;
                                padding-right: 170px;
                                margin-top: 20px;
                                margin-bottom: 3px;">   
                    </span>
                </a>

                <a href="#" 
                    style="text-decoration: none;">
                        <button type="submit" 
                                class="w3-button w3-black"
                                style="position: sticky;
                                        margin-top: 10px;
                                        margin-right: 5px;
                                        left: 90%;">Log In! <i class="fa fa-sign-in"></i>
                        </button>
                </a>
            </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- CONTENT -->
                <div class="login-container">
                    <h2>Log In</h2>

        <?php if ($is_invalid): ?>
            <em class="error-message">Invalid email or password</em>
            <br><br>
        <?php endif; ?>
                    <form method="post">
                        <label for="email_lbl">Email</label>
                        <input class="w3-input w3-border" 
                            type="email" 
                            name="email_lbl" 
                            id="email_lbl"
                            placeholder="domain@example.com"
                            value="<?= htmlspecialchars($_POST['email_lbl'] ?? '') ?>" 
                            required>

                        <label for="password_lbl">Password</label>
                        <input class="w3-input w3-border" 
                            type="password" 
                            name="password_lbl" 
                            id="password_lbl"
                            placeholder="Enter your password" 
                            required>
                        <!-- WALA PA UNG ERROR CSS DITO -->

                        <button type="submit">
                            Log In <i class="fa fa-sign-in"></i>
                        </button>
                    </form>
                </div>

    </body>
    </html>