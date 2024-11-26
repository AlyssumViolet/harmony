function validateForm(event) {
    event.preventDefault();

    const club_event_name = document.getElementById('club_event_name_lbl');
    const target_date = document.getElementById('target_date_lbl');
    const participants = document.getElementById('participants_lbl');
    const venue = document.getElementById('venue_lbl');
    const objectives = document.getElementById('objectives_lbl');
    const budget = document.getElementById('budget_lbl');

    let isValid = true;

    resetError(club_event_name, 'club_event_name_error');
    resetError(target_date, 'target_date_error');
    resetError(participants, 'participants_error');
    resetError(venue, 'venue_error');
    resetError(objectives, 'objectives_error');
    resetError(budget, 'budget_error');

    if (club_event_name.value.trim() === "") {
        showError(club_event_name, 'club_event_name_error');
        isValid = false;
    }
    if (target_date.value.trim() === "") {
        showError(target_date, 'target_date_error');
        isValid = false;
    }
    if (participants.value.trim() === "") {
        showError(participants, 'participants_error');
        isValid = false;
    }
    if (venue.value.trim() === "") {
        showError(venue, 'venue_error');
        isValid = false;
    }
    if (objectives.value.trim() === "") {
        showError(objectives, 'objectives_error');
        isValid = false;
    }
    if (budget.value.trim() === "") {
        showError(budget, 'budget_error');
        isValid = false;
    }

    if (isValid) {
        document.getElementById('process-cep').submit();
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
