function validateForm(event) {
    event.preventDefault();

// Gets input values
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

// Validates fields
    if (username.value.trim() === "") {
        showError(username, 'uname_error');
        isValid = false;
    } else if (username.value.length < 8) {
        showError(username, 'uname_error');
        isValid = false;
    }

    if (firstName.value.trim() === "") {
        showError(firstName, 'fname_error');
        isValid = false;
    } else if (firstName.value.length < 2) {
        showError(firstName, 'fname_error');
        isValid = false;
    }

    if (lastName.value.trim() === "") {
        showError(lastName, 'lname_error');
        isValid = false;
    } else if (lastName.value.length < 2) {
        showError(lastName, 'lname_error');
        isValid = false;
    }

    if (role.value === "") {
        showError(role, 'role_error');
        isValid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.value.trim() === "" || !emailPattern.test(email.value)) {
        showError(email, 'email_error');
        isValid = false;
    }

    if (password.value.trim() === "") {
        showError(password, 'password_error');
        isValid = false;
    } else if (password.value.length < 8 || !/\d/.test(password.value) || !/[a-zA-Z]/.test(password.value)) {
        showError(password, 'password_error');
        isValid = false;
    }

    if (password.value !== passwordConfirm.value) {
        showError(passwordConfirm, 'password_confirmation_error');
        isValid = false;
    }

    // Submit form if all fields are valid
    if (isValid) {
        document.getElementById('process-users').submit();
    }
}

// Shows error message
function showError(inputElement, errorId) {
    inputElement.classList.add('input-error');
    document.getElementById(errorId).style.display = 'block';
}

// Resets error message
function resetError(inputElement, errorId) {
    inputElement.classList.remove('input-error');
    document.getElementById(errorId).style.display = 'none';
}
