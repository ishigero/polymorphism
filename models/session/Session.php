<?php

class Session {

  private static $instance;


  public static function getInstance() {
    if(!isset(static::$instance)) {
      static::$instance = new Session();
    }
    return static::$instance;
  }


  public function confirm($id) {
    try {
      if(empty($id)) {
        throw new InvalidArgumentException('ログインしてください');
      } else {
        $_SESSION['user_id'] = $id;
      }
    } catch(Exception $e) {
      echo "エラー：" .$e->getMessage();exit;
    }
    return;
  }

}