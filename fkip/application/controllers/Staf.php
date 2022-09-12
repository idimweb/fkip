<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // load model
        login_access();
        hak_akses();
        // $this->load->model('Lainya_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Staf_model', 'import');
        $this->load->model('Staf_model');
        $this->load->helper(array('url','html','form'));

    }

    public function index() {
      $x['judul'] = 'Data : staf';
      $this->template->load('template','staf/staf',$x);
    }

    public function json() {
     header('Content-Type: application/json');
     echo $this->Staf_model->json();
   }

    public function add(){
      $this->importFile();
    }

    public function importFile(){

      if ($this->input->post('submit')) {

                $path = 'assets/uploads/';
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
                      $inserdata[$i]['nama_staf'] = $value['A'];
                      // $inserdata[$i]['last_name'] = $value['B'];
                      // $inserdata[$i]['email'] = $value['C'];
                      // $inserdata[$i]['contact_no'] = $value['D'];
                      $i++;
                    }
                    $result = $this->Staf_model->insertori($inserdata);
                    if($result){
                      echo "Imported successfully";
                    }else{
                      echo "ERROR !";
                    }

              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  echo $error['error'];
                }


        }
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
        redirect(site_url('staf'));
        // $this->load->view('import');
    }

    public function tambah()
    {
      $data = array(
        'judul'=>'Tambah Anggota',
        'button' => 'Create',
        'action' => site_url('staf/tambah_data'),
        'id_staf' => set_value('id_staf'),
        'nama_staf' => set_value('nama_staf'),


      );
      $this->template->load('template','staf/staf_form', $data);
    }

    public function tambah_data()
    {
        $data = array(
          'id_staf' => $this->input->post('id_staf',TRUE),
          'nama_staf' => $this->input->post('nama_staf',TRUE),


        );

        $this->Staf_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
        redirect(site_url('staf'));
        }


    public function edit($id)
    {
      $row = $this->Staf_model->get_by_id($id);

      if ($row) {
        $data = array(
          'judul'=>'Data Anggota',
          'button' => 'Update',
          'action' => site_url('staf/edit_data'),
          'id_staf' => set_value('id_staf', $row->id_staf),
          'nama_staf' => set_value('nama_staf', $row->nama_staf),
        );
        $this->template->load('template','staf/staf_form', $data);
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
        redirect(site_url('staf'));
      }
    }

    public function edit_data()
    {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
        $this->edit($this->input->post('id_staf', TRUE));
      } else {
          $data = array(
           // 'id_staf' => $this->input->post('id_staf',TRUE),
           'nama_staf' => $this->input->post('nama_staf',TRUE),

        );

        $this->Staf_model->update($this->input->post('id_staf', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data  Anggota Berhasil.</div>');
        redirect(site_url('staf'));
    }
  }

  public function hapus($id)
  {
      $row = $this->Staf_model->get_by_id($id);

      if ($row) {
          $this->Staf_model->delete($id);
          $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
          redirect(site_url('staf'));
      } else {
          $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
          redirect(site_url('staf'));
      }
  }

    public function _rules()
    {
     $this->form_validation->set_rules('nama_staf', 'nama_staf', 'trim|required');

     $this->form_validation->set_rules('id_staf', 'id_staf', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }


}
?>
