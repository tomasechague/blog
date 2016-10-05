<?php

/**
 * Description of ORM
 *
 * @author Tomas
 */
require_once __DIR__ . '/../config/database.php';

class ORM {

    protected $tableName;
    protected $fields;

    public function save() {
        if ($this->getId()) {
            $this->update();
        } else {
            $this->insert();
        }
        return $this;
    }

    public function delete() {
        echo 'delete';
    }

    private function update() {
        echo 'update';
    }

    private function insert() {

        $fields = implode(',', $this->fields);
        $values = $this->getValues();
        $tableName = $this->tableName;

        $pdo = conectar();
        $statement = $pdo->prepare("INSERT INTO $tableName($fields)
                                    VALUES($values)");
        $statement->execute();
    }

    public function getId() {
        throw new Exception('Este metodo debe estar implementado en la subclase');
    }

    public function getValues() {
        $objectValues = get_object_vars($this);
        $objectValuesDashed = [];
        foreach($objectValues as $key=>$value){
            $objectValuesDashed[$this->camel2dashed($key)] = $value;
        }
        $values = [];
        foreach ($this->fields as $field) {
            $values[] = '\''.$objectValuesDashed[$field].'\'';
        }
        
        $values = implode(',', $values);
        
        return $values;
    }

    public function camel2dashed($className) {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }

}
