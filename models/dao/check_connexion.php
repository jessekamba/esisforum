<?php
    session_start();
    if(!isset($_SESSION['matricule'])) $connected = false;
    else $connected = true;
?>