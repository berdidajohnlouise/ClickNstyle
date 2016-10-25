<?php

class Web extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('Web_m');
      // if($this->session->userdata('userid')){
      //       redirect('Functions/Functions');
      // }
    }

    function index(){

      $data = array(
        'title'=>'Main page',
        'homepageheader'=>'homepage header-collapse'

      );
      $this->load->view('Default/header',$data);
      $this->load->view('index');
      $this->load->view('Default/footer');
    }

    function about(){
      $data = array(
        'title'=>'About Us'

      );
      $this->load->view('Default/header',$data);
      $this->load->view('about');
      $this->load->view('Default/footer');
    }

    function salons(){
      $data = array(
        'title'=>'Our Services'

      );
      $this->load->view('Default/header',$data);
      $this->load->view('salons');
      $this->load->view('Default/footer');
    }

    function gallery(){
      $manicure = $this->Web_m->getManicure();
      $hair = $this->Web_m->getHair();
      $pedicure = $this->Web_m->getPedicure();
      $makeup = $this->Web_m->getMakeup();
      $massage = $this->Web_m->getMassage();
      $facial = $this->Web_m->getFacial();
      $data = array(
        'title'=>'Our Salon Services',
        'manicure'=>$manicure,
        'hair'=>$hair,
        'pedicure'=>$pedicure,
        'makeup'=>$makeup,
        'massage'=>$massage,
        'facial'=>$facial,
      );

      $this->load->view('Default/header',$data);
      $this->load->view('gallery',$data);
      $this->load->view('Default/footer');

    }

    function contact(){
      $data = array(
        'title'=>'Contact'

      );
      $this->load->view('Default/header',$data);
      $this->load->view('contact');
      $this->load->view('Default/footer');
    }

    function register(){
      $data = array(
        'title'=>'Registration Form',
        'notsuccess'=>''
      );
      $notsuccess = "";
      $this->load->view('Default/header',$data);
      $this->load->view('register',$data);
      $this->load->view('Default/footer');
    }

    function login(){
      $this->load->view('login');
    }
}
