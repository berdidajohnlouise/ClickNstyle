<?php

class Auth extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('M_auth');
    $this->load->helper('url');
  }

  function register(){
    $registerdata = array(
      'uname'=>$this->input->post('username'),
      'pass'=>md5($this->input->post('password')),
      'utype'=>$this->input->post('usertype'),
      'email'=>$this->input->post('email'),
      'fname'=>$this->input->post('fname'),
      'lname'=>$this->input->post('lname'),
      'address'=>$this->input->post('address')
    );

    $success = $this->M_auth->register($registerdata);
    if($success == 'Username exist ! Please Create Another One'){
      $data = array(
        'title'=>'Registration Form',
        'notsuccess'=> $success
      );

      $this->load->view('Default/header',$data);
      $this->load->view('Web/register',$data);
      $this->load->view('Default/footer');
    }
  }

  function login(){
    $data = $this->input->post('data');

    $userdetails = array(
      'username'=>$data['username'],
      'password'=>md5($data['password'])
    );
    $success = $this->M_auth->login($userdetails);
    if($success == 'Login'){
      echo $success;
    }else{
      echo $success;
    }
  }

  function logout(){
        $this->session->sess_destroy();
        redirect('Web');
  }

}

 ?>
