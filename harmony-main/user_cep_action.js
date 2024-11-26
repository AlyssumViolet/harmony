const modal = $('#cepModal');
const span = $('.close');



//JS function Edit button for User List
    function viewClick(event) {          

        $.ajax({
            url: 'get-cep-details.php',
            type: 'POST',
            data:  {clubevent: event},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                
                    // console.log(response.success);
                    $('#modal_club_event_name').val(response.data.club_event_name_fld);
                    $('#modal_target_date').val(response.data.target_date_fld);
                    $('#modal_participants').val(response.data.participants_fld);
                    $('#modal_venue').val(response.data.venue_fld);
                    $('#modal_objectives').val(response.data.objectives_fld);
                    $('#modal_budget').val(response.data.budget_fld);
                    $('#modal_status').val(response.data.status_fld);
                    $('#modal_date_submitted').val(response.data.date_submitted_fld);

                    modal.show();

                } else {                            
                    console.log("No Club Event Proposals Found");
                }
            },
            error: function(error) {
                alert("An error occurred while processing your request");
                console.log(error);
                // alert(error);
            }
        });

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

