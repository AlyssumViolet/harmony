<?php 

ini_set('display_errors', 0);
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

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    $sql = "SELECT cep_id_fld AS id, venue_fld AS text 
            FROM club_event_proposal_tbl";
    $result = $mysqli->query($sql);
    
    if (!$result) {
        http_response_code(500);
        echo json_encode(["error" => "Database query failed"]);
        exit();
    }
    
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Populate `id` and `text` fields
    }
    
    header("Content-Type: application/json");
    echo json_encode($data);


}else{
    
    header("Location: index.php");
    exit;
            
        } 

?>
