<?php 
    function fileUploader($sourfile) {
        $filename = date('Y-m-d-h-i-s').rand(0, 999999).'.'.pathinfo($sourfile['name'], PATHINFO_EXTENSION);
        move_uploaded_file($sourfile['tmp_name'], 'assets/images/'.$filename);
        return $filename;
    }

    function now() {
        return date("Y-m-d");
    }


