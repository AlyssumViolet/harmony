<?php if (isset($user) && ($user["role_fld"]) == "Club Advisor") {?>
<!-- CONTENT -->
 <style>
      /* User List and Crate User tabs */
      .tab-content {
            display: none;
            margin-top: 30px;
        }    
      .active-tab {
            display: block;
        } 
  </style>
<!-- Header -->

<header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-question-circle"></i> Help</b></h5>
        </header>

 <div class="w3-container" style="margin-top: 32px">
    <!-- Multi-Tab Navigation for User Management -->
        <div class="w3-bar w3-light-grey">      
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'introduction_help_id')" id="defaultTab">
              <h5><b><i class="fa fa-question-circle"></i>&nbsp;<i class="fa fa-book"></i> Introduction</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'user_profile_help_id')">
              <h5><b><i class="fa fa-user"></i>&nbsp;<i class="fa fa-book"></i> User Profile</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'notifications_help_id')">
              <h5><b><i class="fa fa-bell"></i>&nbsp;<i class="fa fa-book"></i> Notifications</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'logout_help_id')">
              <h5><b><i class="fa fa-sign-out"></i>&nbsp;<i class="fa fa-book"></i> Log Out</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'home_help_id')">
              <h5><b><i class="fa fa-home"></i>&nbsp;<i class="fa fa-book"></i> Home</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'calendar_help_id')">
              <h5><b><i class="fa fa-calendar"></i>&nbsp;<i class="fa fa-book"></i> Calendar</b></h5>
            </button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'cem_help_id')">
              <h5><b><i class="fa fa-magic"></i>&nbsp;<i class="fa fa-book"></i> C. E. M.</b></h5>
            </button>
        </div>

    <!-- Introduction Tab -->
        <div id="introduction_help_id"
             class="w3-container tab-content active-tab">
              <p>Introduction</p>
        </div>

    <!-- User Profile Help Tab -->
        <div id="user_profile_help_id" 
             class="w3-container tab-content active-tab">
              <p>User Profile</p>
        </div>

    <!-- Notifications Help Tab -->
        <div id="notifications_help_id" 
            class="w3-container tab-content active-tab">
              <p>Notifications</p>
        </div>

    <!-- Log Out Help Tab -->
        <div id="logout_help_id" 
            class="w3-container tab-content active-tab">
              <p>Log Out</p>
        </div>

    <!-- Home Help Tab -->
        <div id="home_help_id" 
            class="w3-container tab-content active-tab">
              <p>Home</p>
        </div>

    <!-- Calendar Help Tab -->
        <div id="calendar_help_id" 
            class="w3-container tab-content active-tab">
              <p>Calendar</p>
        </div>

    <!-- CEM Help Tab -->
        <div id="cem_help_id" 
            class="w3-container tab-content active-tab">
              <p>Club Event Management</p>
        </div>
  
  
  
 </div>

<!-- End of Content -->

<br>
<br>
<br>
<br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-gray">
    <center><p>Administrator Privileges | Powered by <b>Harmony</b></p></center>
  </footer>

  <!-- End page content -->









<!-- JAVASCRIPT -->
<script>
        
    //JS function for User List and Create User tabs
        function openTab(event, tabName) {            
            // Hides all tab content
            var i, tabContent, tablinks;
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }

            // Removes the active class from all buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
            }

            // Shows the current tab and add an active class to the clicked button
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " w3-dark-grey";
        }

    // Sets the default tab to be open on page load
        document.getElementById("defaultTab").click();

</script>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
