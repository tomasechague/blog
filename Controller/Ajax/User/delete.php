<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'User.php';

try{
    if(!isset($_POST['id'])){
        throw new Exception("No hay id definido");
    }
$id = $_POST['id'];
UserFactory::deleteUser($id);

}catch(Exception $e){
$result = ['code'=>500, 'message'=>"Hubo un error al borrar la persona: ". $e->getMessage()];       
}

header('Content-Type: application/json'); 
echo json_encode($result);

