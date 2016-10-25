<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'User.class.php';
try {
    $id = $_GET['id'];
    $user = User::retrieveBy('id', $id, 'array');

    $result = ['code' => 200, 'user' => $user];
} catch (Exception $e) {
    $result = ['code' => 500, 'message' => "La persona no se encontro. " . $e->getMessage()];
}
header('Content-Type: application/json');
echo json_encode($result);

