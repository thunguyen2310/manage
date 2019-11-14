<?php 
/**
 * 
 */
class Admin extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('School/Login_M');
		$this->load->library("pagination");	
	}

	public function index()
	{
		$this->load->view('School/index.html');
	}

	public function login()
	{
		$this->load->view('School/login.html');
	}
	
	//login tài khoản Admin
	public function loginAdmin()
	{
		$post = $this->input->post();
			if(isset($post['sub'])) 
			{
				$user = $post['user'];
				$pass = $post['pass'];
				if($this->Login_M->checkAdmin($user,$pass)== true) {								
					redirect('School/Admin/addParents');
				}else
				{
					echo "sai";
				}
			}
		$this->load->view('School/loginAdmin.html');
	}

	//hàm logout
	public function logout()
	{
   	$this->session->sess_destroy();
   	redirect('School/Admin/index','location');
  	}

  	//danh sách phụ huynh
  	public function listPa()
  	{
  		$parents = $this->Login_M->listParents();
		$this->data['parents']=$parents;
		$this->load->view('Parents/listParents',$this->data);	
  	}

  	//rowspan
  	public function listParent()
  	{
  		//khởi tạo một list rổng (chứa tất cả thông tin phụ huynh, tên và lớp của con)
  		$list_all= [];
  		//Lấy ra danh sách phụ huynh
  		$parents = $this->Login_M->listParents();
  			// 	echo "<pre>";
			// print_r($parents);
		foreach($parents as $key1) {
			//lấy id của phụ huynh truyền vào hàm lấy danh sách học sinh. khi id cha = Id_St_pa thì lấy ra tên với lớp của học sinh
			$id = $key1['Id_Pa'];
			$students = $this->Login_M->getStudentsbyIDPa($id);
			// echo "<pre>";
			// print_r($students);
			$list_all[]= [
				'Id_Pa'          =>$key1['Id_Pa'],
				'User_Pa'        =>$key1['User_Pa'],
				'Fullname_Pa'    =>$key1['Fullname_Pa'],
				'Email_Pa'       =>$key1['Email_Pa'],
				'Address_Pa'     =>$key1['Address_Pa'],
				'Phone_Pa'       =>$key1['Phone_Pa'],
				'Pass_Pa'        =>$key1['Pass_Pa'],
				'count_student'  =>count($students),
				'list_student'   =>$students,
			];							
		}
		$this->data['list_all']=$list_all;
			$this->load->view('Parents/listRS',$this->data);			
		//$this->load->view('Parents/listParents',$this->data);	
  	}

  	private function rowSpan()
  	{
  		$this->load->view('Parents/rowSpan');
  	}

  	//phụ huynh theo id, chỉnh sửa và xóa thông tin phụ huynh
  	public function Parents($id)
 	{
 		//xuất ra phụ huynh theo id muốn chỉnh sửa
		$parents = $this->Login_M->getParentsID($id);
		$this->data['parents']=$parents;
		$post = $this->input->post();

		//nếu bám vào nút Update thì cập nhật lại thông tin
		if (isset($post['subUpdate'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$address  = $post['address'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$input    = array('User_Pa'    =>$user,
							 'Email_Pa'    =>$email,
							 'Fullname_Pa' =>$fullname, 
							 'Address_Pa'  =>$address,
							 'Phone_Pa'    =>$phone,
							 'Pass_Pa'     =>$pass,);
			$this->Login_M->updateParents($id,$input);
			redirect('School/Admin/listPa','refresh');
		}

		//nếu bám vào nút Delete thì xóa phụ huynh
		if (isset($post['subDelete']))
		{
			$this->Login_M->deleteParents($id);
			redirect('School/Admin/listPa','refresh');
		}
		$this->load->view('School/update_parents',$this->data);

	}
	
	//danh sách học sinh
  	public function listStu()
  	{
  		$students = $this->Login_M->listStudents();
		$this->data['students']=$students;
		$this->load->view('Parents/listStudents',$this->data);	
  	}

	//học sinh theo id, chỉnh sửa và xóa thông tin học sinh 
	public function Students($id)
 	{
 		//xuất ra học sinh theo id muốn chỉnh sửa
		$students = $this->Login_M->getStudentsID($id);
		$this->data['students']=$students;
		$post = $this->input->post();
		//cập nhật
		if (isset($post['subUpdate'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$class    = $post['class'];
			$id_Pa    = $post['idPa'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$input    = array('User_St'    =>$user,
							 'Email_St'   =>$email,
							 'Fullname_St'=>$fullname, 
							 'Class_St'   =>$class,
							 'Id_St_Pa'   =>$id_Pa,
							 'Phone_St'   =>$phone,
							 'Pass_St'    =>$pass,);
			$this->Login_M->updatePa($input);
			redirect('School/Admin/listStu','refresh');
		}

		//xóa
		if (isset($post['subDelete']))
		{
			$this->Login_M->deleteStudents($id);
			redirect('School/Admin/listStu','refresh');
		}
		$this->load->view('School/update_students',$this->data);
	}

  	//xem chi tiết phụ huynh có bao nhiêu con
 	public function viewStudents($id)
 	{
		$parents = $this->Login_M->getUserByID($id);
		$this->data['parents']=$parents;
		$this->load->view('School/login_user',$this->data);		
	 	// echo '<pre>';
	 	// print_r($parents);
	}
	
	//thêm tài khoản cho phụ huynh và học sinh
	public function addParents()
	{
		//thêm phụ huynh
		$post = $this->input->post();
		if (isset($post['subAdd'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$address  = $post['address'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$input    = array('User_Pa'   =>$user,
							 'Email_Pa'   =>$email,
							 'Fullname_Pa'=>$fullname, 
							 'Address_Pa' =>$address,
							 'Phone_Pa'   =>$phone,
							 'Pass_Pa'    =>$pass,);
			$this->Login_M->addParents($input);
			redirect('School/Admin/listPa','location');
		}
		
		$this->load->view('School/managePa.html');
	}

	public function showClass(){ 
		$data['class'] = $this->Login_M->showClass();
		$this->load->view('School/user',$data); 
	}
	//thêm học sinh
	public function addStudents()
	{	
		$post = $this->input->post();
		if (isset($post['subAdd_St'])) 
		{
			$user     = $post['username'];
			$email    = $post['email'];
			$fullname = $post['fullname'];
			$class    = $post['class'];
			$id_Pa    = $post['idPa'];
			$phone    = $post['phone'];	
			$pass	  = $post['password'];
			$input    = array('User_St'    =>$user,
							 'Email_St'    =>$email,
							 'Fullname_St' =>$fullname, 
							 'Class_St'    =>$class,
							 'Id_St_Pa'    =>$id_Pa,
							 'Phone_St'    =>$phone,
							 'Pass_St'     =>$pass,);
			$this->Login_M->addStudents($input);
			redirect('School/Admin/listStu','refresh');
		}

		//nhà trường thêm lớp
		if (isset($post['subAdClass'])) 
		{		
			$input  =array( 
							'Id_Cl'        =>$post['idclass'],
							'Name_Class'   =>$post['name'],
						  );
			$this->Login_M->addClass($input);
			echo "thành công";
		}
		$this->load->view('School/manageStu.html');
	}		

	//Hàm tìm kiếm
	public function search()
	{			
		 $keyword    =   $this->input->post('keyword');
		 $data['parents'] = $this->Login_M->search($keyword);			
		 $this->load->view('Parents/listParents',$data);
	}
	public function viewcode()
	{		
		$this->load->view('minhthu.html');
	}	
	function ajaxSearch()
	{
		$this->load->view('ajaxSearch');
	}	
	  public function ajaxRequest($id="")
   {

   	   // print_r($id);

   	   $info_admin = $this->Login_M->getAdminByID($id);
   	   $this->data['info_admin']= $info_admin;
   	   $this->data['id']= $id;
       $listadmin = $this->Login_M->getListAdmin();	
       $this->data['listadmin']=$listadmin;        
       $this->load->view('itemlist',$this->data);

   }
   public function updateAdmin()
   {
   	 $post=$this->input->post();
   	 $data=[
   	 	'User_Ad'=>$post['User_Ad'],
   	 	'Fullname_Ad'=>$post['Fullname_Ad'],
   	 ];
   	 $this->Login_M->updateAdmin($post['Id_Ad'],$data);
   }
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function ajaxRequestPost()
   {
      $data = array(           
			'Fullname_Ad' => $this->input->post('Fullname_Ad'),
			'User_Ad' => $this->input->post('User_Ad'),

			// 'Fullname_Pa' => $this->input->post('Fullname_Pa'),
			// 'Address_Pa' => $this->input->post('Address_Pa'),
			// 'Phone_Pa' => $this->input->post('Phone_Pa'),
			// 'Pass_Pa' => $this->input->post('Pass_Pa'),
        );
      $this->Login_M->addAdmin($data);
      echo 'Added successfully.';  
    }

 
  	public function deleteAdmin()
  	{
  		$Id_Ad= $this->input->post('Id_Ad');
  		$this->Login_M->deleteAdmin($Id_Ad);
  	}
   public function listSearch()
   {
   		$full_name= $this->input->post('full_name');
   		$listsearch=$this->Login_M->listSearch($full_name);

   		$html = '
   			<tr >
                <th  style="text-align:center">ID</th>
          		<th style="text-align:center">User_Ad</th>
          		<th style="text-align:center">Fullname_Ad</th>        
            </tr>';
            if(count($listsearch) > 0){
                foreach ($listsearch as $value){
                    $html.='<tr>
                     <td style="vertical-align: middle;text-align: center;">'.$value['Id_Ad'].'</td>
                     <td style="vertical-align: middle;text-align: center;">'.$value['User_Ad'].'</td>
                     <td style="vertical-align: middle;text-align: center;">'.$value['Fullname_Ad'].'</td></tr>';
                }
            }
            else{
                $html .= '<tr><td style="vertical-align: middle;text-align: center;color: red" colspan="3" >結果はありません。</td></tr>';
            }
        $myObj['data_html'] = $html;
        $myJSON = json_encode($myObj);
        echo $myJSON;
   }
}
?>