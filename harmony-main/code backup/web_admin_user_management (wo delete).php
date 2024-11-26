<?php if (isset($user) && ($user["role_fld"]) == "Administrator") {?>
<!-- CONTENT -->
<!-- Header -->
<header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-users"></i> User Management</b></h5>
            <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>     
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>   
            <style>
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
                
                label {
                    margin-bottom: 10px;
                }       

                .tab-content {
                    display: none;
                }
                        
                .active-tab {
                    display: block;
                }        

                .scrollable-table {
                    max-height: 300px;
                    overflow-y: auto;
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
            </style>
        </header>

        <?php 
            $sql_users = "SELECT uname_fld, fname_fld, lname_fld, role_fld, email_fld FROM user_tbl";
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
                                    <button onclick='editClick(\"" . htmlspecialchars($column[0]) . "\")'>Edit</button> 
                                    <button onclick='deleteClick(\"" . htmlspecialchars($column[0]) . "\")'>Delete</button>                                    
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Create User Tab -->
        <div id="create_user_id" 
             class="w3-container tab-content active-tab"
             style="margin-top: 30px; width: 300px;">

        <table>
            <form action="process-users.php" method="post" id="process-users" novalidate>
                <div>
                    <label for="uname_lbl">Username:</label><br>
                    <input class="w3-input w3-border" type="text" id="uname_lbl" name="uname_lbl" required>
                    <div class="error-message" id="uname_error">Please enter a username.</div>
                </div>
                <br>
                <div>
                    <label for="fname_lbl">First Name:</label><br>
                    <input class="w3-input w3-border" type="text" id="fname_lbl" name="fname_lbl" required>
                    <div class="error-message" id="fname_error">Please enter a first name.</div>
                </div>
                <br>
                <div>
                    <label for="lname_lbl">Last Name:</label><br>
                    <input class="w3-input w3-border" type="text" id="lname_lbl" name="lname_lbl" required>
                    <div class="error-message" id="lname_error">Please enter a last name.</div>
                </div>
                <br>
                <div>
                    <label for="role_lbl">Role:</label><br>
                    <select class="w3-input w3-border" name="role_lbl" id="role_lbl" required>
                        <option value=""></option>
                        <option value="Administrator">Administrator</option>
                        <option value="Club Advisor">Club Advisor</option>
                        <option value="Campus Supervisor">Campus Supervisor</option>
                    </select>
                    <div class="error-message" id="role_error">Please select a role.</div>
                </div>
                <br>
                <div>
                    <label for="email_lbl">Email:</label><br>
                    <input class="w3-input w3-border" type="email" id="email_lbl" name="email_lbl" required>
                    <div class="error-message" id="email_error">Please enter a valid email address.</div>
                </div>
                <br>
                <div>
                    <label for="password_lbl">Password:</label><br>
                    <input class="w3-input w3-border" type="password" id="password_lbl" name="password_lbl" required>
                    <div class="error-message" id="password_error">Please enter a password.</div>
                </div>
                <br>
                <div>
                    <label for="password_confirmation_lbl">Repeat Password:</label><br>
                    <input class="w3-input w3-border" type="password" id="password_confirmation_lbl" name="password_confirmation_lbl" required>
                    <div class="error-message" id="password_confirmation_error">Passwords do not match.</div>
                </div>
                <br>
                <br>
                <br>
                <button type="submit" class="w3-button w3-dark-grey" onclick="validateForm(event)">Create Account <i class="fa fa-user-plus"></i></button>
            </form>
        </table>
        </div>

    <!-- Modal for displaying user details -->
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
                <button type="submit">Update</button>
            </form>
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
</div>

<script>
    const modal = $('#userModal');
    const span = $('.close');
    const table =  $('#userTable');

   
     //To Reload The Ajax
    //See DataTables.net for more information about the reload method   

    // $(document).ready(function() {

        table.DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 20, 50],
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "search": "Filter records:"
            }
        });

    // });    
        
        function openTab(event, tabName) {            
            // Hide all tab content
            var i, tabContent, tablinks;
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }

            // Remove the active class from all buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
            }

            // Show the current tab and add an active class to the clicked button
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " w3-dark-grey";
        }

        // Set the default tab to be open on page load
        document.getElementById("defaultTab").click();

        function editClick(event) {
            // event.preventDefault();               

                $.ajax({
                    url: 'get-user-details.php', // The PHP script that handles the request
                    type: 'POST',
                    data:  {username: event}, // Send form data
                    dataType: 'json',
                    success: function(response) {
                        // alert(response.success);
                        // Handle the response and display data
                        if (response.success) {
                            // let users = response.data;
                            // console.log(response.data[]0); 
                            
                            // For testing
                            // console.log(response.data[0].uname_fld);   
                            // console.log(response.data[0].fname_fld);   
                            // console.log(response.data[0].lname_fld);   
                            // console.log(response.data[0].email_fld);   
                            
                            // users.forEach(user => {
                            //     $("#modal_username").val(users.uname_fld);
                            //     $("#modal_fname").val(users.fname_fld);
                            //     $("#modal_lname").val(users.lname_fld);
                            // });

                            // $('#user_id').val(response.data.id);
                            $('#modal_username').val(response.data.uname_fld);
                            $('#modal_fname').val(response.data.fname_fld);
                            $('#modal_lname').val(response.data.lname_fld);
                            $('#modal_email').val(response.data.email_fld);

                            modal.show();

                        } else {
                            // $("#result").html("<p>No users found</p>");
                            console.log("No users found");
                        }
                    },
                    error: function(error) {
                        // $("#result").html("<p>An error occurred while processing your request.</p>");
                        alert("An error occurred while processing your request");
                        console.log(error);
                    }
                });

        }

        // Close the modal
        span.on('click', function () {
            modal.hide();
        });

        $(window).on('click', function (event) {
            if (event.target == modal[0]) {
                modal.hide();
            }
        });
        
        // AJAX form submission to update user
        $("#updateForm").on("submit", function (event) {
                event.preventDefault();

                $.ajax({
                    url: 'update-user.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        alert(response);
                        modal.hide();
                        location.reload();                        
                    }
                });     
            });
            
        function validateForm(event) {
            event.preventDefault();

            // Get input values
            const username = document.getElementById('uname_lbl');
            const firstName = document.getElementById('fname_lbl');
            const lastName = document.getElementById('lname_lbl');
            const role = document.getElementById('role_lbl');
            const email = document.getElementById('email_lbl');
            const password = document.getElementById('password_lbl');
            const passwordConfirm = document.getElementById('password_confirmation_lbl');

            let isValid = true;

            // Reset error messages
            resetError(username, 'uname_error');
            resetError(firstName, 'fname_error');
            resetError(lastName, 'lname_error');
            resetError(role, 'role_error');
            resetError(email, 'email_error');
            resetError(password, 'password_error');
            resetError(passwordConfirm, 'password_confirmation_error');

            // Validate fields
            if (username.value.trim() === "") {
                showError(username, 'uname_error');
                isValid = false;
            }
            if (firstName.value.trim() === "") {
                showError(firstName, 'fname_error');
                isValid = false;
            }
            if (lastName.value.trim() === "") {
                showError(lastName, 'lname_error');
                isValid = false;
            }
            if (role.value === "") {
                showError(role, 'role_error');
                isValid = false;
            }
            if (email.value.trim() === "" || !email.checkValidity()) {
                showError(email, 'email_error');
                isValid = false;
            }
            if (password.value.trim() === "") {
                showError(password, 'password_error');
                isValid = false;
            }
            if (password.value !== passwordConfirm.value) {
                showError(passwordConfirm, 'password_confirmation_error');
                isValid = false;
            }

            // If all validations pass, submit the form
            if (isValid) {
                document.getElementById('process-users').submit();
            }
        }

        // Function to show error
        function showError(inputElement, errorId) {
            inputElement.classList.add('input-error');
            document.getElementById(errorId).style.display = 'block';
        }

        // Function to reset error
        function resetError(inputElement, errorId) {
            inputElement.classList.remove('input-error');
            document.getElementById(errorId).style.display = 'none';
        }    
</script>

<?php }else{
        
        header("Location: index.php");
        exit;
              
          } ?>
