<?php 

    // Database connection
    $mysqli = require __DIR__ . "/database.php";

    // Check if the request is via POST

        // Retrieve the posted username from the AJAX request
        // $username = trim($_POST['username']);

        // Prepare the SQL query
        $stmt = $mysqli->prepare("SELECT uname_fld, fname_fld, lname_fld, role_fld, email_fld FROM user_tbl");
        $stmt->execute();

        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);

        var_dump($users);
        // Return the result as a JSON response
        // if (count($users) > 0) {
        //     echo json_encode(['success' => true, 'data' => $users]);            
        // } else {
        //     echo json_encode(['success' => false, 'data' => []]);
        // }

        $stmt->close();
        $mysqli->close();
    

?>
