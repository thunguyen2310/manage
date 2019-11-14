<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Export_M extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }  
        public function exportList() {
           $this->db->select('Id_Pa,User_Pa,Email_Pa,Fullname_Pa, Address_Pa,Phone_Pa,Pass_Pa');
           return $this->db->get('parents')->result_array();
        }
    }
?>


