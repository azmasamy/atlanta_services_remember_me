<?php
/**
* Category Class
*/
class Category
{

  // ACTIVE RECORD CODE TO KEEP EVERY CLASS KNOLWEDGE WITH DB
  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  public function find_by_sql($sql)
  {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    while ($record = $result->fetch_assoc()) {
      $cat_array[] =  self::instantiate($record);
    }
    return $cat_array;
  }

  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? '';
    $this->name = $args['name'] ?? '';
    $this->photo = $args['photo'] ?? '';

  }
  public function create()
  {
    $sql  ="INSERT INTO Category(" ;
      $sql .="name, photo";
      $sql .=" ) VALUES ( ";
        $sql .="'" . $this->name ."',";
        $sql .="'" . $this->photo ."'";
        $sql .=");";

        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }
        return $result;
      }

      public function update() {
        //print_r($this);
        $sql  ="UPDATE Category SET " ;
        $sql .=" name = '" . $this->name ."',";
        $sql .=" photo ='" . $this->photo ."'";
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
        $sql  ="DELETE FROM Category" ;
        $sql .=" WHERE ";
        $sql .="id = ".$this->id ." ;";

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
        $sql = "SELECT * from category";
        $cat_array = self::find_by_sql($sql);

        return $cat_array;
      }
      public function find_by_id($id)
      {
        $cat_array = [];
        $sql = "SELECT * FROM category WHERE id = {$id}";
        $cat_array = self::find_by_sql($sql);
        return array_shift($cat_array);
      }

      public function instantiate($value)
      {
        $obj = new self();
        $obj->id = $value ['id'];
        $obj->name = $value ['name'];
        $obj->photo = $value ['photo'];

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

      public function getPhoto(){
        return $this->photo;
      }

      public function setPhoto($photo){
        $this->photo = $photo;
      }




    }


    ?>
