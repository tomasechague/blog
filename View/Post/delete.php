<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {
        $variable = "Se ha borrado un post";
        echo json_encode(array("frase"=>$variable));
    }


