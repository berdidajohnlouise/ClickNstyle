<?php

class Announcement_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Announcement_management_salon_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $sidebar = $this->M_sidebars->sidebars($this->session->userdata('usertype'));
      $usersdetails = $this->Account_management_m->account_details($this->session->userdata('userid'));
      $announcement = $this->Announcement_management_salon_m->getAnnouncements();

      $data = array(
        'title'=>'Promos Management',
        'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'announcement'=>$announcement
      );

      $this->load->view('Default/adminheader',$data);
      $this->load->view('Default/adminsidebar',$data);
      $this->load->view('announcement_management_salon',$data);
      $this->load->view('Default/adminfooter');
    }

    function getAnnouncement($id){
      $success = $this->Announcement_management_salon_m->getAnnouncement($id);
      echo json_encode($success);
    }


    function addAnnouncement(){

      $details = $this->input->post();

        $data = array(
          'ann_title'=>$details['ann_title'],
          'ann_desc'=>$details['ann_desc'],
        );

        $success = $this->Announcement_management_salon_m->addannouncement($data);

        if($success =='True'){
          redirect('Functions/Announcement_management_salon');
        }


    }

    function updateAnnouncement(){
      $details = $this->input->post();

        $data = array(
          'ann_id'=>$details['ann_id'],
          'ann_title'=>$details['ann_title'],
          'ann_desc'=>$details['ann_desc'],
        );

        $success = $this->Announcement_management_salon_m->updateannouncement($data);

        if($success =='True'){
          redirect('Functions/Announcement_management_salon');
        }

    }

    function deleteAnnouncement($id){
      $success = $this->Announcement_management_salon_m->deleteAnnouncement($id);
      echo $success;
    }




}
