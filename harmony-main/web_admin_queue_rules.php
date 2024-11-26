<?php if (isset($user) && ($user["role_fld"]) == "Administrator") {?>
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

        /* Create User CSS */
        label {
            margin-bottom: 10px;
        }       

        /* User List and Crate User tabs */
        .tab-content {
            display: none;
        }
                
        .active-tab {
            display: block;
        }        

        /* Modal styles */
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

        .select-container { width: 300px; margin: 20px 0; }

        .queue_rules_hr {
            border: 1px solid #888;
        }








    /* Flexbox container to align items side by side */
        .flex-container {
            display: flex;
            gap: 20px; /* Space between inputs */
            margin: 20px 0;
        }

    /* Styling for the input fields */
        .flex-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
    /* Optional: Add some responsiveness */
        @media (max-width: 600px) {
            .flex-container {
                flex-direction: column;
            }
        }        
    </style>

<!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-sitemap"></i> Queue Rules</b></h5>
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>     
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>   
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </header>

        <?php 
            $sql_queue_rules = "SELECT a.queue_id_fld as queue_id_fld, 
                                        c.uname_fld as uname_fld,
                                        CONCAT(c.fname_fld, ' ', c.lname_fld) as fullname,
                                        d.department_name_fld as department_name_fld, 
                                        e.program_name_fld as program_name_fld, 
                                        b.queue_name_fld as queue_name_fld, 
                                        b.queue_no_fld as queue_no_fld, 
                                        a.is_final_fld as is_final_fld
                                FROM queue_rules_tbl AS a
                                LEFT 
                                JOIN queue_tbl AS b 
                                    ON a.queue_no_id_fld = b.queue_no_id_fld
                                LEFT 
                                JOIN user_tbl AS c 
                                    ON a.uname_id_fld = c.uname_id_fld
                                LEFT 
                                JOIN department_tbl AS d
                                    ON a.department_id_fld = d.department_id_fld
                                LEFT 
                                JOIN program_tbl AS e
                                    ON a.program_id_fld = e.program_id_fld
                                ORDER BY a.queue_id_fld;";
            $result_queue_rules = $mysqli->query($sql_queue_rules);
            $rowcount=mysqli_num_rows($result_queue_rules);
            $all_queue_rules = $result_queue_rules->fetch_all();
        ?>

<!-- border: solid red 3px; -->

<div class="w3-container" style="margin-top: 20px">
        <!-- <div class="w3-bar w3-light-grey">        
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'queue_table_id')" id="defaultTab"><h5><b><i class="fa fa-sitemap"></i> Queue Table</b></h5></button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'create_queue_rule_id')"><h5><b><i class="fa fa-plus-square"></i> Create Queue Rule</b></h5></button>
        </div> -->

        <!-- User List Tab -->
        <div id="queue_table_id"
             class="w3-container tab-content active-tab"
             style="margin-top: -13px;">

            <div>
                <table>
                    <form action="process-queue-rules.php" method="post" id="process-queue-rules" novalidate>
                        <!-- Select User Drop Down -->
                        <div class="select-container">
                            <label for="user-search">User:</label><br>
                            <select class="w3-input w3-border" id="user-search" name="user-search" style="width: 100%;" required></select>
                            <div class="error-message" id="user_cs_error">Please select a user.</div>
                        </div>

                        <div class="flex-container">
                            <!-- Select Department Drop Down -->
                            <div class="select-container">
                                <label for="department-search">Department:</label><br>
                                <select class="w3-input w3-border flex-input" id="department-search" name="department-search" required></select>
                                <div class="error-message" id="department_error">Please select a department.</div>
                            </div>

                            <!-- College Program -->
                            <div class="select-container">
                                <label for="program-search">Program/Supervisor Role:</label><br>
                                <select class="w3-input w3-border flex-input" id="program-search" name="program-search" required></select>
                                <div class="error-message" id="program_error">Please select a college program.</div>
                            </div>
                        </div>

                        <div class="flex-container">
                            <!-- Select Queue Number Drop Down -->
                            <div class="select-container">
                                <label for="queue-number-search">Queue Number:</label><br>
                                <select class="w3-input w3-border flex-input" id="queue-number-search" name="queue-number-search" required></select>
                                <div class="error-message" id="queue_number_error">Please select a queue number.</div>
                            </div>

                            <!-- Select Is Final Drop Down -->
                            <div class="select-container">
                                <label for="is-final-search">Is Final:</label><br>
                                <select class="w3-input w3-border flex-input" id="is-final-search" name="is-final-search" required>
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="error-message" id="is_final_error">Please select between the two.</div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="w3-button w3-dark-grey" onclick="validateForm(event)">Create Queue Rule <i class="fa fa-fast-forward"></i> <i class="fa fa-plus-square"></i></button>
                    </form>
                </table>
            </div>          

            <br>
                <hr class="queue_rules_hr">
            <br>

            <table id="queueTable" class="display">
                <thead>
                    <tr>
                        <th>Queue ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Department Name</th>
                        <th>Program Name</th>
                        <th>Queue Name</th>
                        <th>Queue Number</th>
                        <th>Is Final</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Populate table rows with data fetched from the database
                    foreach ($all_queue_rules as $column) {
                        echo "<tr style>
                                <td>" . htmlspecialchars($column[0]) . "</td>
                                <td>" . htmlspecialchars($column[1]) . "</td>
                                <td>" . htmlspecialchars($column[2]) . "</td>
                                <td>" . htmlspecialchars($column[3]) . "</td>
                                <td>" . htmlspecialchars($column[4]) . "</td>
                                <td>" . htmlspecialchars($column[5]) . "</td>
                                <td>" . htmlspecialchars($column[6]) . "</td>
                                <td>" . htmlspecialchars($column[7]) . "</td>
                                <td> 
                                    <button style='width: 45px;' onclick='editClick(\"" . htmlspecialchars($column[0]) . "\")'>Edit</button>
                                    <button style='width: 45px;' onclick='deleteClick(\"" . htmlspecialchars($column[0]) . "\")'>Delete</button>                                    
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>


    <!-- QUEUE RULE EDIT MODAL -->
        <div id="queue_rules_Modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Update Queue Rule</h3>
                <form id="updateForm">

                    <!-- Queue ID Input -->
                    <label>Queue ID:</label>                    
                    <input type="text" id="modal_queue_id" name="queue_id_fld" readonly></input>
                    <br>
                    <br>

                    <!-- User Select2 -->
                    <label>User:</label>
                    <select id="modal_user_cs" name="uname_id_fld" class="select2-dropdown" style="width: 100%;" required>
                        <option value="">Select User</option>
                    </select>
                    <br>
                    <br>

                    <!-- Department Select2 -->
                    <label>Department:</label>
                    <select id="modal_department" name="department_id_fld" class="select2-dropdown" style="width: 100%;" required>
                        <option value="">Select Department</option>
                    </select>
                    <br>
                    <br>

                    <!-- Program/Admin Select2 -->
                    <label>Program/Admin:</label>
                    <select id="modal_program_admin" name="program_id_fld" class="select2-dropdown" style="width: 100%;" required>
                        <option value="">Select Program/Admin</option>
                    </select>
                    <br>
                    <br>

                    <!-- Queue Number Select2 -->
                    <label>Queue Number:</label>
                    <select id="modal_queue_number" name="queue_no_id_fld" class="select2-dropdown" style="width: 100%;" required>
                        <option value="">Select Queue Number</option>
                    </select>
                    <br>
                    <br>

                    <!-- Is Final -->
                    <label>Is Final:</label>
                    <select id="modal_is_final" name="is_final_fld" style="width: 100%;" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <br>
                    <br>

                    <button type="submit">Update</button>
                </form>
            </div>
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
    //constant variable for Edit Modal
    const table =  $('#queueTable');

    // $(document).ready(function() {

    //DataTable attributes for Queue List
        table.DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100],
            searching: true,
            ordering: true,
            info: true,
            columnDefs: [
                { 
                    width: '20%', 
                    targets: [0, 1, 2, 3, 4, 5]
                }
            ],
            scrollX: true,
            responsive: true,
            language: {
                "search": "Filter records:" 
            }
        });

    // });    

    // select2 (search bar) for Creating Queue Rule
        $(document).ready(function() {



        //User Select2
            $('#user-search').select2({
                placeholder: "Select a User...",
                ajax: {
                    url: 'fetch-users.php',
                    type: 'POST',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

        //Department Select2
            $('#department-search').select2({
                placeholder: "Select a Department...",
                ajax: {
                    url: 'fetch-department.php', // Fetches credentials from this script
                    type: 'POST',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term // Sends the search term entered by the user
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data // Populates dropdown with the results
                        };
                    },
                    cache: true
                }
            });

        //Program Select2
            $('#program-search').select2({
                placeholder: "Select a Program/Supervisor Role...",
                ajax: {
                    url: 'fetch-program.php',
                    type: 'POST',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

        //Queue Number Select2
            $('#queue-number-search').select2({
                placeholder: "Search for a Queue Number...",
                ajax: {
                    url: 'fetch-queue-number.php',
                    type: 'POST',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

        //Is Final Select2
            $(document).ready(function() {
                $('#is-final-search').select2();
            });

        });


</script>
<script src="user_queue_rule_validation.js"></script>
<script src="user_queue_rule_action.js"></script>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
