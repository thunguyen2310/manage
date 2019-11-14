<?php
 
class Export extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Export_M', 'export');
    }    
 
    public function index() {
        $this->data['export_list'] = $this->export->exportList();
        $this->load->view('Excel/export',$this->data);

    }
    // create xlsx
    public function generateXls() {

        require_once APPPATH . "third_party/Classes/PHPExcel.php";
        set_time_limit(0);
        ini_set('memory_limit', '1G');
        $objExcel = new PHPExcel;
        $objExcel->createSheet();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('minhthu');
        $listInfo = $this->export->exportList();
           
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'USER');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'FULL NAME');
        $sheet->setCellValue('E1', 'ADDRESS');
        $sheet->setCellValue('F1', 'PHONE');
        $sheet->setCellValue('G1', 'PASS');

        $numRow = 1;
        foreach ($listInfo as $list) {
            $numRow++;
            $sheet->setCellValue("A$numRow", $list['Id_Pa']);
            $sheet->setCellValue("B$numRow", $list['User_Pa']);
            $sheet->setCellValue("C$numRow", $list['Email_Pa']);
            $sheet->setCellValue("D$numRow", $list['Fullname_Pa']);
            $sheet->setCellValue("E$numRow", $list['Address_Pa']);
            $sheet->setCellValue("F$numRow", $list['Phone_Pa']);
            $sheet->setCellValue("G$numRow", $list['Pass_Pa']);
        }

       //chỉ đến đường dẫn  
       $date_export = date('YmdHis');
       $name_file= 'minhthu'.$date_export.'.xlsx';
       PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007')->save($name_file);
       $filePath = $name_file;
       if(file_exists($filePath)){
           ob_clean();
           header("Cache-Control: no-store");
           header("Expires: 0");
           header('Content-Type: application/xlsx');
           header("Cache-Control: public");
           header('Content-Disposition: attachment; filename="'.$name_file.'"');
           header("Content-Transfer-Encoding: binary");
           header('Accept-Ranges: bytes');
           readfile($filePath);
       } else {
           echo 'Tệp không tồn tại';
       }
 
    }
     
}
?>