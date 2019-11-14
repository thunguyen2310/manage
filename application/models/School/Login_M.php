<?php  
class Login_M extends CI_Model
	{
		
		public function __construct()
	    {
	        parent::__construct();	        
	    }

	    //kiểm tra login Admin
	    public function checkAdmin($user,$pass)
		{
			$this->db->select('User_Ad,Pass_Ad');
			$this->db->where('User_Ad',$user);
			$this->db->where('Pass_Ad',$pass);
			$where= $this->db->get('admin');
			if ($where->num_rows()>0) {
				return true;
			}else
			{
				return false;
			}
		}

		//kiểm tra login phụ huynh
		public function checkParents($user,$pass)
		{
			$this->db->select('User_Pa,Pass_Pa');
			$this->db->where('User_Pa',$user);
			$this->db->where('Pass_Pa',$pass);
			$where= $this->db->get('parents');
			if ($where->num_rows()>0) {
				return true;
			}else
			{
				return false;
			}
		}

		//hàm kiểm tra xem một huynh có bao nhiêu con , đang học lớp nào
		public function getUserByID()
		{
			$this->db->select('*');
			$this->db->join("students",'Id_Pa = Id_St_Pa','left');
			// $this->db->where('Id_Pa', $id);
			return $this->db->get('parents')->result_array();
		}

		public function getUserByID2()
		{
			$this->db->select('*');
			
			return $this->db->get('parents')->result_array();
		}

		//hàm xuất ra danh sách phụ huynh
		public function listParents()
		{
			$this->db->distinct();
			$this->db->select('Id_Pa, User_Pa, Email_Pa, Fullname_Pa, Address_Pa, Phone_Pa,Pass_Pa');
			return $this->db->get('parents')->result_array();
		}

		//hàm xuất ra phụ huynh theo id
		public function getParentsID($id)
		{
			$this->db->select('Id_Pa,User_Pa,Email_Pa,Fullname_Pa,Address_Pa,Phone_Pa,Pass_Pa');
			$this->db->where('Id_Pa', $id);
			return $this->db->get('parents')->row_array();
		}

		//hàm xuất ra học sinh theo id
		public function getStudentsID($id)
		{
			$this->db->select('Id_St,User_St,Email_St,Fullname_St,Phone_St,Pass_St,Class_St, Id_St_Pa');
			$this->db->where('Id_St', $id);
			return $this->db->get('students')->row_array();
		}
		
		//hàm xuất ra học sinh theo id
		public function getStudentsbyIDPa($id)
		{
			$this->db->select('Id_St,User_St,Fullname_St,Class_St, Id_St_Pa, ');
			$this->db->where('Id_St_Pa', $id);
			return $this->db->get('students')->result_array();
		}

		//hàm xuất ra danh sách học sinh
		public function listStudents()
		{
			$this->db->select('Id_St, User_St, Email_St, Fullname_St, Class_St, Phone_St, Pass_St');
			return $this->db->get('students')->result_array();
		}

		//hàm thêm phụ huynh
	 	public function addParents($data)
		{
		 	$this->db->insert('parents',$data);
		}

		//hàm thêm học sinh
		public function addStudents($data)
		{
			$this->db->insert('students',$data);
		}

		//hàm thêm admin
		public function addAdmin($data)
		{
			$this->db->insert('admin',$data);
		}
		public function deleteAdmin($ID)
		{
			$this->db->where('Id_Ad',$ID);
			$this->db->delete('admin');
		}


		public function getAdminByID($ID)
		{
			$this->db->select('Id_Ad,User_Ad,Fullname_Ad');
		    $this->db->where('Id_Ad',$ID);
			return $this->db->get('admin')->row_array();
		}


		//hàm thêm lớp 
		public function addClass($data)
		{
			$this->db->insert('class',$data);
		} 

		//hàm show ra tất cả cá lớp
		public function showClass()
		{
			$this->db->select('Id_Cl,Name_Class');
			return $this->db->get('class')->result_array();	
		}

		//hàm xóa phụ huynh
		public function deleteParents($id)
		{
			$this->db->where('Id_Pa',$id);
			$this->db->delete('parents');
		}


		//hàm xóa phụ huynh
		public function deleteStudents($id)
		{
			$this->db->where('Id_St',$id);
			$this->db->delete('students');
		}

		//hàm cập nhật phụ huynh
		public function updateParents($id,$data)
		{	
			$this->db->where('Id_Pa',$id);
			$this->db->update('parents',$data);
		}

		//hàm cập nhật phụ huynh theo từng id
		public function updatePa($ID_Pa,$data)
		{	
			$this->db->where('Id_Pa',$ID_Pa);
			$this->db->update('parents',$data);
		}

		//hàm cập nhật học sinh
		public function updateStudents($id,$data)
		{	
			$this->db->where('Id_St',$id);
			$this->db->update('students',$data);
		}

		//hàm để phụ huynh thay đổi lớp của học sinh
		public function updateClassStudents($id,$data)
		{	
			$this->db->where('Id_St',$id);
			$this->db->update('students',$data);
		}
		//hàm gọi ra phụ huynh khi session id = id phụ huynh
		public function getUserData($user){
        $this->db->select('Id_Pa,User_Pa,Email_Pa');
        $this->db->where('User_Pa', $user);
        return $this->db->get('parents')->row_array();
    	}

    	//lấy parents khi Id_Pa bằng id session 
    	public function getParentbyID($ID_Pa){
        $this->db->select('Id_Pa,User_Pa,Email_Pa,Fullname_Pa,Address_Pa,Phone_Pa,Pass_Pa');
        $this->db->where('Id_Pa', $ID_Pa);
        return $this->db->get('parents')->row_array();
    	}

    	//search
    	public function search($keyword)
	   {
	       $this->db->like('User_Pa',$keyword);
	       $this->db->or_like('Email_Pa', $keyword);
	       $this->db->or_like('Fullname_Pa', $keyword);
	       $this->db->or_like('Address_Pa', $keyword);
	       $this->db->or_like('Phone_Pa', $keyword);
	       $this->db->or_like('Pass_Pa', $keyword);
	       $this->db->or_like('Id_Pa', $keyword);
	      return $this->db->get('parents')->result_array();
	   }

	   public function listSearch($ID_Pa){
        if ($ID_Pa != '')$this->db->like('Fullname_Ad',$ID_Pa);
        return $this->db->get('admin')->result_array();
    	}

	   // function fetch_data($query)
	   // {
	   // 		$this->db->select("*");
	   // 		$this->db->from("parents");
	   // 		if ($query != '') {
	   // 			$this->db->like('User_Pa',$query);
		  //      $this->db->or_like('Email_Pa', $query);
		  //      $this->db->or_like('Fullname_Pa', $query);
		  //      $this->db->or_like('Address_Pa', $query);
		  //      $this->db->or_like('Phone_Pa', $query);
		  //      $this->db->or_like('Pass_Pa', $query);
		  //      $this->db->or_like('Id_Pa', $query);
	   // 		}
	   // 		$this->db->order_by('Id_Pa','ASD');
	   // 		return $this->db->get();
	   // }    

	   public function search_posts($search){
                $this->db->select("Id_Pa,Fullname_Pa");
                $whereCondition = array('Id_Pa' =>$search);
                $this->db->where($whereCondition);
                return $this->db->get('parents')->result_array();
                 
        }
        public function getListAdmin()
        {        
        	return $this->db->get("admin")->result_array();
        }

        public function updateAdmin($id,$data)
		{	
			$this->db->where('Id_Ad',$id);
			$this->db->update('admin',$data);
		}

	}    
?>