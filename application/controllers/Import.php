<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // load model
        // login_access();
        // hak_akses();
        // $this->load->model('Lainya_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Import_model', 'import');
        $this->load->model('Import_model');
        $this->load->model('Anggota_model');
        $this->load->helper(array('url','html','form'));

    }

    public function index() {
      $x['judul'] = 'Data : import';
      $x['data_anggota'] = $this->db->get('anggota')->result();
      $this->template->load('template','import/import',$x);
    }

    public function json() {
     header('Content-Type: application/json');
     echo $this->Import_model->json();
   }
   public function hapus($id)
   {
       $row = $this->Import_model->get_by_id($id);

       if ($row) {
           $this->Import_model->delete($id);
           $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
           redirect(site_url('import'));
       } else {
           $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
           redirect(site_url('import'));
       }
   }

    public function add(){
      $this->importFile();
    }

    public function importFile(){

      if ($this->input->post('submit')) {

                $path = 'assets/uploads/excel/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
                      $inserdata[$i]['nama'] = $value['A'];
                      $inserdata[$i]['jabatan'] = $value['B'];
                      $inserdata[$i]['prodi'] = $value['C'];
                      $inserdata[$i]['email'] = $value['D'];
                      $i++;
                    }
                    $result = $this->Anggota_model->insertori($inserdata);
                    if($result){
                      echo "Imported successfully";
                      unlink($import_xls_file);
      }else{
                      echo "ERROR !";
                    }

              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  echo $error['error'];
                  $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Belum Di Tambahkan.</div>');
                redirect(site_url('anggota'));
                }
                

        }
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
        
        redirect(site_url('anggota'));
        // $this->load->view('import');
    }

}
?>
