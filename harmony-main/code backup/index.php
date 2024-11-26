<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user_tbl
            WHERE uname_id_fld = {$_SESSION["user_id"]};";

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Harmony</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./harmony_logo_1.png">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@/out/water.css"> -->

        <!-- <script src="./js/validation.js" defer></script> -->
        <!-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" defer></script> -->
            <style>
                html,body,h1,h2,h3,h4,h5 {
                    font-family: "Raleway", sans-serif;
                }
            </style>
        </head>
        <body style ="min-height: 150%;" class="w3-light-grey">
        
<?php 

if (isset($user)) {

            switch ($user["role_fld"]) {

                case "Administrator": 

                    include 'web_admin_index.php';
                
                break;

                case "Club Advisor": 
                
                   include 'web_ca_index.php';
                    // include 'web_cs_index.php';
                
                break;

                case "Campus Supervisor": 
                    
                    include 'web_cs_index.php';

                break;

            }

        }else {
                    
            header("Location: login.php"); 

        } 
?>
  
</body>
</html>