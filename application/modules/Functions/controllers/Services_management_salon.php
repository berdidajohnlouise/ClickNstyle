<?php

class Services_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Services_management_salon_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      $services = $this->Services_management_salon_m->getServices();

      $data = array(
        'title'=>'Service Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'services'=>$services
      );
      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('service_management_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function getService($id){
      $success = $this->Services_management_salon_m->getService($id);
      echo json_encode($success);
    }


    function addServices(){
      $filename = 'uploadimage';

      $path = "./assets/servicesimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $servicedetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'servicename'=>$servicedetails['servicename'],
          'servicedesc'=>$servicedetails['servicedesc'],
          'price'=>$servicedetails['price'],
          'serviceduration'=>$servicedetails['serviceduration'],
          'servicetype'=>$servicedetails['servicetype'],
          'serviceimage'=>'salonservices.jpg'
        );

        $success = $this->Services_management_salon_m->addservices($data);

        if($success =='True'){
          redirect('Functions/Services_management_salon');
        }
      }else{

          $image = $this->upload->data();

          $data = array(
            'servicename'=>$servicedetails['servicename'],
            'servicedesc'=>$servicedetails['servicedesc'],
            'price'=>$servicedetails['price'],
            'serviceduration'=>$servicedetails['serviceduration'],
            'servicetype'=>$servicedetails['servicetype'],
            'serviceimage'=>$image['file_name']
          );


        $success = $this->Services_management_salon_m->addservices($data);

        if($success =='True'){
          redirect('Functions/Services_management_salon');
        }
      }

    }

    function updateServices(){
      $filename = 'uploadServices';

      $path = "./assets/servicesimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $servicedetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'serviceid'=>$servicedetails['serviceid'],
          'servicename'=>$servicedetails['servicename'],
          'servicedesc'=>$servicedetails['servicedesc'],
          'price'=>$servicedetails['price'],
          'serviceduration'=>$servicedetails['serviceduration'],
          'servicetype'=>$servicedetails['servicetype'],
          'serviceimage'=>''
        );

        $success = $this->Services_management_salon_m->updateservices($data);

        if($success =='True'){
          redirect('Functions/Services_management_salon');
        }

      }else{

          $image = $this->upload->data();

          $data = array(
            'serviceid'=>$servicedetails['serviceid'],
            'servicename'=>$servicedetails['servicename'],
            'servicedesc'=>$servicedetails['servicedesc'],
            'price'=>$servicedetails['price'],
            'serviceduration'=>$servicedetails['serviceduration'],
            'servicetype'=>$servicedetails['servicetype'],
            'serviceimage'=>$image['file_name']
          );

        $success = $this->Services_management_salon_m->updateservices($data);

        if($success =='True'){
          redirect('Functions/Services_management_salon');
        }
      }
    }

    function deleteService($id){
      $success = $this->Services_management_salon_m->deleteService($id);
      echo $success;
    }




}
