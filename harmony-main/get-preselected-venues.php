<?php

ini_set('display_errors', 0);
session_start();
$mysqli = require __DIR__ . "/database.php";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cep_id_fld AS id, venue_fld AS text 
        FROM club_event_proposal_tbl 
        WHERE cep_id_fld = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Database query failed"]);
    exit();
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row; // Populate `id` and `text` fields
}

header('Content-Type: application/json');
echo json_encode($data);







?>
