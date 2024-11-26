<?php 

// session_start();

// Contents down below will only function if the user is set (Administrator)
// if (isset($user) && ($user["role_fld"]) == "Administrator") {

    // Database connection
    $mysqli = require __DIR__ . "/database.php";

    // Check if the request is via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the posted username from the AJAX request
        $username = trim($_POST['username']);

        // Prepare the SQL query
        $stmt = $mysqli->prepare("DELETE FROM user_tbl WHERE uname_fld = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        // Return the result as a JSON response
        echo json_encode(['success' => true, 'message' => 'Deleted user successfully']);

        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    }



// }else{
    
//     header("Location: index.php");
//     exit;
            
//         } ?>