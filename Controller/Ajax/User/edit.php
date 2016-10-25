<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'User.php';


try {
    if (!isset($_POST['id'])) {
        throw new Exception("No hay id definido");
    }
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        throw new Exception("No hay nombre definido");
    }
    $nombre = $_POST['username'];
    $id = $_POST['id'];
    $user = User::retrieveBy('id', $id);
    $user->setUsername($username);
    $user->save();
    
} catch (Exception $e) {
    $result = ['code' => 500, 'message' => "La persona no se pudo modificar. " . $e->getMessage()];
}


header('Content-Type: application/json');
echo json_encode($result);
