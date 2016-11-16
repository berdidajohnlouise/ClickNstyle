  <?php

class Account_management extends MY_Controller{

    function __construct(){
      parent::__construct();
      $this->load->model('Account_management_m');
      if(!$this->session->userdata('userid')){
            redirect('Web');
        }
    }

    function updateaccount(){
      $data = $this->input->post('data');

      $userdetails = array(
        'username'=>$data['username'],
        'password'=>md5($data['password']),
        'email'=>$data['email']
      );

      $success = $this->Account_management_m->updateaccount($userdetails);

      if($success =='True'){
        echo $success;
      }
      else{
        echo $success;
      }

    }

    function updateprofile(){

        $filename = 'uploadimage';

        $path = "./assets/usersimage";
        chmod($path, 777);
        $config["upload_path"] = $path;
        $config["allowed_types"] = "jpg|png|jpeg|ico";
        $config["max_size"] = "10000";
        $config["max_height"] = "7680";
        $config["max_width"] = "10240";
        $data = $this->input->post();
        $this->load->library("upload", $config);

      if($this->session->userdata('usertype')==1){
        if( ! $this->upload->do_upload($filename)){

          $userdetails = array(
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'address'=>$data['address'],
            'user_image'=>''
          );

          $success = $this->Account_management_m->updateProfile($userdetails);

          if($success =='True'){
            redirect('Functions');
          }
        }else{

            $image = $this->upload->data();


          $userdetails = array(
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'address'=>$data['address'],
            'user_image'=>$image['file_name']
          );


          $success = $this->Account_management_m->updateProfile($userdetails);

          if($success =='True'){
            redirect('Functions');
          }
        }

      }
      else if($this->session->userdata('usertype')==0){

        if( ! $this->upload->do_upload($filename)){

          $userdetails = array(
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'address'=>$data['address'],
            'user_image'=>''
          );

          $success = $this->Account_management_m->updateProfile($userdetails);
          if($success =='True'){
            redirect('Functions');
          }
        }else{

          $image = $this->upload->data();

          $userdetails = array(
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'address'=>$data['address'],
            'user_image'=>$image['file_name']
          );


          $success = $this->Account_management_m->updateProfile($userdetails);

          if($success =='True'){
            redirect('Functions');
          }
        }
      }
      else if($this->session->userdata('usertype')==2){
        if( ! $this->upload->do_upload($filename)){

          $userdetails = array(
            'salonname'=>$data['salonname'],
            'contactnumber'=>$data['contactnumber'],
            'salonaddress'=>$data['salonaddress'],
            'long'=>$data['long'],
            'lat'=>$data['lat'],
            'ownername'=>$data['ownername'],
            'salondetails'=>$data['salondetails'],
            'user_image'=>''
          );

          $success = $this->Account_management_m->updateProfile($userdetails);

          if($success =='True'){
            redirect('Functions');
          }

        }else{

            $image = $this->upload->data();


          $userdetails = array(
            'salonname'=>$data['salonname'],
            'contactnumber'=>$data['contactnumber'],
            'salonaddress'=>$data['salonaddress'],
            'long'=>$data['long'],
            'lat'=>$data['lat'],
            'ownername'=>$data['ownername'],
            'salondetails'=>$data['salondetails'],
            'user_image'=>$image['file_name']
          );


          $success = $this->Account_management_m->updateProfile($userdetails);

          if($success =='True'){
            redirect('Functions');
          }
        }
      }


  }

}
