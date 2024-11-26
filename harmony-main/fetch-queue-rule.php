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
if (isset($user) && ($user["role_fld"]) == "Administrator") {

    $mysqli = require __DIR__ . '/database.php';

    $type = $_GET['type'] ?? '';
    $search = $_GET['search'] ?? '';
    
    // Determine SQL query based on the dropdown type
    switch ($type) {
        case 'user':
            $sql = "SELECT uname_id_fld AS id, uname_fld AS text FROM user_tbl WHERE uname_fld LIKE ? LIMIT 10";
            break;
        case 'department':
            $sql = "SELECT department_id_fld AS id, department_name_fld AS text FROM department_tbl WHERE department_name_fld LIKE ? LIMIT 10";
            break;
        case 'program':
            $sql = "SELECT program_id_fld AS id, program_name_fld AS text FROM program_tbl WHERE program_name_fld LIKE ? LIMIT 10";
            break;
        case 'queue_number':
            $sql = "SELECT queue_no_id_fld AS id, queue_name_fld AS text FROM queue_tbl WHERE queue_name_fld LIKE ? LIMIT 10";
            break;
        default:
            echo json_encode([]);
            exit;
    }
    
    $stmt = $mysqli->prepare($sql);
    $searchParam = '%' . $search . '%';
    $stmt->bind_param('s', $searchParam);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = [];
    
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    echo json_encode($data);


}else{
    
    header("Location: index.php");
    exit;
            
        } 

?>