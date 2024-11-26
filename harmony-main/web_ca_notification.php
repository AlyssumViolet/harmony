<?php if (isset($user) && ($user["role_fld"]) == "Club Advisor") {?>
<!-- CONTENT -->
<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-magic"></i> Club Event Management</b></h5>
            <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script> -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       
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

            /* CSS Style for Target Date Input */
                #target_date_lbl {
                    width: 200px;
                }

            /* CSS Style for Tabs */
                .tab-content {
                    display: none;
                }
                .active-tab {
                    display: block;
                }

            /* CSS Style for View Modal */
                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.5);
                }
                .modal-content {
                    background-color: #fefefe;
                    margin: 10% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 50%;
                }


            /* CSS SYLE for close button on View Modal */
                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }
                .close:hover,
                .close:focus {
                    color: black;
                    cursor: pointer;
                }

            /* CSS SYLE for close button on View Modal */    
                #cepModal textarea {
                    width: 100%;
                    max-width: 100%;
                    box-sizing: border-box;
                    resize: vertical;
                    overflow: hidden;
                }
                
            </style>

</header>


        <?php 

            $sql_club_event_proposal = "SELECT club_event_name_fld, 
                                                target_date_fld, 
                                                status_fld,
                                                date_submitted_fld
                                        FROM club_event_proposal_tbl
                                        WHERE submitted_by_fld = '".$user["uname_fld"]."'";

                $result_club_event_proposal = $mysqli->query($sql_club_event_proposal);
                $rowcount=mysqli_num_rows($result_club_event_proposal);
                $all_club_event_proposal = $result_club_event_proposal->fetch_all();

        ?>


    <div class="w3-container" style="margin-top: 32px">

    <!-- Submitted Proposals -->
        <div id="submitted_proposals_id" 
             class="w3-container tab-content active-tab"
             style="margin-top: 10px;">
            <table id="myTable" class="display">
                <br>
                <thead>
                    <tr>
                        <th>Club Event Name</th>
                        <th>Target Date</th>
                        <th>Status</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach ($all_club_event_proposal as $column) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($column[0] ?? "N/A") . "</td>
                                            <td>" . htmlspecialchars($column[1] ?? "N/A") . "</td>
                                            <td>" . htmlspecialchars($column[2] ?? "N/A") . "</td>
                                            <td>" . htmlspecialchars($column[3] ?? "N/A") . "</td>
                                            <td> 
                                                <button style='width: 45px;' onclick='viewClick(\"" . htmlspecialchars($column[0]) . "\")'>View</button>                              
                                            </td>
                                        </tr>";
                            }
                        ?>
                </tbody>
            </table>
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
        </div>  
    <?php
        // echo "<pre>";
        // print_r($all_club_event_proposal);
        // echo "</pre>"; 
    ?>




    <!-- Submitted Proposals - View Modal -->
        <div id="cepModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>View Details</h3>
                <form id="updateForm">
                    <label>Club Event Name:</label><br>
                        <textarea type="text" id="modal_club_event_name" name="club_event_name_fld" readonly></textarea><br><br>
                    
                    <label>Target Date:</label><br>
                        <input type="text" id="modal_target_date" name="target_date_fld" readonly><br><br>
                    
                    <label>Participants:</label><br>
                        <textarea type="text" id="modal_participants" name="participants_fld" readonly></textarea><br><br> 
                    
                    <label>Venue:</label><br>
                        <textarea type="text" id="modal_venue" name="venue_fld" readonly></textarea><br><br>                        
                    <!-- <label>Objectives:</label><br>
                            <input type="text" id="modal_objectives" name="objectives_fld" readonly><br><br> -->

                <!-- rows: height of textarea by default 
                     cols: length of textarea by default -->
                    <label>Objectives:</label><br>
                        <textarea type="text" id="modal_objectives" name="objectives_fld" readonly></textarea><br><br>

                    <label>Budget:</label><br>
                        <textarea type="text" id="modal_budget" name="budget_fld" readonly></textarea><br><br>        
                    
                    <label>Status:</label><br>
                        <textarea type="text" id="modal_status" name="status_fld" readonly></textarea><br><br>          
                    
                    <label>Date Submitted:</label><br>
                        <input type="text" id="modal_date_submitted" name="date_submitted_fld" readonly><br><br>        
                </form>
            </div>
        </div>        




<!-- ENDING DIV TAG FOR CONTAINER -->
    </div>

<script>    

    $('#myTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 20, 50, 100],
        searching: true,
        ordering: true,
        info: true,
        columnDefs: [
            { 
                width: '100%', 
                targets: [0, 1, 2, 3]
            }
        ],
        scrollX: true,
        responsive: true,
        language: {
            "search": "Filter records:" 
        }
    });   	


</script>

<script src="toggle_bullet_mode.js"></script>
<script src="user_cep_action.js"></script>
<script src="user_cep_validation.js"></script>



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
