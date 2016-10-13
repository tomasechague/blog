<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
        $variable = "Usted ha borrado un usuario";
        echo json_encode(array("frase"=>$variable));
    }


