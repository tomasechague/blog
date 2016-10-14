<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'User.php';

$users = UserFactory::getAll('array');

header('Content-Type: application/json'); 
echo json_encode($users);

