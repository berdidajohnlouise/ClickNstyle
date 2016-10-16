<?php

class Staff_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Staff_management_salon_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      $staffs = $this->Staff_management_salon_m->getStaffs();

      $data = array(
        'title'=>'Staff Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'staffs'=>$staffs
      );
      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('staff_management_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function addstaffs(){
      $filename = 'uploadimage';

      $path = "./assets/staffsimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $staffdetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'nickname'=>$staffdetails['nickname'],
          'firstname'=>$staffdetails['firstname'],
          'lastname'=>$staffdetails['lastname'],
          'position'=>$staffdetails['position'],
          'dob'=>$staffdetails['dob'],
          'contactnumber'=>$staffdetails['contactnumber'],
          'status'=>1,
          'user_image'=>'user.png'
        );

        $success = $this->Staff_management_salon_m->addstaffs($data);

        if($success =='True'){
          redirect('Functions/Staff_management_salon');
        }
      }else{

          $image = $this->upload->data();

        $data = array(
          'nickname'=>$staffdetails['nickname'],
          'firstname'=>$staffdetails['firstname'],
          'lastname'=>$staffdetails['lastname'],
          'position'=>$staffdetails['position'],
          'dob'=>$staffdetails['dob'],
          'contactnumber'=>$staffdetails['contactnumber'],
          'status'=>1,
          'user_image'=>$image['file_name']
        );


        $success = $this->Staff_management_salon_m->addstaffs($data);

        if($success =='True'){
          redirect('Functions/Staff_management_salon');
        }
      }

    }


    function updatestaff(){
      $filename = 'uploadStaff';

      $path = "./assets/staffsimage";
      chmod($path, 777);
      $config["upload_path"] = $path;
      $config["allowed_types"] = "jpg|png|jpeg|ico";
      $config["max_size"] = "10000";
      $config["max_height"] = "7680";
      $config["max_width"] = "10240";
      $this->load->library("upload", $config);
      $staffdetails = $this->input->post();

      if( ! $this->upload->do_upload($filename)){

        $data = array(
          'staffid'=>$staffdetails['staffsid'],
          'nickname'=>$staffdetails['nickname'],
          'firstname'=>$staffdetails['firstname'],
          'lastname'=>$staffdetails['lastname'],
          'position'=>$staffdetails['position'],
          'dob'=>$staffdetails['dob'],
          'contactnumber'=>$staffdetails['contactnumber'],
          'status'=>$staffdetails['status'],
          'user_image'=>''
        );

        $success = $this->Staff_management_salon_m->updatestaff($data);

        if($success =='True'){
          redirect('Functions/Staff_management_salon');
        }
      }else{

          $image = $this->upload->data();

        $data = array(
          'staffid'=>$staffdetails['staffsid'],
          'nickname'=>$staffdetails['nickname'],
          'firstname'=>$staffdetails['firstname'],
          'lastname'=>$staffdetails['lastname'],
          'position'=>$staffdetails['position'],
          'dob'=>$staffdetails['dob'],
          'contactnumber'=>$staffdetails['contactnumber'],
          'status'=>$staffdetails['status'],
          'user_image'=>$image['file_name']
        );


        $success = $this->Staff_management_salon_m->updatestaff($data);

        if($success =='True'){
          redirect('Functions/Staff_management_salon');
        }
      }

    }


    function getStaff($id){
      $success = $this->Staff_management_salon_m->getStaff($id);
      echo json_encode($success);
    }

    function deleteStaff($id){
      $success = $this->Staff_management_salon_m->deleteStaff($id);
      echo $success;
    }

}
