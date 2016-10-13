<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
        $variable = "Usted ha editado un  usuario";
        echo json_encode(array("frase"=>$variable));
    }

