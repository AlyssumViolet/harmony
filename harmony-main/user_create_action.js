
//constant variable for Edit Modal
    const modal = $('#userModal');
    const span = $('.close');
    
    
    
//JS function Edit button for User List
    function editClick(event) {          

            $.ajax({
                url: 'get-user-details.php', // Designates PHP script that handles the request
                type: 'POST',
                data:  {username: event}, // Sends form data
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                    
                        // console.log(response.success);
                        $('#modal_username').val(response.data.uname_fld);
                        $('#modal_fname').val(response.data.fname_fld);
                        $('#modal_lname').val(response.data.lname_fld);
                        $('#modal_email').val(response.data.email_fld);

                        modal.show();

                    } else {                            
                        console.log("No users found");
                    }
                },
                error: function(error) {
                    alert("An error occurred while processing your request");
                    console.log(error);
                    // alert(error);
                }
            });

    }

//JS function Delete button for User List
//Deletes the selected user from the database
    function deleteClick(event) {           

        if(confirm("Do you really want to delete user \""+event+"\"?")){
            
            $.ajax({
                url: 'delete-user.php',
                type: 'POST',
                data:  {username: event},
                dataType: 'json',
                success: function(response) {
                    
                    if (response.success) {
                        console.log(response.message); 
                    } else {
                        console.log("No users found");
                    }
                },
                error: function(error) {
                    alert("An error occurred while processing your request");
                    console.log(error);
                }
            });

            alert("Deleted user \""+event+"\" successfully");
            location.reload();      
        }else{
            alert("Deleteting user \""+event+"\" was cancelled");
        }   

    }

// Closes the modal in Edit button
    span.on('click', function () {
        modal.hide();
    });

    $(window).on('click', function (event) {
        if (event.target == modal[0]) {
            modal.hide();
        }
    });
















    // function validatePassword(event) {
    //     event.preventDefault();
    
    // // Gets input values
    //     const password = document.getElementById('modal_password');
    //     const passwordConfirm = document.getElementById('modal_password_confirmation');
    
    //     let isValid = true;
    
    // // Reset error messages
    //     resetError(password, 'password_error');
    //     resetError(passwordConfirm, 'password_confirmation_error');
    
    // // Validates fields
    
    //     if (password.value.trim() === "") {
    //         showError(password, 'password_error');
    //         isValid = false;
    //     } else if (password.value.length < 8 || !/\d/.test(password.value) || !/[a-zA-Z]/.test(password.value)) {
    //         showError(password, 'password_error');
    //         isValid = false;
    //     }
    
    //     if (password.value !== passwordConfirm.value) {
    //         showError(passwordConfirm, 'password_confirmation_error');
    //         isValid = false;
    //     }
    
    //     // Submit form if all fields are valid
    //     if (isValid) {
    //         $("#updateForm").on("submit", function (event) {
    //             event.preventDefault();
        
    //             $.ajax({
    //                 url: 'update-user.php',
    //                 type: 'POST',
    //                 data: $(this).serialize(),
    //                 success: function (response) {
    //                     alert(response);
    //                     modal.hide();
    //                     location.reload();                        
    //                 }
    //             });     
    //         }); 
    //     }
    // }
    
    // // Shows error message
    // function showError(inputElement, errorId) {
    //     inputElement.classList.add('input-error');
    //     document.getElementById(errorId).style.display = 'block';
    // }
    
    // // Resets error message
    // function resetError(inputElement, errorId) {
    //     inputElement.classList.remove('input-error');
    //     document.getElementById(errorId).style.display = 'none';
    // }
    














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