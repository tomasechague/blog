<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
        $variable = "Usted ha creado un nuevo usuario";
        echo json_encode(array("frase"=>$variable));
    }
