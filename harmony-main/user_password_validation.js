function validatePassword(event) {
    event.preventDefault();

// Gets input values
    const password = document.getElementById('modal_password');
    const passwordConfirm = document.getElementById('modal_password_confirmation');

    let isValid = true;

// Reset error messages
    resetError(password, 'password_error');
    resetError(passwordConfirm, 'password_confirmation_error');

// Validates fields

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
        document.getElementById('updateForm').submit();
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
