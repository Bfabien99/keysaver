<?php
    include_once 'inputclean.php';
    $err = "";
    $success = false;
    if (isset($_POST['enregistrer'])) {
        if (!empty($_POST['account']) && !empty($_POST['password']) && !empty($_POST['reference'])) {
            $account = clean(($_POST['account']));
            $key = clean($_POST['password']);
            $reference = clean($_POST['reference']);
            $success = true;
        }
        else {
            $err = "<p class='error'>Fill all field</p>";
        }
    }
?>