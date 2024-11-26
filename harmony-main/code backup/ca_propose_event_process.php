<?php if (isset($user) && ($user["role_fld"]) == "Club Advisor") {

    $club_event_name = $_POST["club_event_name_fld"];
    $target_date = $_POST["target_date_fld"];
    $participants = $_POST["participants_fld"];
    $venue = $_POST["venue_fld"];
    $objectives = $_POST["objectives_fld"];
    $budget = $_POST["budget_fld"];


    if ( ! $terms) {
        die("Terms must be accepted");
    }   

    $host = "localhost";
    $dbname = "harmony_db";
    $username = "root";
    $password = "";
            
    $conn = mysqli_connect(hostname: $host,
                            username: $username,
                            password: $password,
                            database: $dbname);
            
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }           
            
    // CARL DEVELOPER CHANGE FIELD VARIABLES
    $sql = "INSERT INTO club_event_proposal_tbl (club_event_name_fld, 
                                                target_date_fld, 
                                                participants_fld, 
                                                venue_fld, 
                                                objectives_fld, 
                                                budget_fld)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    ?>

<!-- CONTENT -->
<!-- Header -->

<header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-magic"></i> Propose Club Event</b></h5>
            <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
            <script src="./js/validation.js" defer></script>
</header>




    <div class="w3-container" style="margin-top: 32px">
    <?php

    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    
        die(mysqli_error($conn));
    }

    // CARL DEVELOPER CHANGE VARIABLES
    mysqli_stmt_bind_param($stmt, "ssssss",
                            $club_event_name,
                            $target_date,
                            $participants,
                            $venue,
                            $objectives,
                            $budget);

    mysqli_stmt_execute($stmt);

    echo "Record saved.";

    ?>

    </div>

<!-- border: solid red 3px; -->


<!-- End of Header -->

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
