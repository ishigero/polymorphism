<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once(APPPATH.'models/accounts/AccountRepository/AccountRepository.php');

  Class Purchase extends CI_Controller {

    public function index() {
      $input = $this->input->post(NULL, TRUE);
      $userId = $this->uri->segment(2);
      $repository = new AccountRepository();
      $user = $repository->find($userId);
      $user->buy($input['goodsId']);
  }
