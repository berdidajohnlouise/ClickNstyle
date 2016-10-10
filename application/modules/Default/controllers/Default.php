<?php

class Default extends MY_Controller{

  function __construct(){
  parent::__construct();
}

    function header(){
      $this->load->view('header');
    }
    function footer(){
      $this->load->view('footer');
    }



}
