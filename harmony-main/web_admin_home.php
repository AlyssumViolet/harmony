<?php if (isset($user) && ($user["role_fld"]) == "Administrator") {?>
<!-- CONTENT -->
<!-- Header -->

<header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-home"></i> Home</b></h5>
        </header>

        <?php 
        // SQL Query that determines the amount of existing users within the system
          $sql_users = "SELECT COUNT(*) AS user_amount FROM user_tbl";

          $result_users = $mysqli->query($sql_users);
          $user_amount = $result_users->fetch_assoc()['user_amount'];
        ?>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                <h3><?php echo $user_amount; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Users</h4>
            </div>
            </div>

            <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-bell w3-xxxlarge"></i></div>
                <div class="w3-right">
                <h3>50</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Notifications</h4>
            </div>
            </div>
        </div>
<!-- End of Header -->

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
</div>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
