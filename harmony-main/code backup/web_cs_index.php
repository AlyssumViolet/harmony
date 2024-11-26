
<?php 
if (isset($user) && ($user["role_fld"]) == "Campus Supervisor") {
  ?>

<!-- Top container -->
<div class="w3-bar w3-top w3-purple w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
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

<!-- Sidebar/menu -->
<!-- w3-animate-left -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">

      <span>Welcome, <strong> <?= htmlspecialchars($user["fname_fld"]).' '.htmlspecialchars($user["lname_fld"]);?>!</strong></span><br>
            <a href="harmony_index.php?content=user-profile-cs" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>        
            <a href="harmony_index.php?content=notifications-cs" class="w3-bar-item w3-button"><i class="fa fa-bell"></i></a>
            <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="harmony_index.php?content=home" class="w3-bar-item w3-button w3-padding ">
        <i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="harmony_index.php?content=calendar-cs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar fa-fw"></i>  Calendar</a>
    <a href="harmony_index.php?content=review-proposal-cs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-magic fa-fw"></i>  Review Proposal</a>
    <a href="harmony_index.php?content=queue-rules-cs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sitemap fa-fw"></i> Queue Rules</a>
    <a href="harmony_index.php?content=user-manual-cs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>  User Manual</a>
    <a href="harmony_index.php?content=settings-cs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!--  -->
        <?php 
        
        if(isset($_GET["content"])){
         
            switch($_GET["content"]){
              
                case "user-profile":
                    include 'web_cs_user_profile.php';
                break; 
                
                case "notifications-cs":
                
                break;
                
                case "calendar-cs":
                
                break;

                case "review-proposal-cs":
                    include 'web_cs_review_proposal.php';
                break;
                
                case "queue-rules-cs":
                
                break; 
                
                case "user-manual-cs":
                
                break;         

                case "settings-cs":
                
                break; 

                default: 
                    include 'web_cs_home.php';
                break;

            }

      }else{
        include 'web_cs_home.php';
      }

        ?>

  <!-- End page content -->
</div>

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

<?php 
}else{
        
  header("Location: login.php");
  exit;
        
    }
     ?>