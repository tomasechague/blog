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


    public function save(){
       if($this->getId()){
           $this->update();
       }else{
           $this->insert();
       }
       return $this;
        
    }
    public function delete(){echo 'delete';}
   
    private function update(){echo 'update';}
    private function insert(){
        echo $this->camel2dashed('UserValidator');
        
       $fields = implode(',',$this->fields);
       $values =  $this->getValues();
        
        $pdo = conectar();
        
        $statement = $pdo->prepare('INSER INTO :tableName(:fields)
                                    VALUES(:values)');
        $statement->bindParam(':tableName', $this->tableName);
        $statement->bindParam(':fields', $fields);
        $statement->bindParam(':values',$values);
        
       // $statement->execute();
        
    }
    
    public function getId(){
        throw new Exception('Este metodo debe estar implementado en la subclase');
    }
    
    public function getValues(){
       $objectValues =  get_object_vars($this);
    }
    
    public function camel2dashed($className) {
    return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
}


    
}
