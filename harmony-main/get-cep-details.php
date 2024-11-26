<?php 
// ini_set('display_errors', 0);
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user_tbl
            WHERE uname_id_fld = {$_SESSION["user_id"]};";

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

// Contents down below will only function if the user is set (Administrator)
if (isset($user) && ($user["role_fld"]) == "Club Advisor") {

    $mysqli = require __DIR__ . "/database.php";

    // Check if the request is via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the posted username from the AJAX request

        $club_event = trim($_POST['clubevent']);
        
        // Prepare the SQL query
        $stmt = $mysqli->prepare("SELECT club_event_name_fld, 
                                            target_date_fld,
                                            participants_fld,
                                            venue_fld,
                                            objectives_fld,
                                            budget_fld,
                                            status_fld,
                                            date_submitted_fld
                                    FROM club_event_proposal_tbl WHERE club_event_name_fld = ?");

        $stmt->bind_param("s", $club_event);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Return the result as a JSON response
        if (count($user) > 0) {
            echo json_encode(['success' => true, 'data' => $user]);
        } else {
            echo json_encode(['success' => false, 'data' => []]);
        }

        $stmt->close();
        $mysqli->close();

    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    }


}else{
    
    header("Location: index.php");
    exit;
            
        } 

?>