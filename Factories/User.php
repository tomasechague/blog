<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'User.class.php';

class UserFactory {
    
   /** 
    * Devuelve todos los usuarios.
    * @param string $mode 
    * Si $mode='object' o no se envia, devuelve un arreglo de objetos
    * si se le manda $mode='array' devuelve un arreglo de arreglos asociativos
    *      
    */
    public static function getAll($mode = 'object') {
        $pdo = conectar();
        $statement = $pdo->prepare("SELECT * FROM USERS");
        $statement->execute();
        $result = $statement->fetchAll();
        if ($mode == 'object') {
            $users = [];
            foreach ($result as $user) {
                $usuario = new User();
                $users[] = $usuario->setValues($user);
            }
            return $users;
        }else{
            return $result;
        }
    }

}
