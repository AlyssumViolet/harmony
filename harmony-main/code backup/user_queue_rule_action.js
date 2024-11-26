// const modal = $('#queue_rules_Modal');
// const span = $('.close');    
    
//     //JS function Edit button for User List
//     function editClick(event) {          

//         $.ajax({
//             url: 'get-queue-rule-details.php',
//             type: 'POST',
//             data:  {username: event},
//             dataType: 'json',
//             success: function(response) {
//                 if (response.success) {
                
//                     // console.log(response.success);
//                     $('#modal_user_cs').val(response.data.uname_id_fld);
//                     $('#modal_department').val(response.data.department_id_fld);
//                     $('#modal_program_admin').val(response.data.program_id_fld);
//                     $('#modal_queue_number').val(response.data.queue_no_id_fld);
//                     $('#modal_is_final').val(response.data.is_final_fld);

//                     modal.show();

//                 } else {                            
//                     console.log("No users found");
//                 }
//             },
//             error: function(error) {
//                 alert("An error occurred while processing your request");
//                 console.log(error);
//                 // alert(error);
//             }
//         });

// }

// //JS function Delete button for User List
// //Deletes the selected user from the database
// function deleteClick(event) {           

//     if(confirm("Do you really want to delete this queue?")){
        
//         $.ajax({
//             url: 'delete-queue-rule.php',
//             type: 'POST',
//             data:  {username: event},
//             dataType: 'json',
//             success: function(response) {
                
//                 if (response.success) {
//                     console.log(response.message); 
//                 } else {
//                     console.log("No users found");
//                 }
//             },
//             error: function(error) {
//                 alert("An error occurred while processing your request");
//                 console.log(error);
//             }
//         });

//         alert("Queue deleted successfully");
//         location.reload();  
//     }else{
//         alert("Deleteting queue was cancelled");
//     }   

// }

// // Close the modal in Edit button
// span.on('click', function () {
//     modal.hide();
// });

// $(window).on('click', function (event) {
//     if (event.target == modal[0]) {
//         modal.hide();
//     }
// });

// $("#updateForm").on("submit", function (event) {
//     event.preventDefault();

//     $.ajax({
//         url: 'update-queue-rule.php',
//         type: 'POST',
//         data: $(this).serialize(),
//         success: function (response) {
//             alert(response);
//             modal.hide();
//             location.reload();                        
//         }
//     });     
// });  









// $(document).ready(function () {
//     // Generic function to initialize Select2 with AJAX
//     function editClick(event) {
//         $(selector).select2({
//             placeholder: 'Select an option...',
//             ajax: {
//                 url: 'get-queue-rule-details.php',
//                 dataType: 'json',
//                 delay: 250,
//                 data: function (params) {
//                     return {
//                         search: params.term,
//                         type: type // Pass type to the PHP backend
//                     };
//                 },
//                 processResults: function (data) {
//                     return { results: data };
//                 },
//                 cache: true
//             }
//         });
//     }

//     // Initialize all Select2 dropdowns using the function
//     editClick('#modal_user_cs', 'user');
//     editClick('#modal_department', 'department');
//     editClick('#modal_program_admin', 'program');
//     editClick('#modal_queue_number', 'queue_number');
//     editClick('#modal_is_final', 'is_final');
// });














// $(document).ready(function () {
//     const modal = $('#queue_rules_Modal');
//     const span = $('.close');

//     // Generic function to initialize Select2 dropdowns
//     function initializeSelect2(selector, type, selectedValue = null) {
//         $(selector).select2({
//             placeholder: 'Select an option...',
//             allowClear: true,
//             ajax: {
//                 url: 'fetch-data.php',
//                 dataType: 'json',
//                 delay: 250,
//                 data: function (params) {
//                     return { search: params.term, type: type };
//                 },
//                 processResults: function (data) {
//                     return { results: data };
//                 },
//                 cache: true
//             }
//         }).val(selectedValue).trigger('change');
//     }

//     // Function to handle the Edit button click
//     window.editClick = function (event) {
//         $.ajax({
//             url: 'get-queue-rule-details.php',
//             type: 'POST',
//             // data: { queue_id: queueId },
//             data:  {username: event},
//             dataType: 'json',
//             success: function (response) {
//                 if (response.success) {
//                     // Pre-fill the Select2 dropdowns with the fetched data
//                     initializeSelect2('#modal_user_cs', 'user', response.data.uname_id_fld);
//                     initializeSelect2('#modal_department', 'department', response.data.department_id_fld);
//                     initializeSelect2('#modal_program_admin', 'program', response.data.program_id_fld);
//                     initializeSelect2('#modal_queue_number', 'queue_number', response.data.queue_no_id_fld);
                    
//                     // Set value for "Is Final" dropdown
//                     $('#modal_is_final').val(response.data.is_final_fld).trigger('change');
                    
//                     modal.show();
//                 } else {
//                     alert('No user found');
//                 }
//             },
//             error: function () {
//                 alert('An error occurred while fetching data');
//             }
//         });
//     };

//     // Close the modal when the close button or background is clicked
//     span.on('click', () => modal.hide());
//     $(window).on('click', (event) => {
//         if (event.target == modal[0]) modal.hide();
//     });

//     // Handle the form submission for updating data
//     $("#updateForm").on("submit", function (event) {
//         event.preventDefault();

//         $.ajax({
//             url: 'update-queue-rule.php',
//             type: 'POST',
//             data: $(this).serialize(),
//             success: function (response) {
//                 alert(response);
//                 modal.hide();
//                 location.reload();
//             }
//         });
//     });
// });



























//     //JS function Edit button for User List
//     function editClick(event) {          

//         $.ajax({
//             url: 'get-queue-rule-details.php',
//             type: 'POST',
//             data:  {username: event},
//             dataType: 'json',
//             success: function(response) {
//                 if (response.success) {
                
//                     console.log(response.success);
//                     $('#modal_user_cs').val(response.data.uname_id_fld);
//                     $('#modal_department').val(response.data.department_id_fld);
//                     $('#modal_program_admin').val(response.data.program_id_fld);
//                     $('#modal_queue_number').val(response.data.queue_no_id_fld);
//                     $('#modal_is_final').val(response.data.is_final_fld);

//                     modal.show();

//                 } else {   
//                     // console.log(response.success);                         
//                     console.log("No queues found");
//                 }
//             },
//             error: function(error) {
//                 alert("An error occurred while processing your request");
//                 console.log(error);
//                 // alert(error);
//             }
//         });

// }
















// .select2

// const modal = $('#queue_rules_Modal');
// const span = $('.close');

// function editClick(event) {
//     // event.preventDefault();               

//         $.ajax({
//             url: 'get-queue-rule-details.php', // The PHP script that handles the request
//             type: 'POST',
//             data:  {username: event}, // Send form data
//             dataType: 'json',
//             success: function(response) {
//                 // alert(response.success);
//                 // Handle the response and display data
//                 if (response.success) {
//                     // let users = response.data;

//                     console.log(response.data.uname_id_fld);   
//                     console.log(response.data.department_id_fld);   
//                     console.log(response.data.program_id_fld);   
//                     console.log(response.data.queue_no_id_fld);   
//                     console.log(response.data.is_final_fld);   
                    
//                     // users.forEach(user => {
//                     //     $("#modal_username").val(users.uname_fld);
//                     //     $("#modal_fname").val(users.fname_fld);
//                     //     $("#modal_lname").val(users.lname_fld);
//                     // });


//                     $(document).ready(function() {

//                         //User Select2
//                         $('#modal_user_cs').select2({
//                             placeholder: "Select for a Campus Supervisor...",
//                             ajax: {
//                                 url: 'fetch-users.php',
//                                 type: 'POST',
//                                 dataType: 'json',
//                                 delay: 250,
//                                 data: function (params) {
//                                     return {
//                                         q: params.term
//                                     };
//                                 },
//                                 processResults: function (data) {
//                                     return {
//                                         results: data
//                                     };
//                                 },
//                                 cache: true
//                             },
//                             minimumInputLength: 1
//                         });
                    
                    
//                         //Department Select2
//                         $('#modal_department').select2({
//                             placeholder: "Select for a Department...",
//                             ajax: {
//                                 url: 'fetch-department.php',
//                                 type: 'POST',
//                                 dataType: 'json',
//                                 delay: 250,
//                                 data: function (params) {
//                                     return {
//                                         q: params.term
//                                     };
//                                 },
//                                 processResults: function (data) {
//                                     return {
//                                         results: data
//                                     };
//                                 },
//                                 cache: true
//                             },
//                             minimumInputLength: 1
//                         });
                    
                    
//                         //Program Select2
//                         $('#modal_program_admin').select2({
//                             placeholder: "Search for a Program...",
//                             ajax: {
//                                 url: 'fetch-program.php',
//                                 type: 'POST',
//                                 dataType: 'json',
//                                 delay: 250,
//                                 data: function (params) {
//                                     return {
//                                         q: params.term
//                                     };
//                                 },
//                                 processResults: function (data) {
//                                     return {
//                                         results: data
//                                     };
//                                 },
//                                 cache: true
//                             },
//                             minimumInputLength: 1
//                         });
                    
//                         //Queue Number Select2
//                         $('#modal_queue_number').select2({
//                             placeholder: "e.g. Approved by",
//                             ajax: {
//                                 url: 'fetch-queue-number.php',
//                                 type: 'POST',
//                                 dataType: 'json',
//                                 delay: 250,
//                                 data: function (params) {
//                                     return {
//                                         q: params.term
//                                     };
//                                 },
//                                 processResults: function (data) {
//                                     return {
//                                         results: data
//                                     };
//                                 },
//                                 cache: true
//                             },
//                             minimumInputLength: 1
//                         });
                    
                    
//                     //Is Final Select2
//                         $(document).ready(function() {
//                             $('#modal_is_final').select2();
//                         });
                    
//                     });


























//                     $('#modal_user_cs').val(response.data.uname_id_fld);
//                     $('#modal_department').val(response.data.department_id_fld);
//                     $('#modal_program_admin').val(response.data.program_id_fld);
//                     $('#modal_queue_number').val(response.data.queue_no_id_fld);
//                     $('#modal_is_final').val(response.data.is_final_fld);

//                     modal.show();

//                 } else {
//                     // $("#result").html("<p>No users found</p>");
//                     console.log("No users found");
//                 }
//             },
//             error: function() {
//                 // $("#result").html("<p>An error occurred while processing your request.</p>");
//                 alert("An error occurred while processing your request");
//             }
//         });

// }

// // Close the modal
// span.on('click', function () {
//     modal.hide();
// });

// $(window).on('click', function (event) {
//     if (event.target == modal[0]) {
//         modal.hide();
//     }
// });



































const modal = $('#queue_rules_Modal');
const span = $('.close');

// Initialize Select2 globally
function initializeSelect2() {
    // User Select2
    $('#modal_user_cs').select2({
        placeholder: "Select a Campus Supervisor...",
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
        placeholder: "Select a Department...",
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
        placeholder: "Search for a Program...",
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
        placeholder: "e.g. Approved by",
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
        placeholder: "Select Yes or No"
    });
}

function editClick(event) {
    $.ajax({
        url: 'get-queue-rule-details.php',
        type: 'POST',
        data: { username: event },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log("Response data:", response.data);

                // Manually set selected options
                const userOption = new Option(response.data.uname_id_fld, response.data.uname_id_fld, true, true);
                $('#modal_user_cs').append(userOption).trigger('change');

                const departmentOption = new Option(response.data.department_id_fld, response.data.department_id_fld, true, true);
                $('#modal_department').append(departmentOption).trigger('change');

                const programOption = new Option(response.data.program_id_fld, response.data.program_id_fld, true, true);
                $('#modal_program_admin').append(programOption).trigger('change');

                const queueOption = new Option(response.data.queue_no_id_fld, response.data.queue_no_id_fld, true, true);
                $('#modal_queue_number').append(queueOption).trigger('change');

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














































// $(document).ready(function() {

//     //User Select2
//     $('#modal_user_cs').select2({
//         placeholder: "Select for a Campus Supervisor...",
//         ajax: {
//             url: 'fetch-users.php',
//             type: 'POST',
//             dataType: 'json',
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term
//                 };
//             },
//             processResults: function (data) {
//                 return {
//                     results: data
//                 };
//             },
//             cache: true
//         },
//         minimumInputLength: 1
//     });


//     //Department Select2
//     $('#modal_department').select2({
//         placeholder: "Select for a Department...",
//         ajax: {
//             url: 'fetch-department.php',
//             type: 'POST',
//             dataType: 'json',
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term
//                 };
//             },
//             processResults: function (data) {
//                 return {
//                     results: data
//                 };
//             },
//             cache: true
//         },
//         minimumInputLength: 1
//     });


//     //Program Select2
//     $('#modal_program_admin').select2({
//         placeholder: "Search for a Program...",
//         ajax: {
//             url: 'fetch-program.php',
//             type: 'POST',
//             dataType: 'json',
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term
//                 };
//             },
//             processResults: function (data) {
//                 return {
//                     results: data
//                 };
//             },
//             cache: true
//         },
//         minimumInputLength: 1
//     });

//     //Queue Number Select2
//     $('#modal_queue_number').select2({
//         placeholder: "e.g. Approved by",
//         ajax: {
//             url: 'fetch-queue-number.php',
//             type: 'POST',
//             dataType: 'json',
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term
//                 };
//             },
//             processResults: function (data) {
//                 return {
//                     results: data
//                 };
//             },
//             cache: true
//         },
//         minimumInputLength: 1
//     });


// //Is Final Select2
//     $(document).ready(function() {
//         $('#modal_is_final').select2();
//     });

// });












































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
            alert(response);
            modal.hide();
            location.reload();                        
        }
    });     
});  