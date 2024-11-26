function validateForm(event) {
    event.preventDefault();

    const user_cs = document.getElementById('user-search');
    const department = document.getElementById('department-search');
    const program = document.getElementById('program-search');
    const queue_number = document.getElementById('queue-number-search');
    const is_final = document.getElementById('is-final-search');

    let isValid = true;

    resetError(user_cs, 'user_cs_error');
    resetError(department, 'department_error');
    resetError(program, 'program_error');
    resetError(queue_number, 'queue_number_error');
    resetError(is_final, 'is_final_error');

    if (user_cs.value.trim() === "") {
        showError(user_cs, 'user_cs_error');
        isValid = false;
    }
    if (department.value.trim() === "") {
        showError(department, 'department_error');
        isValid = false;
    }
    if (program.value.trim() === "") {
        showError(program, 'program_error');
        isValid = false;
    }
    if (queue_number.value.trim() === "") {
        showError(queue_number, 'queue_number_error');
        isValid = false;
    }
    if (is_final.value.trim() === "") {
        showError(is_final, 'is_final_error');
        isValid = false;
    }

    if (isValid) {
        document.getElementById('process-queue-rules').submit();
    }
}

function showError(inputElement, errorId) {
    inputElement.classList.add('input-error');
    document.getElementById(errorId).style.display = 'block';
}

function resetError(inputElement, errorId) {
    inputElement.classList.remove('input-error');
    document.getElementById(errorId).style.display = 'none';
}
