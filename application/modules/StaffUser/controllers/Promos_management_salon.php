<?php

class Promos_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Promos_management_salon_m');
      $this->load->model('Function_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $usersdetails = $this->Function_m->userdetails($this->session->userdata('staffid'));
      $promos = $this->Promos_management_salon_m->getPromos();

      $data = array(
        'title'=>'Promos Management',
        //'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'promos'=>$promos
      );

      $this->load->view('Default/staffheader',$data);
      $this->load->view('Default/staffsidebar',$data);
      $this->load->view('promos_management_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function getPromo($id){
      $success = $this->Promos_management_salon_m->getPromo($id);
      echo json_encode($success);
    }


    function addPromo(){
      $filename = 'uploadimage';

      $path = "./assets/promosimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $promodetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'promoname'=>$promodetails['promoname'],
          'promodesc'=>$promodetails['promodesc'],
          'price'=>$promodetails['price'],
          'expdate'=>$promodetails['expdate'],
          'promoimage'=>'promosample.jpg'
        );

        $success = $this->Promos_management_salon_m->addpromo($data);

        if($success =='True'){
          redirect('StaffUser/Promos_management_salon');
        }
      }else{

          $image = $this->upload->data();


          $data = array(
            'promoname'=>$promodetails['promoname'],
            'promodesc'=>$promodetails['promodesc'],
            'price'=>$promodetails['price'],
            'expdate'=>$promodetails['expdate'],
            'promoimage'=>$image['file_name']
          );


        $success = $this->Promos_management_salon_m->addpromo($data);

        if($success =='True'){
          redirect('StaffUser/Promos_management_salon');
        }
      }

    }

    function updatePromo(){
      $filename = 'uploadPromo';

      $path = "./assets/promosimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $promodetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'promoid'=>$promodetails['promoid'],
          'promoname'=>$promodetails['promoname'],
          'promodesc'=>$promodetails['promodesc'],
          'price'=>$promodetails['price'],
          'expdate'=>$promodetails['expdate'],
          'promoimage'=>''
        );

        $success = $this->Promos_management_salon_m->updatepromo($data);

        if($success =='True'){
          redirect('StaffUser/Promos_management_salon');
        }
      }else{

          $image = $this->upload->data();


          $data = array(
            'promoid'=>$promodetails['promoid'],
            'promoname'=>$promodetails['promoname'],
            'promodesc'=>$promodetails['promodesc'],
            'price'=>$promodetails['price'],
            'expdate'=>$promodetails['expdate'],
            'promoimage'=>$image['file_name']
          );


        $success = $this->Promos_management_salon_m->updatepromo($data);

        if($success =='True'){
          redirect('StaffUser/Promos_management_salon');
        }
      }
    }

    function deletePromo($id){
      $success = $this->Promos_management_salon_m->deletePromo($id);
      echo $success;
    }




}
