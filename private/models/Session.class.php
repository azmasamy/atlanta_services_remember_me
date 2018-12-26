<?php

class Session {

  private $user_id;
  private $is_admin;
  private $is_super;

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($user) {
    if($user) {
      $_SESSION['user_id'] = $user->getId();
      $_SESSION['is_admin'] = $user->getIsAdmin();
      $_SESSION['is_super'] = $user->getIsSuper();
      $this->user_id = $user->getId();
      $this->is_admin = $user->getIsAdmin();
      $this->is_super = $user->getIsSuper();
    }
  }

  public function is_logged_in() {
    return isset($this->admin_id);
  }

  public function is_admin() {
    return $is_admin;
  }

  public function is_super() {
    return $is_super;
  }

  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['is_admin']);
    unset($_SESSION['is_super']);
    unset($this->user_id);
    unset($this->is_admin);
    unset($this->is_super);
  }

  private function check_stored_login() {
    if(isset($_SESSION['admin_id'])) {
      $this->user_id = $_SESSION['admin_id'];
      $this->is_admin = $_SESSION['is_admin'];
      $this->is_super = $_SESSION['is_super'];

    }
  }

}

?>
