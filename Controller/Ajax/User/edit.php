<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'User.class.php';


$username = $_POST['username'];
$email = $_POST['email'];
$id = $_POST['id'];
$user = User::retrieveBy('id', $id);
$file = $_FILES['archivo'];


$user->setUsername($username);
$user->setEmail($email);
if ($file) {
    $salt = md5(uniqid(mt_rand(), true));
    $fileName = md5($salt . $user->getEmail());
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $user->setAvatarLink('uploads/' . $fileName . '.' . $ext);
}



$mensaje = "";

if ($user->isValid($file)) {
    $targetPath = "../../../web/uploads/";
    $targetPath = $targetPath . $fileName . '.' . $ext;
    move_uploaded_file($file['tmp_name'], $targetPath);
    //$user->saveAvatarLink($targetPath);

    $user->save();
    $result = ['code' => 200, 'mensaje' => 'El usuario se ha agregado correctamente'];
} else {
    $result = ['code' => 500, 'mensaje' => 'El usuario no se ha podido agregar'];
}

header('Content-Type: application/json');
echo json_encode($result);
