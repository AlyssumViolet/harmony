<?php 
    session_start();

        if (isset($_SESSION["user_id"])) {
            $mysqli = require __DIR__ . "/database.php";

            $sql = "SELECT * FROM user_tbl
                    WHERE uname_id_fld = {$_SESSION["user_id"]};";

            $result = $mysqli->query($sql);
            
            $user = $result->fetch_assoc();
        }

    if (isset($user) && ($user["role_fld"]) == "Club Advisor") {

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
            <style>
                html,body,h1,h2,h3,h4,h5 {
                    font-family: "Raleway", sans-serif;
                }
                .user-size {
                    font-size: 110%;
                }
                .role-size {
                    font-size: 90%;
                }
            </style>
    </head>
        <body style ="min-height: 150%;" class="w3-light-grey">

        <!-- Header Content -->
            <div class="w3-bar w3-top w3-purple w3-large" style="z-index:4;">

                <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" 
                        onclick="w3_open();"
                        style="margin-top: 12px;"><i class="fa fa-bars"></i>  Menu</button>

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
            </div>
            <!-- End of Header Content -->

            <!-- Sidebar Content -->
            <br>
            <br>
            <br>
            <nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
                <div class="w3-container w3-row">
                    <div class="w3-col s8 w3-bar" style="width: 280px;">
                        <span class="user-size">Welcome, <strong><?= htmlspecialchars($user["fname_fld"]) . ' ' . htmlspecialchars($user["lname_fld"]); ?>!</strong></span><br>
                        <span class="role-size"><strong><?= htmlspecialchars($user["role_fld"]); ?></strong><span><br>
                    </div>
                </div>
            <hr>
                <div class="w3-container w3-row">
                    <div class="w3-col s8 w3-bar" style="width: 280px;">
                        <a href="harmony_index.php?content=user-profile" class="w3-bar-item w3-button <?= ($current_page == 'user-profile') ? 'active' : ''; ?>"><i class="fa fa-user"></i></a>        
                        <a href="harmony_index.php?content=notification-admin" class="w3-bar-item w3-button <?= ($current_page == 'notification-admin') ? 'active' : ''; ?>"><i class="fa fa-bell"></i></a>
                        <a href="harmony_index.php?content=help-admin" class="w3-bar-item w3-button <?= ($current_page == 'help-admin') ? 'active' : ''; ?>"><i class="fa fa-question-circle"></i></a>
                        <a href="logout.php?content=log-out" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            <!-- End of Sidebar Content -->

            <!-- Dashboard Content -->
                <hr>
                <div class="w3-container">
                    <h5>Dashboard</h5>
                </div>

                <div class="w3-bar-block">
                    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                        <i class="fa fa-remove fa-fw"></i>  Close Menu
                    </a>
                    <a href="harmony_index.php?content=home" class="w3-bar-item w3-button w3-padding">
                        <i class="fa fa-home fa-fw"></i>  Home
                    </a>
                    <a href="harmony_index.php?content=calendar-admin" class="w3-bar-item w3-button w3-padding">
                        <i class="fa fa-calendar fa-fw"></i>  Calendar
                    </a>
                    <a href="harmony_index.php?content=club-event-management-ca" 
                       class="w3-bar-item w3-button w3-padding" 
                       style="background-color: purple !important; 
                              color: white !important;">
                        <i class="fa fa-magic fa-fw"></i>  Club Event Management
                    </a>
                    <!-- <a href="harmony_index.php?content=reports-admin" class="w3-bar-item w3-button w3-padding">
                        <i class="fa fa-flag fa-fw"></i>  Reports
                    </a>
                    <a href="harmony_index.php?content=settings-admin" class="w3-bar-item w3-button w3-padding">
                        <i class="fa fa-cog fa-fw"></i>  Settings 
                    </a> -->
                    <br><br>
                </div>
            </nav>

            <!-- Overlay effect when opening sidebar on small screens -->
            <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
            </div>

            <div class="w3-main" style="margin-left:300px;margin-top:43px;">

                <header class="w3-container" style="padding-top:22px">
                            <h5><b><i class="fa fa-magic"></i> Propose Club Event</b></h5>
                            <p>Club Event proposed successfully!</p>
                </header>

            </div>
            <!-- End of Dashboard Content -->
            
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
} else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
}
}

// Close the sidebar with the close button
function w3_close() {
mySidebar.style.display = "none";
overlayBg.style.display = "none";
}

</script>


    </body>
    </html>


<?php 
    }else{
            
            header("Location: index.php");
            exit;
                
            } 
?>