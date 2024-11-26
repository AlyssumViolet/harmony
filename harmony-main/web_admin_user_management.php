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
        /* 
        .scrollable-table {
            max-height: 300px;
            overflow-y: auto;
        } */

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

        .cut-position {
            margin-left: 15px;
            margin-top: 25px; 
            width: 300px;"

        }
    </style>

<!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-users"></i> User Management</b></h5>
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>     
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>   
    </header>

        <?php 
            $sql_users = "SELECT uname_fld, 
                                 fname_fld, 
                                 lname_fld, 
                                 role_fld, 
                                 email_fld FROM user_tbl";
                $result_users = $mysqli->query($sql_users);
                $rowcount=mysqli_num_rows($result_users);
                $all_users = $result_users->fetch_all();
        ?>

<!-- border: solid red 3px; -->

<div class="w3-container" style="margin-top: 32px">
    <!-- Multi-Tab Navigation for User Management -->
        <div class="w3-bar w3-light-grey">        
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'user_list_id')" id="defaultTab"><h5><b><i class="fa fa-user-circle-o"></i> User List</b></h5></button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event, 'create_user_id')"><h5><b><i class="fa fa-user-plus"></i> Create User</b></h5></button>
        </div>

    <!-- User List Tab -->
        <div id="user_list_id"
             class="w3-container tab-content active-tab"
             style="margin-top: 30px;">
            <table id="userTable" class="display">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Populate table rows with data fetched from the database
                    foreach ($all_users as $column) {
                        echo "<tr>
                                <td>" . htmlspecialchars($column[0]) . "</td>
                                <td>" . htmlspecialchars($column[1]) . "</td>
                                <td>" . htmlspecialchars($column[2]) . "</td>
                                <td>" . htmlspecialchars($column[3]) . "</td>
                                <td>" . htmlspecialchars($column[4]) . "</td>
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

    <!-- User List Tab: Modal for displaying user details -->
        <div id="userModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Update User Details</h3>
                <form id="updateForm">
                    <!-- <input type="hidden" id="uname_id_fld" name="uname_id_fld"> -->
                    <label>Username:</label><br>
                    <input type="text" id="modal_username" name="uname_fld" readonly><br><br>
                    <label>First Name:</label><br>
                    <input type="text" id="modal_fname" name="fname_fld"><br><br>
                    <label>Last Name:</label><br>
                    <input type="text" id="modal_lname" name="lname_fld"><br><br>
                    <label>Email:</label><br>
                    <input type="email" id="modal_email" name="email_fld"><br><br>      
                    <!-- <label>Change Password:</label><br>
                    <input type="password" id="modal_password" name="password_lbl"><br><br>   
                    <div class="error-message" id="password_error">
                        Please enter a password. Must be at least 8 characters long, and contain at least one letter and one number.
                    </div>
                    <label>Confirm Password:</label><br>
                    <input type="password" id="modal_password_confirmation" name="password_confirmation_lbl"><br><br>    
                    <div class="error-message" id="password_confirmation_error">Passwords do not match.</div>       -->
                    <!-- <button type="submit" onclick="validatePassword(event)">Update</button> -->
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>

    <!-- Password Reset Tab: Modal for changing user password -->
        <!-- <div id="passwordModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Change User Password</h3>
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
                        placeholder="Input new password here..." 
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
                        placeholder="Repeat new password here..." 
                        required>
                    <div class="error-message" id="password_confirmation_error">Passwords do not match.</div>
                </div>
                <br>
                <button type="submit">Update Password <i class="fa fa-save"></i></button>
            </form>
            </div> -->
        </div>

    <!-- CREATE USER TAB -->
        <div id="create_user_id" 
             class="w3-container tab-content active-tab cut-position">
             <table>
                <form action="process-users.php" 
                        method="post"
                        id="process-users" 
                        novalidate>
                    <div>
                        <label for="uname_lbl">Username:</label><br>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="uname_lbl" 
                                name="uname_lbl" 
                                placeholder="Input a username here..."
                                required>
                        <div class="error-message" id="uname_error">Please enter a username with at least 8 characters.</div>
                    </div>
                    <br>
                    <div>
                        <label for="fname_lbl">First Name:</label><br>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="fname_lbl" 
                                name="fname_lbl" 
                                placeholder="Input a first name here..."
                                required>
                        <div class="error-message" id="fname_error">Please enter a first name with at least 2 characters.</div>
                    </div>
                    <br>
                    <div>
                        <label for="lname_lbl">Last Name:</label><br>
                        <input class="w3-input w3-border" 
                                type="text" 
                                id="lname_lbl" 
                                name="lname_lbl" 
                                placeholder="Input a last name here..."
                                required>
                        <div class="error-message" id="lname_error">Please enter a last name with at least 2 characters.</div>
                    </div>
                    <br>
                    <div>
                        <label for="role_lbl">Role:</label><br>
                        <select class="w3-input w3-border" name="role_lbl" id="role_lbl" required>
                            <option value=""> < Select > </option>
                            <option value="Administrator">Administrator</option>
                            <option value="Club Advisor">Club Advisor</option>
                            <option value="Campus Supervisor">Campus Supervisor</option>
                        </select>
                        <div class="error-message" id="role_error">Please select a role.</div>
                    </div>
                    <br>
                    <div>
                        <label for="email_lbl">Email:</label><br>
                        <input class="w3-input w3-border" 
                                type="email" 
                                id="email_lbl" 
                                name="email_lbl" 
                                placeholder="domain@example.com"
                                required>
                        <div class="error-message" id="email_error">Please enter a valid email address.</div>
                    </div>
                    <br>
                    <div>
                        <label for="password_lbl">Password:</label><br>
                        <input class="w3-input w3-border" 
                                type="password" 
                                id="password_lbl" 
                                name="password_lbl" 
                                placeholder="Input a password here..."
                                required>
                        <div class="error-message" id="password_error">
                            Please enter a password. Must be at least 8 characters long, and contain at least one letter and one number.
                        </div>
                    </div>
                    <br>
                    <div>
                        <label for="password_confirmation_lbl">Repeat Password:</label><br>
                        <input class="w3-input w3-border" 
                                type="password" 
                                id="password_confirmation_lbl" 
                                name="password_confirmation_lbl"
                                placeholder="Repeat the password here..." 
                                required>
                        <div class="error-message" id="password_confirmation_error">Passwords do not match.</div>
                    </div>
                    <br>
                    <button type="submit" 
                            class="w3-button w3-dark-grey" 
                            onclick="validateForm(event)">Create Account <i class="fa fa-user-plus"></i></button>
                </form>
            </table>
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
    const table =  $('#userTable');

    // $(document).ready(function() {

    //DataTable attributes
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
<script src="user_create_validation.js"></script>
<script src="user_create_action.js"></script>
<!-- <script src="user_password_validation.js"></script> -->

<!-- <script src="user_password_action.js"></script> -->

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
