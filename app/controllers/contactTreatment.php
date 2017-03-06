<?php

include "../mdl_cdr2401dv/database.php";

Class contactTreatment {
    private $image;
    private $linkedin;
    private $adress;

    public function __construct($datas) {
        $this->datas = $datas;

    }
}
?>