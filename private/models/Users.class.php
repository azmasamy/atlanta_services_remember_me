<?php

class Admin {

  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  public function find_by_sql($sql) {
    $admins_array = array();
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    while ($record = $result->fetch_assoc()) {
      $admins_array[] =  self::instantiate($record);
    }
    return $admins_array;
  }

  public function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
  }

  public function delete() {
    //print_r($this);
    $sql  ="DELETE FROM admin" ;
    $sql .=" WHERE ";
    $sql .="id = ". $this->id ." ;";
    $result = self::$database->query($sql);
    if($result){
      $this->id = self::$database->insert_id;
    }else {
      echo "Can't delete record " . self::$database->error ;
    }
    return $result;
  }

  public function update() {
    //print_r($this);
    $sql  ="UPDATE Admin SET " ;
    $sql .=" first_name = '" . $this->first_name ."',";
    $sql .=" last_name = '" . $this->last_name ."',";
    $sql .=" email = '" . $this->email ."',";
    $sql .=" username ='" . $this->username ."',";
    $sql .=" hashed_password ='" . $this->hashed_password ."'";
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

  public function create() {
    //print_r($this);
    $sql  ="INSERT INTO admin(" ;
    $sql .=" first_name, last_name, email, username, hashed_password";
    $sql .=" ) VALUES ( ";
    $sql .="'" . $this->first_name ."',";
    $sql .="'" . $this->last_name ."',";
    $sql .="'" . $this->email ."',";
    $sql .="'" . $this->username ."',";
    $sql .="'" . $this->hashed_password ."'";
    $sql .=");";

    //echo $sql;

    $result = self::$database->query($sql);
    if($result){
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  public function find_all() {
    $sql = "Select * from admin";
    $admin_array = self::find_by_sql($sql);

    return $admin_array;
  }

  public function find_by_id($id) {
    $cat_array = [];
    $sql = "SELECT * FROM admin WHERE id = {$id}";
    $cat_array = self::find_by_sql($sql);
    return array_shift($cat_array);
  }

  public function instantiate($value){
    $obj = new self();
    $obj->id = $value ['id'];
    $obj->first_name = $value ['first_name'];
    $obj->last_name = $value ['last_name'];
    $obj->email = $value ['email'];
    $obj->username = $value ['username'];
    $obj->hashed_password = $value ['hashed_password'];

    return $obj;
  }


  private $id; //DO IT PRIVATE AND USE GET & SET
  private $first_name;
  private $last_name;
  private $email;
  private $username;
  private $hashed_password;
  //private $password;
  //private $confirm_password;

  public function getId() {
    return $this->id;
  }

  public function getFirstname() {
    return $this->first_name;
  }

  public function getLastname() {
    return $this->last_name;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getFullname() {
    return $this->first_name . " " . $this->last_name;
  }


  public function __construct($args=[]) {
    $this->id = $args['id'] ?? '';
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->hashed_password = $args['password'] ?? '';
    //var_dump($this);
  }


  static public function find_by_username($username) {
      $sql = "SELECT * FROM admin ";
      $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
      $obj_array = self::find_by_sql($sql);
      //print_r($obj_array); exit();
      if(!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
      }
    }


  public function verify_password($password) {
    //password_verify built in function
    //echo $password;
    //echo "<br>";
    //echo $this->hashed_password;
    //echo "<br>";
    //echo password_hash($password, PASSWORD_BCRYPT);
    //echo "<br>";
    //if(password_verify($password, $this->hashed_password))
    //echo "match"; else echo "didn't match";

    return password_verify($password, $this->hashed_password);

  }

}

?>
