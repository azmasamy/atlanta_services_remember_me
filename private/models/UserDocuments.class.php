<?php
class UserDocuments
{
  static protected $database;
  static public function set_database($database) {
    self::$database = $database;
  }
  public function find_by_sql($sql)
  {
    $req_array = [];
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    print_r($result->fetch_assoc());
    while ($record = $result->fetch_assoc()) {
      $req_array[] =  self::instantiate($record); // this function to convert array to object
      print_r($record);
      echo "hazzzz";
    }
    return $req_array;
  }



  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? '';
    $this->name = $args['name	'] ?? '';
    $this->user_id = $args['user_id'] ?? '';

  }

  public function create()
  {
    $sql  ="INSERT INTO user_documents(" ;
    $sql .="name";
    $sql .=" ) VALUES ( ";
    $sql .="'" . $this->name ."'";

    $sql .=");";

    $result = self::$database->query($sql);
    if($result){
      $this->id = self::$database->insert_id;
    }
    return $result;
  }



      public function find_by_id($id)
      {
        $req_array = [];
        $sql = "SELECT * FROM user_documents WHERE id = {$id}";
        $req_array = self::find_by_sql($sql);
        return $req_array;

      }

      public function instantiate($value)
      {
        $obj = new self();
        $obj->id = $value ['id'];
        $obj->name = $value ['name'];
        $obj->user_id = $value ['user_id'];

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
      private $name	;
      private $user_id;



      public function getId(){
        return $this->id;
      }
      public function getName(){
        return $this->name;
      }
      public function getUser_id(){
        return $this->user_id;
      }



      public function setId($value){
        return $this->id = $value;
      }
      public function setName($value){
        return $this->name = $value;
      }
      public function setUser_id($value){
        return $this->user_id = $value;
      }
    }
    ?>
