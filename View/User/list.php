<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
        $variable = "Estamos listando los usuarios.Aguarde un momento";
        echo json_encode(array("frase"=>$variable));
    }


