<?php
require_once(APPPATH.'models/interface/user.php');
require_once(APPPATH.'models/accounts/AccountType/AccountType.php');

class NullUser implements User {
  
  private static $instance;

  public static function create() {
    if(!isset(static::$instance)) {
      static::$instance = new NullUser();
    }
    return static::$instance;
  }
  

  public function confirm($password) {
    return false;
  }


  public function confirm_password($password): bool {
    return FALSE;
  }


  public function typeOf($type): bool {
    return $type === AccountType::NULL_USER;
  }


  public function isLoggedIn() {
    $session = Session::getInstance();
    $session->confirm($this->_user_id);
  }


  public function approve() {
    throw new NotAuthorizedException();
  }


  public function reject() {
    throw new NotAuthorizedException();
  }


  public function evaluate() {
    throw new NotAuthorizedException();
  }

}