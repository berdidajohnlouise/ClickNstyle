<?php

class GlobalService extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('GlobalService_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $data = array(
        'title'=>'Main page',
        'homepageheader'=>'homepage header-collapse'

      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('GlobalService/index');
      $this->load->view('Default/globalfooter');

    }

    function about(){
      $data = array(
        'title'=>'About Us'

      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('about');
      $this->load->view('Default/globalfooter');
    }

    function services(){
      $data = array(
        'title'=>'Our Services'

      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('services');
      $this->load->view('Default/globalfooter');
    }

    function gallery(){
      $salons = $this->GlobalService_m->getSalons();

      $data = array(
        'title'=>'Our Galleries',
        'salons'=>$salons
      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('gallery',$data);
      $this->load->view('Default/globalfooter');

    }

    function contact(){
      $data = array(
        'title'=>'Contact'

      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('contact');
      $this->load->view('Default/globalfooter');
    }



}
