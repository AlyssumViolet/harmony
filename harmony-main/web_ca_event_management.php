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
        <!-- Tab Buttons -->
        <div class="w3-bar w3-light-grey">
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'submitted_proposals_id')" id="defaultTab"><h5><b><i class="fa fa-list"></i> Submitted Proposals</b></h5></button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'propose_club_event_id')"><h5><b><i class="fa fa-magic"></i> Propose Club Event</b></h5></button>
        </div>

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




        
    <!-- Propose Club Event -->
        <div id="propose_club_event_id" 
                class="w3-container tab-content active-tab" 
                style="margin-top: 10px;">
                    <form action="process-cep.php" method="post" id="process-cep" novalidate>
                        <br>
                        <label for="club_event_name_lbl">Club Event Name:</label>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="club_event_name_lbl" 
                                name="club_event_name_lbl" 
                                placeholder="Please input your club event name here..." 
                                required>
                        <div class="error-message" id="club_event_name_error">Please enter your proposed Club Event Name here.</div>
                    <br>
                        <label for="target_date_lbl" style="margin-top: 10px;">Target Date:</label>
                        <input class="w3-input w3-border" 
                                type="date" 
                                id="target_date_lbl" 
                                name="target_date_lbl" 
                                required>
                        <div class="error-message" id="target_date_error">Please enter your proposed Target Date here.</div>
                    <br>
                        <label for="participants_lbl" style="margin-top: 10px;">Participants:</label>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="participants_lbl" 
                                name="participants_lbl" 
                                placeholder="Please separate with comma/s (',')" 
                                required>
                        <div class="error-message" id="participants_error">Please enter your proposed Participants here.</div>
                    <br>
                        <label for="venue_lbl" style="margin-top: 10px;">Venue:</label><br>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="venue_lbl" 
                                name="venue_lbl"
                                placeholder="Please input your venue here..."
                                required>
                            <!-- <select class="js-example-basic-single" name="state"> -->
                            <!-- <select class="w3-select w3-border"                                
                                    id="venue_lbl" 
                                    name="venue_lbl[]"
                                    multiple>
                                 <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select> -->
                            
                            <!-- <select id="venue_lbl" name="venue_lbl[]" multiple="multiple" style="width: 100%;"></select> -->

                            <div class="error-message" id="venue_error">Please enter your proposed Venue here.</div>
                    <br>
                    <br>
                        <!-- <label for="objectives_lbl" style="margin-top: 10px;">Objectives:</label>
                        <textarea class="w3-input w3-border" 
                                    id="objectives_lbl" 
                                    name="objectives_lbl"
                                    rows="6" 
                                    placeholder="Please input your objectives here..." 
                                    oninput="autoBullet(this)" 
                                    data-bullet-mode="false" 
                                    required></textarea> 
                            <button type="button" class="w3-button w3-small w3-teal w3-margin-bottom" onclick="toggleBulletMode()" style="margin-top: 10px;">Toggle Bullet Mode</button>
                        -->
                        <label for="objectives_lbl" style="margin-top: 10px;">Objectives:</label>
                            <textarea class="w3-input w3-border" 
                                    id="objectives_lbl" 
                                    name="objectives_lbl"
                                    rows="6" 
                                    placeholder="Please input your objectives here..." 
                                    oninput="autoBullet(this)" 
                                    data-bullet-mode="false" 
                                    required></textarea>
                            <button type="button" 
                                    class="w3-button w3-small w3-teal w3-margin-bottom" 
                                    onclick="toggleBulletMode()" 
                                    style="margin-top: 10px;">Switch to Bullet Mode</button>
                        <div class="error-message" id="objectives_error">Please enter your Objectives here.</div>
                    <br><br>
                        <label for="budget_lbl" style="margin-top: 10px;">Budget Requirement:</label>
                        <input class="w3-input w3-border"
                                type="text" 
                                id="budget_lbl" 
                                name="budget_lbl"
                                placeholder="Please input budget (e.g., $500)" 
                                required>
                        <div class="error-message" id="budget_error">Please enter your proposed Budget here.</div>
                    <br>
                        <!-- <label for="terms_lbl">
                            <input type="checkbox" id="terms_lbl" name="terms_lbl" required>
                            I agree to the terms and conditions
                        </label> 

                    <br>
                    <br>
                    <br> -->

                        <button type="submit" 
                                class="w3-button w3-dark-grey w3-margin-top" 
                                onclick="validateForm(event)">Propose!  <i class="fa fa-magic"></i></button>
                    </form>
        </div>


    </div>

<script>    
    // $(document).ready(function() {
    //     $('#myTable').DataTable({
    //         "pageLength": 5,
    //         "lengthMenu": [5, 10, 20, 50],
    //         "searching": true,
    //         "ordering": true,
    //         "info": true,
    //         "scrollX": true,
    //         "responsive": true,
    //         "language": {
    //             "search": "Filter records:"
    //         }
    //     });
    // });  

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

    
// In your Javascript (external .js resource or <script> tag)
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2({
    //         width: '100%'
    //     });
        
    // });

    























// select2 multiple values for venue (On the works)
//     $(document).ready(function () {
//     // Initializes Select2 with AJAX for available venues
//     $('#venue_lbl').select2({
//         placeholder: "Please select or add venue/s...",
//         tags: true,
//         tokenSeparators: [',', ':'],
//         ajax: {
//             url: "get-venues.php",
//             dataType: 'json',
//             processResults: function (data) {
//                 // Transforms raw data into Select2-compatible format
//                 return {
//                     results: data
//                 };
//             }
//         },
//         createTag: function (params) {
//             var term = $.trim(params.term);
//             if (term === '') {
//                 return null;
//             }

//             return {
//                 id: term,
//                 text: term,
//                 newOption: true // Flags to identify new entries
//             };
//         }
//     });

//     // Prepopulates existing selected venues
//     $.ajax({
//         url: "get-preselected-venues.php",
//         dataType: "json",
//         success: function (preselectedValues) {
//             preselectedValues.forEach(function (value) {
//                 // Adds preselected options dynamically
//                 let option = new Option(value.text, value.id, true, true);
//                 $('#venue_lbl').append(option);
//             });
//             $('#venue_lbl').trigger('change'); // Triggers update
//         },
//         error: function (xhr, status, error) {
//             console.error("Error fetching preselected values:", xhr.responseText, error);
//         }
//     });
// });




















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
