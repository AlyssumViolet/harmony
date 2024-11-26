<?php

session_start();

session_destroy();

header("Location: harmony_index.php");
exit;