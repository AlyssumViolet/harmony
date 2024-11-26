<?php if (isset($user) && ($user["role_fld"]) == "Administrator") {?>
<!-- CONTENT -->
<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user"></i> User Profile</b></h5>
</header>

<div class="w3-container" style="margin-top: 32px">
    <div class="w3-bar w3-light-grey">        
        <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'user_list_id')" id="defaultTab"><h5><b><i class="fa fa-user-circle-o"></i> User List</b></h5></button>
    </div>



</div>

<!-- User Profile Section -->
<div class="w3-container w3-card w3-white w3-round w3-margin">
    <h4><i class="fa fa-id-badge"></i> Profile Details</h4>
    <hr>

    <!-- Profile Information -->
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
    
    <!-- Edit Profile Button -->
    <button class="w3-button w3-dark-grey w3-margin-top" onclick="openEditModal()">Edit Profile <i class="fa fa-pencil"></i></button>
</div>

<!-- Edit Profile Modal -->
<div id="editProfileModal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('editProfileModal').style.display='none'" 
            class="w3-button w3-display-topright">&times;</span>
            <h4>Edit Profile</h4>
        </header>

        <form action="update-profile.php" method="post" class="w3-container">
            <label>Username</label>
            <input class="w3-input w3-border" type="text" name="uname_lbl" value="<?php echo htmlspecialchars($user['uname_fld']); ?>" required>

            <label>First Name</label>
            <input class="w3-input w3-border" type="text" name="fname_lbl" value="<?php echo htmlspecialchars($user['fname_fld']); ?>" required>

            <label>Last Name</label>
            <input class="w3-input w3-border" type="text" name="lname_lbl" value="<?php echo htmlspecialchars($user['lname_fld']); ?>" required>

            <label>Email</label>
            <input class="w3-input w3-border" type="email" name="email_lbl" value="<?php echo htmlspecialchars($user['email_fld']); ?>" required>

            <label>Password</label>
            <input class="w3-input w3-border" type="password" name="password_lbl" placeholder="Enter new password">

            <label>Confirm Password</label>
            <input class="w3-input w3-border" type="password" name="password_confirmation_lbl" placeholder="Repeat new password">

            <button type="submit" class="w3-button w3-dark-grey w3-margin-top">Update Profile <i class="fa fa-save"></i></button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-gray">
    <center><p>Administrator Privileges | Powered by <b>Harmony</b></p></center>
</footer>

<!-- JavaScript for Modal -->
<script>
function openEditModal() {
    document.getElementById('editProfileModal').style.display = 'block';
}
</script>

  <!-- End page content -->

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
