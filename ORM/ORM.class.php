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

    public static function retrieveBy($key, $value){
        
        $class = get_called_class();
        $instance = new $class();
        $instance->getElementByKeyValue($key,$value);
        return $instance;
    }
    
    public function getElementByKeyValue($key,$value) {

        $searchResult = $this->loadByKeyValue($key,$value);
        $this->setValues($searchResult);
        return $this;
    }

    public function save() {
        if ($this->getId()) {
            $this->update();
        } else {
            $this->insert();
        }
        return $this;
    }

    public function delete() {
        if ($id = $this->getId()) {
            $tableName = $this->tableName;
            $pdo = conectar();
            $statement = $pdo->prepare("DELETE FROM $tableName 
                                        WHERE id = $id");
            $statement->execute();
        }
    }

    private function update() {

        $tableName = $this->tableName;
        $values = $this->getValuesForUpdate();
        $id = $this->getId();


        $pdo = conectar();
        $statement = $pdo->prepare("UPDATE $tableName
                                    SET  $values
                                    WHERE id = $id");
        $statement->execute();
    }

    private function insert() {

        $fields = implode(',', $this->fields);
        $values = $this->getValues();
        $tableName = $this->tableName;
        $pdo = conectar();
        $statement = $pdo->prepare("INSERT INTO $tableName($fields)
                                    VALUES($values)");
        $statement->execute();
        $this->id = $pdo->lastInsertId();
    }

    public function getId() {
        throw new Exception('Este metodo debe estar implementado en la subclase');
    }

    public function getValues() {
        $objectValues = get_object_vars($this);
        $objectValuesDashed = [];
        foreach ($objectValues as $key => $value) {
            $objectValuesDashed[$this->camel2dashed($key)] = $value;
        }
        $values = [];
        foreach ($this->fields as $field) {
            $values[] = '\'' . $objectValuesDashed[$field] . '\'';
        }

        $values = implode(',', $values);

        return $values;
    }

    public function camel2dashed($className) {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }

    public function getValuesForUpdate() {
        $objectValues = get_object_vars($this);
        $objectValuesDashed = [];
        foreach ($objectValues as $key => $value) {
            $objectValuesDashed[$this->camel2dashed($key)] = $value;
        }
        $values = [];
        foreach ($this->fields as $field) {
            $values[] = $field . '=\'' . $objectValuesDashed[$field] . '\'';
        }

        $values = implode(',', $values);

        return $values;
    }

    function loadByKeyValue($key, $value) {
        $pdo = conectar();
        $tableName = $this->tableName;
        $statement = $pdo->prepare("SELECT * 
                                    FROM $tableName
                                    WHERE $key = '$value'");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result[0];
    }

    public function setValues($values) {
        throw new Exception('Este metodo debe estar implementado en la subclase');
      /*  $map = array( 'prop1' => $something, 
       *                'prop2' => $otherthing, 
       *                'prop3' => $morethings ); 
        foreach($map as $k => $v) 
            $object->$k = $v;
       */
        
    }

}
