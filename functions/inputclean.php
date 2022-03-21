<?php

    function clean($data){
        if (!empty($data)) {
            $data = trim($data);
            $data = strip_tags($data);
        }

        return $data;
    }
?>