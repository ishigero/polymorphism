<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once(APPPATH.'models/accounts/AccountRepository/AccountRepository.php');

  Class Login extends CI_Controller {

    public function index() {
      $this->load->view('/login/index.html');
      return;
    }

    public function check() {
      $loginInfo = $this->input->post(NULL,TRUE);
      $repository = new AccountRepository();
      $user = $repository->findByLoginId($loginInfo['login_id'],$loginInfo['pass']);
      if(!$user->confirm_password($loginInfo['pass'])) {
        $data = ['msg'=>'ログインIDかパスワードが間違っています'];
        $this->load->view('/login/index.html', $data);
        return;
      }
      $user->isLoggedIn();
      redirect('/mypage/'.$_SESSION['user_id'], 'location', 301);
      exit;
    }

  }
