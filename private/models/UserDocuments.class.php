<?php
/**
 * Menu Item class
 */
class MenuItem
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
      $menu_array[] =  self::instantiate($record);
    }
    return $menu_array;
  }

  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? '';
    $this->name = $args['name'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->photo = $args['photo'] ?? '';
    $this->categoryId = $args['category'] ?? '';
  }

public function create()
{
  $sql  ="INSERT INTO menu_item(" ;
  $sql .="description, name, price, photo, category_id";
  $sql .=" ) VALUES ( ";
  $sql .="'" . $this->description ."',";
  $sql .="'" . $this->name ."',";
  $sql .="'" . $this->price ."',";
  $sql .="'" . $this->photo ."',";
  $sql .="'" . $this->categoryId ."'";
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
  $sql  ="UPDATE menu_item SET " ;
  $sql .=" name = '" . $this->name ."',";
  $sql .=" photo ='" . $this->photo ."',";
  $sql .=" description ='" . $this->description ."',";
  $sql .=" price ='" . $this->price ."',";
  $sql .=" category_id ='" . $this->categoryId ."'";
  $sql .=" WHERE ";
  $sql .="id = ".$this->id ." ;";

  echo $sql;

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
  $sql  ="DELETE FROM menu_item" ;
  $sql .=" WHERE ";
  $sql .="id = ".$this->id ." ;";

  $result = self::$database->query($sql);
  if($result){
    $this->id = self::$database->insert_id;
  }else {
    echo "Can't update record " . self::$database->error ;
  }
  return $result;
}
  public function find_all()
  {
    $sql = "SELECT * from menu_item";
    $menu_array = self::find_by_sql($sql);

    return $menu_array;
  }
  public function find_by_id($id)
  {
    $menu_array = [];
    $sql = "SELECT * FROM menu_item WHERE id = {$id}";
    $menu_array = self::find_by_sql($sql);
    return array_shift($menu_array);
  }

  public function instantiate($value)
  {
    $obj = new self();
    $obj->id = $value ['id'];
    $obj->name = $value ['name'];
    $obj->photo = $value ['photo'];
    $obj->description = $value ['description'];
    $obj->price = $value ['price'];
    $obj->categoryId = $value ['category_id'];

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
  private $description;
  private $price;
  private $photo;
  private $categoryId;

  public function getId(){
    return $this->id;
  }
  public function getName(){
    return $this->name;
  }
  public function getDecription(){
    return $this->description;
  }
  public function getPrice(){
    return $this->price;
  }
  public function getPhoto(){
    return $this->photo;
  }
  public function getCategory(){
    return $this->categoryId;
  }

  public function setId($value){
    return $this->id = $value;
  }
  public function setName($value){
    return $this->name = $value;
  }
  public function setDescription($value){
    return $this->description = $value;
  }
  public function setCategory($value){
    return $this->categoryId = $value;
  }
  public function setPrice($value){
    return $this->price = $value;
  }
  public function setPhoto($value){
    return $this->photo = $value;
  }
}


 ?>
