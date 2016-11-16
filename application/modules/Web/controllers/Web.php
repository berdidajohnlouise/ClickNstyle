<?php

class Web extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('Web_m');
      $this->load->model('GlobalService/Salons_m');
      $this->load->model('GlobalService/Services_m');
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
      $salons = $this->Salons_m->getSalons();
      $data = array(
        'title'=>'Our Salons',
        'salons'=>$salons

      );
      $this->load->view('Default/header',$data);
      $this->load->view('salons',$data);
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

    function salon($id){

      if(!empty($id)){

        $salon = $this->Salons_m->getSalon($id);

        if($salon != 'False'){
            $staffs = $this->Salons_m->getStaffs($id);
            $services = $this->Salons_m->getServices($id);
            $products = $this->Salons_m->getProducts($id);
            $promos = $this->Salons_m->getPromos($id);
            $announcements = $this->Salons_m->getAnnouncements($id);
            $data = array(
              'title'=>'Welcome To '.$salon->SalonName,
              'salon'=>$salon,
              'staffs'=>$staffs,
              'services'=>$services,
              'products'=>$products,
              'promos'=>$promos,
              'announcements'=>$announcements
            );
            $this->load->view('Default/header',$data);
            $this->load->view('salon',$data);
            $this->load->view('Default/footer');
        }
        else{
          redirect('Web');
        }

      }
      else{
        redirect('Web');
      }

    }

    function service($id){

        $service = $this->Services_m->getService($id);
        $services = $this->Services_m->getServices($id);
        $data = array(
          'title'=>'Services',
          'service'=>$service,
          'services'=>$services
        );
        $this->load->view('Default/header',$data);
        $this->load->view('service',$data);
        $this->load->view('Default/footer');

    }

    function getCalendars($id){
      $success = $this->Web_m->getCalendars($id);
      echo json_encode($success);
    }


    function signinStaff(){
      $this->load->view('loginStaff');
    }
}
