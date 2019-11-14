<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->is_logged_in ();
    // $this->header ();
  }

  public function is_logged_in(){
    $user = $this->session->userdata('school_id');
    if(isset($user)) {

    }
    else {
      redirect ('admin/account/login');
    }
  }

  public function header() {
    $user['fullname'] = $this->session->userdata('fullname');
    $this->load->view('admin/header.php', $user);
  }
}

/* End of file MY_Controller.php */
