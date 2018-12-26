<?php
/**
* Category Class
*/
class RequiredDocuments
{

  // ACTIVE RECORD CODE TO KEEP EVERY CLASS KNOLWEDGE WITH DB
  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  public function find_by_sql($sql)
  {
    $doc_array = [];
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    while ($record = $result->fetch_assoc()) {
      $doc_array[] =  self::instantiate($record);
    }
    return $doc_array;
  }

  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? '';
    $this->name = $args['name'] ?? '';
    $this->description = $args['description'] ?? '';

  }
  public function create()
  {
    $sql  ="INSERT INTO required_documents(" ;
      $sql .="name, description";
      $sql .=" ) VALUES ( ";
        $sql .="'" . self::$database->escape_string($this->name) ."',";
        $sql .="'" . self::$database->escape_string($this->description) ."'";
        $sql .=");";

        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }
        return $result;
      }

      public function update() {
        //print_r($this);
        $sql  ="UPDATE required_documents SET " ;
        $sql .=" name = '" .self::$database->escape_string( $this->name) ."',";
        $sql .=" description ='" . self::$database->escape_string($this->description) ."'";
        $sql .=" WHERE ";
        $sql .="id = ".$this->id ." ;";

        //echo $sql;
        //die();
        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }else {
          echo "Can't update record " . self::$database->error ;
        }
        return $result;
      }

      public function delete() {
        //print_r($this);
        $sql  ="DELETE FROM required_documents" ;
        $sql .=" WHERE ";
        $sql .="id = ".self::$database->escape_string($this->id) ." ;";

        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }else {
          echo "Can't delete record " . self::$database->error ;
        }
        return $result;
      }


      public function find_all()
      {
        $sql = "SELECT * from required_documents";
        $doc_array = self::find_by_sql($sql);

        return $doc_array;
      }
      public function find_by_id($id)
      {
        $doc_array = [];
        $sql = "SELECT * FROM required_documents WHERE id = {$id}";
        $doc_array = self::find_by_sql($sql);
        return array_shift($doc_array);
      }

      public function instantiate($value)
      {
        $obj = new self();
        $obj->id = $value ['id'];
        $obj->name = $value ['name'];
        $obj->description = $value ['description'];

        return $obj;
      }

      public function instantiate_auto($record)
      {
        $obj = new self();

        foreach ($record as $property => $value) {
          if (property_exists($obj,$property)) {
            $obj->$property = $value;
          }
        }

        return $obj;
      }

      // ----- END OF ACTIVE RECORD CODE ------

      private $id;
      private $name;
      private $photo;

      public function getId(){
        return $this->id;
      }

      public function setId($id){
        $this->id = $id;
      }

      public function getName(){
        return $this->name;
      }

      public function setName($name){
        $this->name = $name;
      }

      public function getDescription(){
        return $this->description;
      }

      public function setDescription($description){
        $this->description = $description;
      }




    }


    ?>
