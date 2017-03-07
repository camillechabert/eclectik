<?php
    include '../controllers/contactTreatment.php';

    if (isset($_POST)) {
        $table = array();
        foreach ($_POST as $k => $v){
            if (!empty(trim($v))){
                $table[$k] = $v;
            }
        }
        
        $treatment = new contactTreatment($table);
        header('location:../viewsAdmin/admin.php?template=contact');
    }
?>