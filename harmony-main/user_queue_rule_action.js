const modal = $('#queue_rules_Modal');
const span = $('.close');

// Initialize Select2 globally
function initializeSelect2() {
    // User Select2
    $('#modal_user_cs').select2({
        ajax: {
            url: 'fetch-users.php',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return { results: data };
            },
            cache: true
        }
    });

    // Department Select2
    $('#modal_department').select2({
        ajax: {
            url: 'fetch-department.php',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return { results: data };
            },
            cache: true
        }
    });

    // Program/Admin Select2
    $('#modal_program_admin').select2({
        ajax: {
            url: 'fetch-program.php',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return { results: data };
            },
            cache: true
        }
    });

    // Queue Number Select2
    $('#modal_queue_number').select2({
        ajax: {
            url: 'fetch-queue-number.php',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return { results: data };
            },
            cache: true
        }
    });

    // Is Final Select2
    $('#modal_is_final').select2({
    });
}
//
function editClick(event) {
    $.ajax({
        url: 'get-queue-rule-details.php',
        type: 'POST',
        data: { queueId: event },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log("Response data:", response.data);

                $('#modal_queue_id').val(response.data.queue_id_fld);

                // const queueIdOption = new Option(response.data.queue_id_fld, response.data.queue_id_fld, true, true);
                // $('#queue_id_cs').append(queueIdOption).trigger('change');

                const departmentOption = new Option(response.data.department_name_fld, response.data.department_id_fld, true, true);
                $('#modal_department').append(departmentOption).trigger('change');

                const programOption = new Option(response.data.program_name_fld, response.data.program_id_fld, true, true);
                $('#modal_program_admin').append(programOption).trigger('change');

                const queueOption = new Option(response.data.queue_set, response.data.queue_no_id_fld, true, true);
                $('#modal_queue_number').append(queueOption).trigger('change');

                const userOption = new Option(response.data.fullname, response.data.uname_id_fld, true, true);
                $('#modal_user_cs').append(userOption).trigger('change');

                $('#modal_is_final').val(response.data.is_final_fld).trigger('change');

                modal.show();
            } else {
                console.error("No data found for the given event.");
            }
        },
        error: function () {
            alert("An error occurred while processing your request");
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

// Initialize Select2 globally
$(document).ready(function () {
    initializeSelect2();
});
























//JS function Delete button for User List
//Deletes the selected user from the database
function deleteClick(event) {           

    if(confirm("Do you really want to delete this queue?")){
        
        $.ajax({
            url: 'delete-queue-rule.php',
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

        alert("Queue deleted successfully");
        location.reload();  
    }else{
        alert("Deleteting queue was cancelled");
    }   

}

// Close the modal in Edit button
span.on('click', function () {
    modal.hide();
});

$(window).on('click', function (event) {
    if (event.target == modal[0]) {
        modal.hide();
    }
});













$("#updateForm").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        url: 'update-queue-rule.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {

            console.log(response);

            alert(response);

            modal.hide();
            location.reload();                        
        }
    });     
});  