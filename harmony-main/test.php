<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    </head>
    <body>
<!-- User List Tab: Modal for displaying user details -->
<div id="queue_rules_Modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Update User Details</h3>
        <form id="updateForm">

            <!-- Select2 User List -->
            <label>User:</label><br>
            <select id="modal_user_cs" name="uname_id_fld" class="select2-dropdown" style="width: 100%;" required></select>
            <br><br>
            
            <!-- Select2 Department List -->
            <label>Department:</label><br>
            <select id="modal_department" name="department_id_fld" class="select2-dropdown" style="width: 100%;" required></select>
            <br><br>
            
            <!-- Select2 Program/Admin List -->
            <label>Program/Admin:</label><br>
            <select id="modal_program_admin" name="program_id_fld" class="select2-dropdown" style="width: 100%;" required></select>
            <br><br>
            
            <!-- Select2 Queue Number List -->
            <label>Queue Number:</label><br>
            <select id="modal_queue_number" name="queue_no_id_fld" class="select2-dropdown" style="width: 100%;" required></select>
            <br><br>
            
            <!-- Is Final (Fixed Options) -->
            <label>Is Final:</label><br>
            <select id="modal_is_final" name="is_final_fld" class="select2-dropdown" style="width: 100%;" required>
                <option value="">Select...</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <br><br>

            <button type="submit">Update</button>
        </form>
    </div>
</div>

<script>
$(document).ready(function () {
    // Generic function to initialize Select2 with AJAX
    function initializeSelect2(selector, type) {
        $(selector).select2({
            placeholder: 'Select an option...',
            ajax: {
                url: 'get-queue-rule-details.php',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        type: type // Pass type to the PHP backend
                    };
                },
                processResults: function (data) {
                    return { results: data };
                },
                cache: true
            }
        });
    }

    // Initialize all Select2 dropdowns using the function
    initializeSelect2('#modal_user_cs', 'user');
    initializeSelect2('#modal_department', 'department');
    initializeSelect2('#modal_program_admin', 'program');
    initializeSelect2('#modal_queue_number', 'queue_number');
    initializeSelect2('#modal_is_final', 'is_final');
});
</script>


    </body>
</html>