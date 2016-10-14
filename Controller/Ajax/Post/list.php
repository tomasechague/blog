<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'Post.php';

$posts = PostFactory::getAll();
header('Content-Type: application/json'); 
echo json_encode($posts);

