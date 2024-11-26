
<?php if (isset($user) && ($user["role_fld"]) == "Club Advisor") {?>

    <style>
        .w3-bar-item.active {
            background-color: purple !important;
            color: white !important;
        }
        .user-size {
            font-size: 110%;
        }
        .role-size {
            font-size: 90%;
        }      
    </style>

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

      <?php 
        $current_page = isset($_GET['content']) ? $_GET['content'] : 'home';
      ?>

<!-- Sidebar Content -->
<!-- w3-animate-left -->
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
            <a href="harmony_index.php?content=notification-ca" class="w3-bar-item w3-button <?= ($current_page == 'notification-ca') ? 'active' : ''; ?>"><i class="fa fa-bell"></i></a>
            <a href="harmony_index.php?content=help-ca" class="w3-bar-item w3-button <?= ($current_page == 'help-ca') ? 'active' : ''; ?>"><i class="fa fa-question-circle"></i></a>
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
        <a href="harmony_index.php?content=home" class="w3-bar-item w3-button w3-padding <?= ($current_page == 'home') ? 'active' : ''; ?>">
            <i class="fa fa-home fa-fw"></i>  Home
        </a>
        <a href="harmony_index.php?content=calendar-ca" class="w3-bar-item w3-button w3-padding <?= ($current_page == 'calendar-ca') ? 'active' : ''; ?>">
            <i class="fa fa-calendar fa-fw"></i>  Calendar
        <a href="harmony_index.php?content=club-event-management-ca" class="w3-bar-item w3-button w3-padding <?= ($current_page == 'club-event-management-ca') ? 'active' : ''; ?>">
            <i class="fa fa-magic fa-fw"></i>  Club Event Management
        </a>

        <br><br>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!--  -->
        <?php 
        
        if(isset($_GET["content"])){
         
            switch($_GET["content"]){
              
                case "user-profile":
                    include 'web_general_user_profile.php';
                break; 
                
                case "notification-ca":
                
                break;
                
                case "help-ca":
                    include 'web_ca_help.php';                
                break;
                
                case "calendar-ca":
                    include 'web_ca_calendar.php';
                break;

                case "club-event-management-ca":
                    include 'web_ca_event_management.php';
                break;               

                default: 
                    include 'web_ca_home.php';
                break;

            }

        }else{
            include 'web_ca_home.php';
        }

        ?>
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

<?php }else{
        
  header("Location: index.php");
  exit;
        
    } ?>