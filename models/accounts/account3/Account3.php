<?php

require_once(APPPATH.'models/accounts/AccountType/AccountType.php');
require_once(APPPATH.'models/interface/user.php');
require_once(APPPATH.'models/session/Session.php');


class Account3 implements User {

  private $_userId;
  private $_userName;
  private $_securePassword;
  private $_type;  


  public function __construct($userId, $userName, $securePassword) {
    $this->_userId = $userId;
    $this->_userName = $userName;
    $this->_securePassword = $securePassword;
  }


  public function confirm_password($password): bool {
    return $this->_securePassword === hash('sha256', $password);
  }


  public function typeOf($type): bool {
    return $type === AccountType::ACCOUNT_3;
  }


  public function isLoggedIn() {
    $session = Session::getInstance();
    $session->confirm($this->_userId);
  }


  public function sell($goodsId) {
    echo'何か売る';
  }


  public function buy($goodsId) {
    throw new NotAuthorizedException();
  }


  public function watch($goodsId) {
    echo'何か見る';
  }
}