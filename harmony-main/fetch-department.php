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

    // Database connection
    $mysqli = require __DIR__ . "/database.php";

    // Check if the request is via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the posted username from the AJAX request
        $searchTerm = isset($_POST['q']) ? trim($_POST['q']) : '';

        // Prepare the SQL query
        $sql = "SELECT department_id_fld , department_name_fld
                    FROM department_tbl
                    WHERE department_id_fld LIKE ?
                    OR department_name_fld LIKE ?
                ORDER BY department_id_fld ASC";
        
        $stmt = $mysqli->prepare($sql);
        $searchTerm = '%' . $searchTerm . '%';
        $stmt->bind_param('ss', $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id' => $row['department_id_fld'],
                'text' => $row['department_name_fld']
            ];
        }

        echo json_encode($data);

        $stmt->close();
        $mysqli->close();
    }

}else{
    
    header("Location: index.php");
    exit;
            
        } 

?>
