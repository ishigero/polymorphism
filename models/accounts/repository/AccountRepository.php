<?php

require_once(APPPATH.'models/accounts/AccountFactory/AccountFactory.php');
require_once(APPPATH.'models/accounts/null/NullUser.php');
require_once(BASEPATH.'/core/Model.php');

class  AccountRepository extends CI_Model {


    public function findByLoginId($loginId, $password): User {
        $query = "SELECT user_id, name, password, type
        FROM users_master
        WHERE login_id = ?
        AND password = ?
        ";
      $query = $this->db->query($query, [
          $this->db->escape_str($loginId)
          , $this->db->escape_str(hash("sha256", $password))
      ]);
      if($query->num_rows() > 0) {
          $result = $query->row();
          return AccountFactory::create($result);
      } else {
          return NullUser::create();
      }
    }


    public function find($userId): User {
        $query = "SELECT user_id, name, password, type 
        FROM users_master
        WHERE user_id = ?
        ";
      $query = $this->db->query($query, $this->db->escape_str($userId));
      if($query->num_rows() > 0) {
          $result = $query->row();
          return AccountFactory::create($result);
      } else {
          return NullUser::create();
      }
    }
}