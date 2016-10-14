<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'Post.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Factories'.DIRECTORY_SEPARATOR.'User.php';

$posts = PostFactory::getAll();

foreach ($posts as $post){
    echo $post->getTitle();
    echo '<br/>';
}

$users = UserFactory::getAll();

foreach ($users as $user){
    echo $user->getUsername();
    echo '<br/>';
}

