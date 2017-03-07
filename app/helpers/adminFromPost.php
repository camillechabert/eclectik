<?php
    include '../controllers/adminTreatment.php';

    if (isset($_POST)) {
        if (!isset($_POST)) {
            adminTreatment::$errors['empty'] = 'Un des Champs est vide';
        } else {
            $table = array();
            foreach ($_POST as $k => $v){
                if (!empty(trim($v))){
                    $table[$k] = $v;
                }
            }
            $treatment = new adminTreatment($table);
            header('location:../viewsAdmin/admin.php?template=profil');
        }
    }
?>