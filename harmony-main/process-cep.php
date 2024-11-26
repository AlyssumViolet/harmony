<?php

session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    // Fetch user details based on session user ID
    $sql = "SELECT uname_fld, role_fld FROM user_tbl WHERE uname_id_fld = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    // Check if the user is authorized (e.g., "Club Advisor")
    if (isset($user) && $user["role_fld"] === "Club Advisor") {
        // Validate input fields
        if (empty($_POST["club_event_name_lbl"])) {
            die("A Club Event Name is required.");
        }

        if (empty($_POST["target_date_lbl"])) {
            die("A Target Date is required.");
        }

        if (empty($_POST["participants_lbl"])) {
            die("Participants are required.");
        }

        if (empty($_POST["venue_lbl"])) {
            die("At least one Venue is required.");
        }

        if (empty($_POST["objectives_lbl"])) {
            die("Objectives are required.");
        }

        if (empty($_POST["budget_lbl"])) {
            die("A proposed Budget is required.");
        }

        $venues = $_POST["venue_lbl"]; // venue_lbl is now an array from the select2 input
        if (!is_array($venues)) {
            die("Invalid venue input format.");
        }
        
        $processedVenues = [];
        
        foreach ($venues as $venue) {
            $venue = trim($venue); // Remove extra spaces
            $normalizedVenue = strtolower(preg_replace('/\s+/', ' ', $venue)); // Normalize spacing and lowercase
        
            // Check if the venue exists in the database (case-insensitive)
            $sql = "SELECT venue_fld FROM club_event_proposal_tbl WHERE LOWER(venue_fld) = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $normalizedVenue);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($row = $result->fetch_assoc()) {
                // Venue exists, use the original value
                $processedVenues[] = $row["venue_fld"];
            } else {
                // Venue doesn't exist, save the normalized input as is
                $processedVenues[] = ucwords($normalizedVenue); // Capitalize each word
            }
        }
        
        // Combine processed venues into a single string for storage
        $finalVenues = implode(", ", $processedVenues);        

        // Insert data into `club_event_proposal_tbl`
        $sql = "INSERT INTO club_event_proposal_tbl (
                    club_event_name_fld, 
                    target_date_fld, 
                    participants_fld, 
                    venue_fld, 
                    objectives_fld, 
                    budget_fld, 
                    submitted_by_fld
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        // Bind parameters and execute
        $stmt->bind_param(
            "sssssss",
            $_POST["club_event_name_lbl"],
            $_POST["target_date_lbl"],
            $_POST["participants_lbl"],
            $finalVenues, // Use the processed venues string
            $_POST["objectives_lbl"],
            $_POST["budget_lbl"],
            $user["uname_fld"]
        );        

        if ($stmt->execute()) {
            header("Location: user-club-event-proposal.php");
            exit;
        } else {
            die("Database error: " . $stmt->error);
        }

// KEEP THIS IN MIND
        function processApproval(){
            
        }


    } else {
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

?>
