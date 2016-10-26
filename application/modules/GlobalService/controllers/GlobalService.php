<?php

class GlobalService extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('GlobalService_m');
      $this->load->model('Salons_m');
      $this->load->model('Services_m');
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

    function salons(){
      $salons = $this->Salons_m->getSalons();
      $data = array(
        'title'=>'Our Salons',
        'salons'=>$salons
      );
      $this->load->view('Default/globalheader',$data);
      $this->load->view('salons');
      $this->load->view('Default/globalfooter');
    }

    function gallery(){
      $manicure = $this->GlobalService_m->getManicure();
      $hair = $this->GlobalService_m->getHair();
      $pedicure = $this->GlobalService_m->getPedicure();
      $makeup = $this->GlobalService_m->getMakeup();
      $massage = $this->GlobalService_m->getMassage();
      $facial = $this->GlobalService_m->getFacial();
      $data = array(
        'title'=>'Our Salon Services',
        'manicure'=>$manicure,
        'hair'=>$hair,
        'pedicure'=>$pedicure,
        'makeup'=>$makeup,
        'massage'=>$massage,
        'facial'=>$facial,
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
            $this->load->view('Default/globalheader',$data);
            $this->load->view('salon',$data);
            $this->load->view('Default/globalfooter');
        }
        else{
          redirect('GlobalService');
        }

      }
      else{
        redirect('GlobalService');
      }

    }

    function service($id){

      if(!empty($id)){


        $service = $this->Services_m->getService($id);
        $services = $this->Services_m->getServices($id);
        $data = array(
          'title'=>'Services',
          'service'=>$service,
          'services'=>$services
        );
        $this->load->view('Default/globalheader',$data);
        $this->load->view('service',$data);
        $this->load->view('Default/globalfooter');


      }
      else{
        redirect('GlobalService');
      }


    }




}
