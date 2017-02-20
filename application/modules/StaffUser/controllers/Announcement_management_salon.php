<?php

class Announcement_management_salon extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('M_sidebars');
      $this->load->model('Account_management_m');
      $this->load->model('Announcement_management_salon_m');
      $this->load->model('Function_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function index(){

      $usersdetails = $this->Function_m->userdetails($this->session->userdata('staffid'));
      $announcement = $this->Announcement_management_salon_m->getAnnouncements();

      $data = array(
        'title'=>'Promos Management',
        //'sidebar'=>$sidebar,
        'userdetails'=>$usersdetails,
        'announcement'=>$announcement
      );

      $this->load->view('Default/staffheader',$data);
      $this->load->view('Default/staffsidebar',$data);
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
          redirect('StaffUser/Announcement_management_salon');
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
          redirect('StaffUser/Announcement_management_salon');
        }

    }

    function deleteAnnouncement($id){
      $success = $this->Announcement_management_salon_m->deleteAnnouncement($id);
      echo $success;
    }




}
