<?php
    include_once 'inputclean.php';
    $err = "";
    $success = false;
    if (isset($_POST['recherche'])) {
        if (!empty($_POST['search'])) {
            $search = clean($_POST['search']);
            $success = true;
        }
    }
?>