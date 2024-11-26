<?php if (isset($user) && ($user["role_fld"]) == "Club Advisor") {?>
<!-- CONTENT -->
<!-- Header -->

<header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-home"></i> Home</b></h5>
        </header>

        <?php 
        // SQL Query that determines the amount of existing users within the system
          $sql_pending = "SELECT COUNT(status_fld = 'Pending') AS pending_amount FROM club_event_proposal_tbl
                          WHERE submitted_by_fld = '".$user["uname_fld"]."'";

          $result_pending = $mysqli->query($sql_pending);
          $pending_amount = $result_pending->fetch_assoc()['pending_amount'];
        ?>

        <div class="w3-row-padding w3-margin-bottom">

            <div class="w3-quarter">
              <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-magic w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3><?php echo $pending_amount; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Pending Proposals</h4>
              </div>
            </div>

            <div class="w3-quarter">
              <div class="w3-container w3-green w3-padding-16">
                <div class="w3-left"><i class="fa fa-check w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3>13</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Approved Proposals</h4>
              </div>
            </div>

            <div class="w3-quarter">
              <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-close w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3>10</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Disapproved Proposals</h4>
              </div>
            </div>

            <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-bell w3-xxxlarge"></i></div>
                <div class="w3-right">
                <h3>30</h3>
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
    <center><p>Club Advisor Privileges | Powered by <b>Harmony</b></p></center>
  </footer>

  <!-- End page content -->
</div>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
