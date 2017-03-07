<?php
    include '../controllers/contactTreatment.php';

    if (isset($_POST)) {
        if (count($_POST) < 0) {
            $error = contactTreatment::$errors['empty'] = "aucun champs n'a été saisie ou modifié";
            header('location:../viewsAdmin/admin.php');
        } else {
            $table = array();
            foreach ($_POST as $k => $v){
                if (!empty(trim($v))){
                    $table[$k] = $v;
                }
            }
            $treatment = new contactTreatment($table, $_FILES);
            header('location:../viewsAdmin/admin.php?template=contact');
        }
    }
?>