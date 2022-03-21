<?php
    include_once 'inputclean.php';
    $err = "";
    $success = false;
    if (isset($_POST['login'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            $pseudo = clean(strtolower($_POST['pseudo']));
            $password = clean($_POST['password']);
            $success = true;
        }
        else {
            $err = "<p class='error'>Fill all field</p>";
        }
    }
?>