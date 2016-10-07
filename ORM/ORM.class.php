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
    
   public static function retrieve($id){
    
        $instance = new self();
        $searchResult = $instance->loadById($id);
        $instance->setValues($searchResult);
        return $instance;
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
        echo 'delete';
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
    public function getValuesForUpdate() {
        $objectValues = get_object_vars($this);
        $objectValuesDashed = [];
        foreach($objectValues as $key=>$value){
            $objectValuesDashed[$this->camel2dashed($key)] = $value;
        }
        $values = [];
        foreach ($this->fields as $field) {
            $values[] = $field.'=\''.$objectValuesDashed[$field].'\'';
        }
        
        $values = implode(',', $values);
        
        return $values;
    }
    
    function loadById($id){
        $pdo = conectar();
        $tableName=$this->tableName;
        $statement = $pdo->prepare("SELECT * 
                                    FROM $tableName
                                    WHERE id = $id");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result[0];
                
    }
    public function setValues() {
        throw new Exception('Este metodo debe estar implementado en la subclase');
    }

}
