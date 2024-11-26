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
<!-- HARMONY LANDING PAGE -->
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
                .fa-users,.fa-magic,.fa-pencil-square-o {font-size:200px;}
            </style>
    </head>
        <body style ="min-height: 150%;" class="w3-light-grey">

            <!-- Header Content -->
            <div class="w3-bar w3-top w3-purple w3-large" style="z-index:4; box-shadow: 1px 1px 1px black;">

            <!-- Harmony Logo -->
                <a href="#" style="text-decoration: none;"> 
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
            <?php
                if (isset($user)) {

                    echo '
                    
                        <a href="harmony_index.php" 
                            style="text-decoration: none;"
                            target="_BLANK">
                                <button type="submit" 
                                        class="w3-button w3-black"
                                        style="position: sticky;
                                                margin-top: 10px;
                                                margin-right: 5px;
                                                left: 90%;">Welcome! '. htmlspecialchars($user["uname_fld"]) .' <i class="fa fa-user"></i>
                                </button>
                        </a>
                    
                    ';

                }else {
                        
                    echo '
                        <a href="harmony_index.php" 
                            style="text-decoration: none;"
                            target="_BLANK">
                                <button type="submit" 
                                        class="w3-button w3-black"
                                        style="position: sticky;
                                                margin-top: 10px;
                                                margin-right: 5px;
                                                left: 90%;">Log In! <i class="fa fa-sign-in"></i>
                                </button>
                        </a>
                    ';
                } 
            ?>

                
            </div>

            <header class="w3-container w3-deep-purple w3-center" style="padding:128px 16px">
                <h1 class="w3-margin w3-jumbo">Welcome to Harmony!</h1>
                <p class="w3-xlarge">Club Event Proposals made easier</p>
                    <a href="harmony_index.php" 
                        style="text-decoration: none;"
                        target="_BLANK">
                            <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started!
                            </button>
                    </a>
            </header>

            <!-- First Grid -->
                <div class="w3-row-padding w3-padding-64 w3-container">
                    <div class="w3-content">
                        <div class="w3-twothird">
                            <h1>To our Dedicated Users!</h1>
                            <h5 class="w3-padding-32">This application is exclusively for Club Advisors, while Campus Supervisors are tasked with reviewing, evaluating, and approving club event proposals.</h5>

                            <p class="w3-text-grey">Club Events are defined as public or social occasions aimed at a specific purpose and objectives. 
                                                    They cater for the gathering of people, which allows them to socialize, collaborate, and get to know each other. 
                                                    In schools, they are generally provided to students and are handled by respective Clubs/Organizational Teams, which are managed by leading Club Advisors.</p>
                        </div>

                        <div class="w3-third w3-center">
                            <i class="fa fa-users w3-padding-64 w3-text-black"></i>
                        </div>
                    </div>
                </div>

                <!-- Second Grid -->
                <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
                    <div class="w3-content">
                        <div class="w3-third w3-center">
                            <i class="fa fa-magic w3-padding-64 w3-text-black w3-margin-right"></i>
                        </div>

                        <div class="w3-twothird">
                            <h1>Club Event Proposals</h1>
                            <h5 class="w3-padding-32">Club Advisors can now propose their Club Events without providing a printed copy for paperwork!</h5>

                            <p class="w3-text-grey">A proposal consists of information (e.g., event name, target date, participants, etc.) provided in printed form, 
                                                    which is then submitted to Campus Supervisors. 
                                                    Its main disadvantage is the traditional way of doing so, 
                                                    which requires the physical availability of both affiliates within the school's proximity.</p>
                        </div>
                    </div>
                </div>

            <!-- Third Grid -->
            <div class="w3-row-padding w3-padding-64 w3-container">
                    <div class="w3-content">
                        <div class="w3-twothird">
                            <h1>Club Event Approvals</h1>
                            <h5 class="w3-padding-32">Campus Supervisors can now review, evualuate, and approve Club Events in and out of the school!</h5>

                            <p class="w3-text-grey">Proposals are provided to Campus Supervisors in hierarchical order. 
                                They are responsible for ensuring alignment with the school’s rules, policies, and resource availability. 
                                A Club Event Proposal must be approved by all Campus Supervisors to be organized and announced to the participants. 
                                If one of them disapproves, adjustments or cancellations could occur between the two.</p>
                        </div>

                        <div class="w3-third w3-center">
                            <i class="fa fa-pencil-square-o w3-padding-64 w3-text-black"></i>
                        </div>
                    </div>
                </div>


            <br>
            <br>


            <!-- Footer -->
            <footer class="w3-container w3-dark-grey w3-padding-32">
                <div class="w3-row">
                <div class="w3-container w3-third">
                    <h5 class="w3-bottombar w3-border-pink">Harmony</h5>
                    <p>Acknowledgement</p>
                    <p>Developers</p>
                    <p>About</p>
                </div>
                <div class="w3-container w3-third">
                    <h5 class="w3-bottombar w3-border-red">System</h5>
                    <p>Browser</p>
                    <p>OS</p>
                    <p>More</p>
                </div>
                <div class="w3-container w3-third">
                    <h5 class="w3-bottombar w3-border-orange">Users</h5>
                    <p>Administrators</p>
                    <p>Club Advisors</p>
                    <p>Campus Supervisors</p>
                </div>
                </div>
            </footer>

    </body>
    </html>