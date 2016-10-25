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
        } else {
            return $result;
        }
    }

    public static function deleteUser($id) {
        try {
            $pdo = conectar();
            $statement = $pdo->prepare("DELETE FROM users where id= :id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = ['code' => 200, 'message' => "Se borro la persona"];
        } catch (Exception $e) {
            $result = ['code' => 500, 'message' => "Hubo un error al borrar la persona: " . $e->getMessage()];
        }
    }

    public static function editUser($id, $username) {
        try {
            $pdo = conectar();

            $statement = $pdo->prepare("UPDATE users
                            SET username = :username
                            WHERE id = :id");
            $statement->bindParam(":username", $username);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = ['code' => 200, 'message' => "La persona ha sido modificado correctamente"];
        } catch (Exception $e) {
            $result = ['code' => 500, 'message' => "La persona no se pudo modificar. " . $e->getMessage()];
        }
    }

}
