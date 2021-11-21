<?php
    session_start();
    //on détruit la session ouverte auparavant
    session_destroy();
    header("location:connect.php");
?>