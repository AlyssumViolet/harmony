<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user_tbl
                    WHERE email_fld = '%s'",
                    $mysqli->real_escape_string($_POST["email_lbl"]));


    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password_lbl"], $user["password_hash_fld"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["uname_id_fld"];
            $_SESSION["role"] = $user["role_fld"];

            header("Location: harmony_index.php");
            exit;
        }
    }

    $is_invalid = true;

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Harmony - Log In</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
    
        <h1>Log In</h1>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>

        <form method="post">
            <label for="email_lbl">Email</label>
            <input type="email" name="email_lbl" id="email_lbl"
                   value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

            <label for="password_lbl">Password</label>
            <input type="password" name="password_lbl" id="password_lbl">
        
            <button>Log In</button>
        </form>

</body>
</html>        