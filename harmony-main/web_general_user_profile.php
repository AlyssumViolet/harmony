<?php if (isset($user) && ($user["role_fld"]) == "Administrator" || ($user["role_fld"]) == "Club Advisor" || ($user["role_fld"]) == "Campus Supervisor") {?>
<!-- CONTENT -->

<!-- STYLE -->
<style>

    /* Create User error CSS */
        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .input-error {
            border-color: red;
        }

/* Change Password tab */
        .tab-content {
            display: none;
        }
                
        .active-tab {
            display: block;
        }        
</style>

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user"></i> User Profile</b></h5>
</header>


<div class="w3-container" style="margin-top: 32px">
        <!-- Multi-Tab Navigation for User Management -->
        <div class="w3-bar w3-light-grey">        
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'profile_details_id')" id="defaultTab"><h5><b><i class="fa fa-id-badge"></i> Profile Details</b></h5></button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'change_password_id')"><h5><b><i class="fa fa-pencil"></i> Change Password</b></h5></button>
        </div>

    <!-- User Profile -->
        <div id="profile_details_id"
             class="w3-container w3-card w3-white w3-round w3-margin tab-content active-tab"
             style="margin-top: 30px;">

             <p><h3><b><?php echo htmlspecialchars($user['fname_fld']) .' '. htmlspecialchars($user['lname_fld']); ?></b></h3></p>

             <hr>
            <!-- User Profile Content -->
                <div class="w3-row-padding">
                    <div class="w3-col m6">
                        <p><b>First Name:</b> <?php echo htmlspecialchars($user['fname_fld']); ?></p>
                    </div>
                    <div class="w3-col m6">
                        <p><b>Last Name:</b> <?php echo htmlspecialchars($user['lname_fld']); ?></p>
                    </div> 

                    <div class="w3-col m6">
                        <p><b>Username:</b> <?php echo htmlspecialchars($user['uname_fld']); ?></p>
                    </div>
                    <div class="w3-col m6">
                        <p><b>Email:</b> <?php echo htmlspecialchars($user['email_fld']); ?></p>
                    </div>
                    <div class="w3-col m6">
                        <p><b>Role:</b> <?php echo htmlspecialchars($user['role_fld']); ?></p>
                    </div>
                </div>
            <br>
        </div>

    <!-- Change Password Tab -->
        <div id="change_password_id" 
            class="w3-container tab-content active-tab"
            style="margin-top: 30px; width: 300px;">
            <form action="update-profile.php" 
                method="post" 
                id="changePasswordForm" 
                onsubmit="return validatePassword(event)" 
                novalidate>
                <div>
                    <label>New Password:</label><br>
                    <input class="w3-input w3-border" 
                        type="password" 
                        id="password_lbl" 
                        name="password_lbl" 
                        placeholder="Input your new password here..." 
                        required>
                    <div class="error-message" id="password_error">
                        Please enter a password. Must be at least 8 characters long, and contain at least one letter and one number.
                    </div>
                </div>
                <br>
                <div>
                    <label>Repeat Password:</label><br>
                    <input class="w3-input w3-border" 
                        type="password" 
                        id="password_confirmation_lbl" 
                        name="password_confirmation_lbl"
                        placeholder="Repeat your new password here..." 
                        required>
                    <div class="error-message" id="password_confirmation_error">Passwords do not match.</div>
                </div>
                <br>
                <button type="submit" 
                        class="w3-button w3-dark-grey w3-margin-top">Update Password <i class="fa fa-save"></i></button>
            </form>
        </div>

</div>


<!-- End of Content -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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

        function validatePassword(event) {
            // Get the password fields and error elements
            const password = document.getElementById('password_lbl');
            const confirmPassword = document.getElementById('password_confirmation_lbl');
            const passwordError = document.getElementById('password_error');
            const confirmPasswordError = document.getElementById('password_confirmation_error');

            let isValid = true;

            // Reset error messages
            passwordError.style.display = 'none';
            confirmPasswordError.style.display = 'none';

            // Validate new password
            if (password.value.trim() === "" || password.value.length < 8 || !/\d/.test(password.value) || !/[a-zA-Z]/.test(password.value)) {
                passwordError.style.display = 'block';
                isValid = false;
            }

            // Validate confirm password
            if (password.value !== confirmPassword.value) {
                confirmPasswordError.style.display = 'block';
                isValid = false;
            }

            // If validation fails, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }

            return isValid;
        }

</script>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
