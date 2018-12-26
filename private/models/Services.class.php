<?php
class Service
{
  // ACTIVE RECORD CODE TO KEEP EVERY CLASS KNOLWEDGE WITH DB
  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }




  public function create()
  {
    $sql  ="INSERT INTO services(" ;
      $sql .="name, description, price, icon";
      $sql .=" ) VALUES ( ";
        $sql .="'" . $this->name ."',";
        $sql .="'" . $this->description ."',";
        $sql .="'" . $this->price ."',";
        $sql .="'" . $this->icon ."'";
        $sql .=");";

        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }
        return $result;
      }


      public function update()
{
  //print_r($this);
  $sql  ="UPDATE services SET " ;
  $sql .=" name = '" . $this->name ."',";
  $sql .=" description = '" . $this->description ."',";
  $sql .=" price = '" . $this->price ."',";
  $sql .=" icon ='" . $this->icon ."'";
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





  public function find_by_sql($sql)
  {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    while ($record = $result->fetch_assoc()) {
      $menu_array[] =  self::instantiate($record);
    }
    if (!empty($menu_array)){
    return $menu_array;
  }

  }




  public function find_by_id($id)
  {
    $service_array = [];
    $sql = "SELECT * FROM services WHERE id = {$id}";
    $service_array = self::find_by_sql($sql);
    return array_shift($service_array);
  }



  public function delete() {

    $sql  ="DELETE FROM services" ;
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
  $sql = "SELECT * from services";
  $service_array = self::find_by_sql($sql);

  return $service_array;
}


public function find_three()
{
  $sql = "SELECT * from services LIMIT 3";
  $service_array = self::find_by_sql($sql);

  return $service_array;
}




public function __construct($args=[])
{
  $this->id = $args['id'] ?? '';
  $this->name = $args['name'] ?? '';
  $this->description = $args['description'] ?? '';
  $this->price = $args['price'] ?? '';
  $this->created_at = $args['created_at'] ?? '';
  $this->updated_at = $args['updated_at'] ?? '';
  $this->icon = $args['icon'] ?? '';

}





public function instantiate($value)
{
  $obj = new self();
  $obj->id = $value ['id'];
  $obj->name = $value ['name'];
  $obj->description = $value ['description'];
  $obj->price = $value ['price'];
  $obj->created_at = $value ['created_at'];
  $obj->updated_at = $value ['updated_at'];
  $obj->icon = $value ['icon'];


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






private $id;
private $name;
private $description;
private $price;
private $created_at;
private $updated_at;
private $icon;




public function getId(){
  return $this->id;
}
public function setId($value){
  return $this->id = $value;
}




public function getName(){
  return $this->name;
}
public function setName($value){
  return $this->name = $value;
}




public function getDescription(){
  return $this->description;
}
public function setDescription($value){
  return $this->description = $value;
}




public function getPrice(){
  return $this->price;
}
public function setPrice($value){
  return $this->price = $value;
}




public function getCreatedAt(){
  return $this->created_at;
}
public function setCreatedAt($value){
  return $this->created_at = $value;
}




public function getUpdatedAt(){
  return $this->updated_at;
}
public function setUpdatedAt($value){
  return $this->updated_at = $value;
}



public function getIcon(){
  return $this->icon;
}
public function setIcon($value){
  return $this->icon = $value;
}


}

?>
