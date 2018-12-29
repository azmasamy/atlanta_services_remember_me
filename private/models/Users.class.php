<?php

class User {

  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  public function create_admin() {
    $sql  ="INSERT INTO users(" ;
      $sql .=" first_name, last_name, email, username, hashed_password, is_admin";
      $sql .=" ) VALUES ( ";
        $sql .="'" . $this->first_name ."',";
        $sql .="'" . $this->last_name ."',";
        $sql .="'" . $this->email ."',";
        $sql .="'" . $this->username ."',";
        $sql .="'" . $this->hashed_password ."',";
        $sql .="'" . 1 . "'";
        $sql .=");";
        $result = self::$database->query($sql);
        if($result){
          $this->id = self::$database->insert_id;
        }
        return $result;
      }

      public function create_user() {
        $sql  ="INSERT INTO users(" ;
          $sql .=" first_name, last_name, email, username, hashed_password";
          $sql .=" ) VALUES ( ";
            $sql .="'" . $this->first_name ."',";
            $sql .="'" . $this->last_name ."',";
            $sql .="'" . $this->email ."',";
            $sql .="'" . $this->username ."',";
            $sql .="'" . $this->hashed_password ."'";
            $sql .=");";
            $result = self::$database->query($sql);
            if($result){
              $this->id = self::$database->insert_id;
            }
            return $result;
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
            $sql  ="DELETE FROM users" ;
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
            $sql  ="UPDATE users SET " ;
            $sql .=" first_name = '" . $this->first_name ."',";
            $sql .=" last_name = '" . $this->last_name ."',";
            $sql .=" email = '" . $this->email ."',";
            $sql .=" username ='" . $this->username ."',";
            $sql .=" hashed_password ='" . $this->hashed_password ."'";
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

          public function find_all_admins() {
            $sql = "SELECT * FROM users WHERE is_admin = 1;";
            $admin_array = self::find_by_sql($sql);
            return $admin_array;
          }

          public function find_by_id($id) {
            $cat_array = [];
            $sql = "SELECT * FROM users WHERE id = {$id}";
            $cat_array = self::find_by_sql($sql);
            return array_shift($cat_array);
          }

          public function find_by_cookie($session_id) {
            $sql = "SELECT * FROM users WHERE session_id = '{$session_id}';";
            $result = self::$database->query($sql);
            while ($record = $result->fetch_assoc()) {
              $admins_array[] =  self::instantiate($record);
            }
            return array_shift($admins_array);
          }

          public function update_session_id($session_id) {
            $sql  = "UPDATE users SET " ;
            $sql .=" session_id = '" . $session_id ."'";
            $sql .=" WHERE ";
            $sql .="id = ".$this->id ." ;";
            $result = self::$database->query($sql);
            return $result;
          }

          public function instantiate($value){
            $obj = new self();
            $obj->id = $value ['id'];
            $obj->first_name = $value ['first_name'];
            $obj->last_name = $value ['last_name'];
            $obj->created_at = $value ['created_at'];
            $obj->updated_at = $value ['updated_at'];
            $obj->email = $value ['email'];
            $obj->username = $value ['username'];
            $obj->hashed_password = $value ['hashed_password'];
            $obj->is_admin = $value ['is_admin'];
            $obj->is_super = $value ['is_super'];
            return $obj;
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
            $sql = "SELECT * FROM users ";
            $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
            $obj_array = self::find_by_sql($sql);
            if(!empty($obj_array)) {
              return array_shift($obj_array);
            } else {
              return false;
            }
          }

          public function verify_password($password) {
            return password_verify($password, $this->hashed_password);
          }


          //$this->id = self::$database->insert_id;
          private $id;
          private $first_name;
          //print_r($obj_array); exit();
          private $last_name;
          private $email;
          private $username;
          private $code;
          private $hashed_password;
          private $created_at;
          private $updated_at;
          private $is_admin;
          private $is_super;

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

          public function getCode() {
            return $this->code;
          }

          public function getCreatedAt() {
            return $this->created_at;
          }

          public function getUpdatedAt() {
            return $this->updated_at;
          }

          public function getFullname() {
            return $this->first_name . " " . $this->last_name;
          }

          public function getIsAdmin() {
            return $this->is_admin;
          }

          public function getIsSuper() {
            return $this->is_super;
          }

        }

        ?>
