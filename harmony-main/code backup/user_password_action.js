//constant variable for Edit Modal
const modal = $('#passwordModal');
const span = $('.close');




//JS function Edit button for User List
function passClick(event) {          

    $.ajax({
        type: 'POST',
        data:  {username: event}, // Sends form data
        dataType: 'json',
        success: function(response) {
            if (response.success) {

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











function validatePassword(event) {
    // Get the password fields and error elements
    const password = document.getElementById('password_lbl');
    const confirmPassword = document.getElementById('password_confirmation_lbl');
    const passwordError = document.getElementById('password_error');
    const confirmPasswordError = document.getElementById('password_confirmation_error');

    let isValid = true;

    // Reset error messages
    passwordError.style.display = 'none';
    confirmPasswordError.style.display = 'none';

    // Validate new password
    if (password.value.trim() === "" || password.value.length < 8 || !/\d/.test(password.value) || !/[a-zA-Z]/.test(password.value)) {
        passwordError.style.display = 'block';
        isValid = false;
    }

    // Validate confirm password
    if (password.value !== confirmPassword.value) {
        confirmPasswordError.style.display = 'block';
        isValid = false;
    }

    // If validation fails, prevent form submission
    if (!isValid) {
        event.preventDefault();
    }

    return isValid;
}