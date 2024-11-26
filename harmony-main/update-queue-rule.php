<?php



$mysqli = require __DIR__ . "/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, department_id_fld, program_id_fld, uname_id_fld, is_final_fld)";

    
    
    
    // $sql = "SELECT queue_no_id_fld, 
    //                 department_id_fld,
    //                 program_id_fld,
    //                 uname_id_fld,
    //                 is_final_fld FROM queue_rules_tbl  
    //         WHERE queue_id_fld = ?";




    // $sql = "SELECT * FROM queue_rules_tbl WHERE queue_id_fld = ?";

    $user = $_POST['uname_id_fld'];
    $department = $_POST['department_id_fld'];
    $program = $_POST['program_id_fld'];
    $queueNumber = $_POST['queue_no_id_fld'];
    $isFinal = $_POST['is_final_fld'];
    $queueId = $_POST['queue_id_fld'];

    $sql = "UPDATE queue_rules_tbl SET 
                    uname_id_fld = ?,
                    department_id_fld = ?,
                    program_id_fld = ?,
                    queue_no_id_fld = ?,
                    is_final_fld = ?
            WHERE queue_id_fld = ?";    

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        "ssssss",
        $user,
        $department,
        $program,
        $queueNumber,
        $isFinal,
        $queueId
    );


    // $stmt = $mysqli->prepare($sql);
    // $stmt->bind_param(
    //     "s",
    //     $queueId 
    // );

    // echo var_dump($user);
    $stmt->execute();
    $result = $stmt->get_result();

    // echo "Queue Rule updated successfully!";

    $stmt->close();
    $mysqli->close();

    if ($result) {
        echo var_dump($result);
    } else {
        echo "Queue Rule updated successfully!"; 
    }

    // echo var_dump($result);
}






























// $mysqli = require __DIR__ . "/database.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     // $sql = "INSERT INTO queue_rules_tbl (queue_no_id_fld, department_id_fld, program_id_fld, uname_id_fld, is_final_fld)";
    
//     $sql = "UPDATE queue_rules_tbl AS a
//             LEFT JOIN queue_tbl AS b 
//                 ON a.queue_no_id_fld = b.queue_no_id_fld
//             LEFT JOIN user_tbl AS c 
//                 ON a.uname_id_fld = c.uname_id_fld
//             LEFT JOIN department_tbl AS d
//                 ON a.department_id_fld = d.department_id_fld
//             LEFT JOIN program_tbl AS e
//                 ON a.program_id_fld = e.program_id_fld
//             SET 
//                 a.department_id_fld = d.department_id_fld,
//                 a.program_id_fld = e.program_id_fld,
//                 a.is_final_fld = a.is_final_fld
//             WHERE 
//                 a.queue_id_fld = ?";
   
 
// $queueId = ['queue_id_fld'];
// $user = $_POST['uname_id_fld'];
// $department = $_POST['department_id_fld'];
// $program = $_POST['program_id_fld'];
// $queueNumber = $_POST['queue_no_id_fld'];
// $isFinal = $_POST['is_final_fld'];

//     $stmt = $mysqli->prepare($sql);
//     $stmt->bind_param(
//         "ssssss",
//         $queueId,
//         $user,
//         $department,
//         $program,
//         $queueNumber,
//         $isFinal
//     );
//     $stmt->execute();

//     alert("Queue Rule updated successfully!");

//     // echo "Queue Rule updated successfully!";
// }





































// $mysqli = require __DIR__ . "/database.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // $sql = "UPDATE queue_rules_tbl AS a
//     //         SET 
//     //             a.department_id_fld = ?,
//     //             a.program_id_fld = ?,
//     //             a.is_final_fld = ?
//     //         WHERE 
//     //             a.queue_id_fld = ?";


//     // $sql = "UPDATE queue_rules_tbl AS a
//     //         LEFT JOIN queue_tbl AS b 
//     //             ON a.queue_no_id_fld = b.queue_no_id_fld
//     //         LEFT JOIN user_tbl AS c 
//     //             ON a.uname_id_fld = c.uname_id_fld
//     //         LEFT JOIN department_tbl AS d
//     //             ON a.department_id_fld = d.department_id_fld
//     //         LEFT JOIN program_tbl AS e
//     //             ON a.program_id_fld = e.program_id_fld
//     //         SET 
//     //             a.department_id_fld = d.department_id_fld,
//     //             a.program_id_fld = e.program_id_fld,
//     //             a.is_final_fld = a.is_final_fld
//     //         WHERE 
//     //             a.queue_id_fld = ?";


//     // $sql = "UPDATE queue_rules_tbl SET 
//     //                 queue_no_id_fld = ?,
//     //                 department_id_fld = ?,
//     //                 program_id_fld = ?,
//     //                 uname_id_fld = ?,
//     //                 is_final_fld = ?,
//     //         WHERE queue_id_fld = ?";

//     $sql = "SELECT a.queue_id_fld as queue_id_fld, 
//                                     a.department_id_fld as department_id_fld,
//                                     d.department_name_fld as department_name_fld, 
//                                     a.program_id_fld as program_id_fld,
//                                     e.program_name_fld as program_name_fld, 
//                                     b.queue_name_fld as queue_name_fld, 
//                                     b.queue_no_fld as queue_no_fld, 
//                                     a.is_final_fld as is_final_fld, 
//                                     c.uname_fld as uname_fld,
//                                     CONCAT(c.fname_fld, ' ', c.lname_fld) as fullname,
//                                     CONCAT(queue_no_fld , ' - ', queue_name_fld) as queue_set
//                                     FROM queue_rules_tbl AS a
//                                     LEFT 
//                                     JOIN queue_tbl AS b 
//                                     ON a.queue_no_id_fld = b.queue_no_id_fld
//                                     LEFT 
//                                     JOIN user_tbl AS c 
//                                     ON a.uname_id_fld = c.uname_id_fld
//                                     LEFT 
//                                     JOIN department_tbl AS d
//                                     ON a.department_id_fld = d.department_id_fld
//                                     LEFT 
//                                     JOIN program_tbl AS e
//                                     ON a.program_id_fld = e.program_id_fld
//                                     WHERE a.queue_id_fld = ?
//                                     ORDER BY a.queue_id_fld;";

//     // Retrieve POST variables
//     $queueId = $_POST['queue_id_fld'];
//     $department = $_POST['department_id_fld'];
//     $program = $_POST['program_id_fld'];
//     $isFinal = $_POST['is_final_fld'];

//     $queueNumber = $_POST['queue_no_id_fld'];
//     $department = $_POST['department_id_fld'];
//     $program = $_POST['program_id_fld'];
//     $user = $_POST['uname_id_fld'];
//     $isFinal = $_POST['is_final_fld'];
//     $queueId = $_POST['queue_id_fld'];


//     // Prepare statement
//     $stmt = $mysqli->prepare($sql);
//     if (!$stmt) {
//         die("SQL error: " . $mysqli->error);
//     }

//     // Bind parameters
//     $stmt->bind_param("ssii", $department, $program, $isFinal, $queueId);

//     // Execute statement
//     if ($stmt->execute()) {
//         echo "<script>alert('Queue Rule updated successfully!');</script>";
//         // Optionally, redirect the user:
//         // header("Location: queue_rules.php?success=1");
//     } else {
//         echo "<script>alert('Error updating queue rule: " . $stmt->error . "');</script>";
//     }

//     $stmt->close();
// }















// $mysqli = require __DIR__ . "/database.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $sql = "UPDATE queue_rules_tbl AS a
//             LEFT JOIN queue_tbl AS b 
//                 ON a.queue_no_id_fld = b.queue_no_id_fld
//             LEFT JOIN user_tbl AS c 
//                 ON a.uname_id_fld = c.uname_id_fld
//             LEFT JOIN department_tbl AS d
//                 ON a.department_id_fld = d.department_id_fld
//             LEFT JOIN program_tbl AS e
//                 ON a.program_id_fld = e.program_id_fld
//             SET 
//                 a.uname_id_fld = ?
//                 a.department_id_fld = ?,
//                 a.program_id_fld = ?,
//                 a.queue_no_id_fld = ?,
//                 a.is_final_fld = ?,
//             WHERE 
//                 a.queue_id_fld = ?";

//     // Retrieve POST variables
//     $user = $_POST['uname_id_fld'];
//     $department = $_POST['department_id_fld'];
//     $program = $_POST['program_id_fld'];
//     $queueNumber = $_POST['queue_no_id_fld'];
//     $isFinal = $_POST['is_final_fld'];
//     $queueId = $_POST['queue_id_fld'];

//     // Prepare the SQL statement
//     $stmt = $mysqli->prepare($sql);
//     if (!$stmt) {
//         die("SQL error: " . $mysqli->error);
//     }

//     // Bind parameters (5 strings and 1 integer)
//     $stmt->bind_param("siiiii", 
//                         $user, 
//                         $department, 
//                         $program, 
//                         $queueNumber, 
//                         $isFinal, 
//                         $queueId);

//     // Execute the query
//     if ($stmt->execute()) {
//         echo "User credentials updated successfully!";
//     } else {
//         echo "Error updating user credentials: " . $stmt->error;
//     }

//     $stmt->close();
// }






























































































// $mysqli = require __DIR__ . "/database.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Check if queue_id_fld exists in POST data
//     if (!isset($_POST['queue_id_fld']) || empty($_POST['queue_id_fld'])) {
//         die("Error: queue_id_fld is missing in POST data.");
//     }

//     // Define the SQL query
//     $sql = "UPDATE queue_rules_tbl AS a
//             LEFT JOIN queue_tbl AS b 
//                 ON a.queue_no_id_fld = b.queue_no_id_fld
//             LEFT JOIN user_tbl AS c 
//                 ON a.uname_id_fld = c.uname_id_fld
//             LEFT JOIN department_tbl AS d
//                 ON a.department_id_fld = d.department_id_fld
//             LEFT JOIN program_tbl AS e
//                 ON a.program_id_fld = e.program_id_fld
//             SET 
//                 a.department_id_fld = ?, 
//                 a.program_id_fld = ?, 
//                 a.queue_no_id_fld = ?, 
//                 a.is_final_fld = ?, 
//                 a.uname_id_fld = ?
//             WHERE 
//                 a.queue_id_fld = ?";

//     // Retrieve POST variables
//     $department = $_POST['department_id_fld'] ?? null;
//     $program = $_POST['program_id_fld'] ?? null;
//     $queueNumber = $_POST['queue_no_id_fld'] ?? null;
//     $isFinal = $_POST['is_final_fld'] ?? null;
//     $user = $_POST['uname_id_fld'] ?? null;
//     $queueId = $_POST['queue_id_fld'] ?? null;

//     // Validate required inputs
//     if (!$department || !$program || !$queueNumber || !$isFinal || !$user || !$queueId) {
//         die("Error: One or more required fields are missing.");
//     }

//     // Prepare the statement
//     $stmt = $mysqli->prepare($sql);
//     if (!$stmt) {
//         die("SQL prepare error: " . $mysqli->error);
//     }

//     // Bind parameters
//     if (!$stmt->bind_param("iiiisi", $department, $program, $queueNumber, $isFinal, $user, $queueId)) {
//         die("Bind param error: " . $stmt->error);
//     }

//     // Execute the query
//     if ($stmt->execute()) {
//         echo "User credentials updated successfully!";
//     } else {
//         die("Execution error: " . $stmt->error);
//     }

//     $stmt->close();
// }




?>
