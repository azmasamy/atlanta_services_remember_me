<?php
class Requests
{

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
      $req_array[] =  self::instantiate($record); // this function to convert array to object
    }
    return $req_array;
  }


  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? '';
    $this->created_at = $args['created_at	'] ?? '';
    $this->updated_at = $args['updated_at'] ?? '';
    $this->status = $args['status'] ?? '';
    $this->user_id = $args['user_id'] ?? '';
    $this->service_id = $args['service_id'] ?? '';
  }




  public function update()
  {
    //print_r($this);
    $sql  ="UPDATE request SET " ;
    $sql .=" status = '" . $this->status ."'";
    $sql .=" WHERE ";
    $sql .=" id = ".$this->id ." ;";
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




  public function delete()
  {
    //print_r($this);
    $sql  ="DELETE FROM request" ;
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
    $sql = "SELECT * from request";
    $req_array = self::find_by_sql($sql);

    return $req_array;
  }



  public function find_by_id($id)
  {
    $req_array = [];
    $sql = "SELECT * FROM request WHERE id = {$id}";
    $req_array = self::find_by_sql($sql);
    return array_shift($req_array);


  }



  public function instantiate($value)
  {
    $obj = new self();
    $obj->id = $value ['id'];
    $obj->created_at = $value ['created_at'];
    $obj->updated_at = $value ['updated_at'];
    $obj->status = $value ['status'];
    $obj->user_id = $value ['user_id'];
    $obj->service_id = $value ['service_id'];

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
  private $created_at	;
  private $updated_at;
  private $status;
  private $user_id;
  private $service_id;



  public function getId(){
    return $this->id;
  }
  public function getCreated_at(){
    return $this->created_at;
  }
  public function getUpdated_at(){
    return $this->updated_at;
  }
  public function getStatus(){
    return $this->status;
  }
  public function getUser_id(){
    return $this->user_id;
  }
  public function getService_id(){
    return $this->service_id;
  }





  public function setId($value){
    return $this->id = $value;
  }
  public function setCreated_at($value){
    return $this->created_at = $value;
  }
  public function setUpdated_at($value){
    return $this->updated_at = $value;
  }
  public function setStatus($value){
    return $this->status = $value;
  }
  public function setUser_id($value){
    return $this->user_id = $value;
  }
  public function setService_id($value){
    return $this->service_id = $value;
  }
}


?>
