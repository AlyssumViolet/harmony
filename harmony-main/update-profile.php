<?php
//Prevents Administrator from being sent to index.php by recognizing the registered user
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    // Fetch the current user
    $sql = "SELECT * FROM user_tbl WHERE uname_id_fld = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Only Administrator roles are allowed to access the entirety of this content.
    if (isset($user) && $user["role_fld"] === "Administrator" 
                    || $user["role_fld"] === "Club Advisor"
                    || $user["role_fld"] === "Campus Supervisor") {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password_lbl'];

            // Checks if the password field is not empty
            if (!empty($password)) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // Updates changed password in the database
                $update_sql = "UPDATE user_tbl SET password_hash_fld = ? WHERE uname_id_fld = ?";
                $update_stmt = $mysqli->prepare($update_sql);
                $update_stmt->bind_param("si", $password_hash, $_SESSION['user_id']);
                
                if ($update_stmt->execute()) {
                    // Redirects to this webpage after successful update
                    header("Location: user-password-update.php");
                    exit();
                } else {
                    echo "Error updating password.";
                }
            }
        }

    } else {
        // Redirects to index.php if the user is any other than an Administrator
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>
