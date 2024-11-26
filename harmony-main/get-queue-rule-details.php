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

    $mysqli = require __DIR__ . "/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $queueId = trim($_POST['queueId']);

        $queueId = (int)$queueId;

// $queueId = 5;
        // $sql = "SELECT * FROM queue_rules_tbl WHERE queue_id_fld = ?";
        $sql = "SELECT a.queue_id_fld as queue_id_fld, 
                                        a.department_id_fld as department_id_fld,
                                        d.department_name_fld as department_name_fld, 
                                        a.program_id_fld as program_id_fld,
                                        e.program_name_fld as program_name_fld, 
                                        b.queue_name_fld as queue_name_fld, 
                                        b.queue_no_fld as queue_no_fld, 
                                        a.is_final_fld as is_final_fld, 
                                        c.uname_fld as uname_fld,
                                        c.uname_id_fld as uname_id_fld,
                                        CONCAT(c.fname_fld, ' ', c.lname_fld) as fullname,
                                        CONCAT(queue_no_fld , ' - ', queue_name_fld) as queue_set
                                FROM queue_rules_tbl AS a
                                LEFT 
                                JOIN queue_tbl AS b 
                                    ON a.queue_no_id_fld = b.queue_no_id_fld
                                LEFT 
                                JOIN user_tbl AS c 
                                    ON a.uname_id_fld = c.uname_id_fld
                                LEFT 
                                JOIN department_tbl AS d
                                    ON a.department_id_fld = d.department_id_fld
                                LEFT 
                                JOIN program_tbl AS e
                                    ON a.program_id_fld = e.program_id_fld
                                WHERE a.queue_id_fld = ?
                                ORDER BY a.queue_id_fld;";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $queueId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = $result->fetch_assoc();

    //    var_dump($data);

        if (count($data) > 0) {
            echo json_encode(['success' => true, 'data' => $data]);
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