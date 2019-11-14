<?php
	class Parents extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('School/Login_M');	
	}
	//login phụ huynh
	public function loginParents()
	{	
		$post = $this->input->post();
			if(isset($post['subLogIn'])) 
			{
				$user = $post['user'];
				$pass = $post['pass'];
				if($this->Login_M->checkParents($user,$pass)== true) {	
					$data = $this->getDataUser($user);					
					$this->session->set_userdata($data);
				    redirect('School/Parents/success2');
				}else
				{
					echo "sai";
				}
			}	
		$this->load->view('School/loginParents.html');
	}

	public function getDataUser($user)
    {
        $data;
        $user_info = $this->Login_M->getUserData($user);
        $data = array(
            'Id_Pa'       => $user_info['Id_Pa'],
            'User_Pa'     => $user_info['User_Pa'],
            'Email_Pa'    => $user_info['Email_Pa'],
     	);
        return $data;
    }	
    
    //đăng xuất thì không quay lại được trang đã đăng nhập thành công
    public function is_logged()
	{
		$user = $this->session->userdata('Id_Pa');
	    if(isset($user)) {
	    }
	    else {
	      redirect('School/Admin/login','refresh');
	    }
	}
    // hàm đăng nhập thành công	của phụ huynh,
	public function success2()
	{	
		// $list_join=$this->Login_M->getUserByID();
		
		// $list=$this->Login_M->getUserByID2();
		// echo "<pre>";
		// print_r($list_join);
		// print_r('//////////////////////////////////////////////////////////');
		// echo "<pre>";
		// print_r($list);die();
		$this->is_logged();
		$ID_Pa=$this->session->userdata('Id_Pa');
		$parents=$this->Login_M->getParentbyID($ID_Pa);
		$this->data['parents'] = $parents;
		//lấy id của phụ huynh truyền vào hàm lấy danh sách hs theo phụ huynh		
		$students = $this->Login_M->getStudentsbyIDPa($ID_Pa);
		$this->data['students'] = $students;
		$post = $this->input->post();

		$this->data['class'] = $this->Login_M->showClass();
		if (isset($post['subChange'])){	
			foreach($students as $st){
				$Id_St    = $st['Id_St'];			
				$class    = $post["class_".$Id_St];	
				$data_change =array('class_St' =>$class,);	
				// print_r($Id_St);
				// print_r($data_change);
				// die();		    	
				 $this->Login_M->updateClassStudents($Id_St,$data_change);
				 	
			}
			redirect('School/Parents/success2','refresh');		
	    }
		// phụ huynh chỉnh sửa thông tin cái nhân
		
		if (isset($post['subUpdate'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$address  = $post['address'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$data_update    =array('User_Pa'    =>$user,
							 'Email_Pa'   =>$email,
							 'Fullname_Pa'=>$fullname, 
							 'Address_Pa' =>$address,
							 'Phone_Pa'   =>$phone,
							 'Pass_Pa'    =>$pass,);
			$this->Login_M->updatePa($ID_Pa,$data_update);
			redirect('School/Admin/listPa','refresh');
		}		
		// đăng kí thêm tài khoản cho con
		if (isset($post['subAdd_St'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$class    = $post['class'];
			$id_Pa    = $post['idPa'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$input    =array('User_St'    =>$user,
							 'Email_St'   =>$email,
							 'Fullname_St'=>$fullname, 
							 'Class_St'   =>$class,
							 'Id_St_Pa'   =>$id_Pa,
							 'Phone_St'   =>$phone,
							 'Pass_St'    =>$pass,);
			$this->Login_M->addStudents($input);
			echo "đăng ký thành công";
		}
		$this->load->view('School/user.php',$this->data);
	}
}
	
?>