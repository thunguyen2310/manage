
<?php  
class Import_M extends CI_Model
	{
		
		public function __construct()
	    {
	       
	        $this->load->database();       
	    }
	    public function importData($data) {
  
            $res = $this->db->insert_batch('import',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
	    

	}    
?>