<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Paging extends CI_Controller {
    public function __construct()
  {
        parent::__construct();
        
        //load model
        $this->load->model('Pagination_M');
        
        // load Pagination library
        $this->load->library('pagination');

        // load db and model
        $this->load->database();
         
        // load URL helper
        $this->load->helper('url');
    }
     
    public function index() 
    {
        // init params
        $params = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Pagination_M->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->Pagination_M->get_current_page_records($limit_per_page, $start_index);
            $config['base_url']    = base_url() . 'paging/index';
            $config['total_rows']  = $total_records;
            $config['per_page']    = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
         
        $this->load->view('Pagination/user_listing', $params);
    }
     
    public function custom()
    {
      
        // init params
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;

        $total_records = $this->Pagination_M->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->Pagination_M->get_current_page_records($limit_per_page, $page*$limit_per_page);

            //hàm diều khiển có chứa phân trang của bạn.     
            $config['base_url']    = base_url() . 'paging/custom';

            //Số này biểu thị tổng số hàng trong tập kết quả mà bạn đang tạo phân trang cho. Thông thường, số này sẽ là tổng số hàng mà truy vấn cơ sở dữ liệu của bạn trả về.
            $config['total_rows']  = $total_records;

            //per_page Số lượng mục bạn định hiển thị trên mỗi trang.
            $config['per_page']    = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            // $config['full_tag_open'] = '<div class="pagination">';
            // $config['full_tag_close'] = '</div>';

            //trang kế tiếp 
            $config['next_link'] =  'Next »';

            // trang  trước đó
            $config['prev_link'] =  '« Prev';
            
            //Khởi tạo phân trang 
            $this->pagination->initialize($config);
                 
            // build paging links, Tạo link phân trang
            $params["links"] = $this->pagination->create_links();
        }
        //đẩy dữ liệu vào view
        $this->load->view('Pagination/user_listing', $params);
    }
}