<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jamaah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Jamaah_Model');

        if(!$this->session->userdata("user_nama")){
			redirect("login");
		}

    }
    public function index()
	{
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
        }else{
            $data['keyword'] = null;
        }
        $title['judul'] = "Jamaah";
        $data['jamaah'] = $this->Jamaah_Model->all_jamaah($data['keyword']);
        $data['name'] =  "Tambah Jamaah";
		$this->load->view("template/header", $title);
		$this->load->view("admin/jamaah", $data);
		$this->load->view("template/footer");
    }

    public function tambah_jamaah()
    {
        $this->form_validation->set_rules('nama','Nama','required');

        if($this->form_validation->run() ){
            $data = [
                "nama"=> $this->input->post('nama', true),
                "status"=> $this->input->post('status', true),
                "jenis_kelamin"=> $this->input->post('gender', true),
                "kelas"=> $this->input->post('kelas', true),
                "jurusan"=> $this->input->post('jurusan', true)
            ];

            $this->Jamaah_Model->create_jamaah($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jamaah');
        }
    }

    public function update_jamaah()
    {
        $this->form_validation->set_rules('nama','Nama','required');

        if($this->form_validation->run() ){
            $data = [
                "nama"=> $this->input->post('nama', true),
                "status"=> $this->input->post('status', true),
                "jenis_kelamin"=> $this->input->post('gender', true),
                "kelas"=> $this->input->post('kelas', true),
                "jurusan"=> $this->input->post('jurusan', true)
            ];
            $this->Jamaah_Model->update_aksi_jamaah($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('jamaah');
        }
    }

    public function edit_jamaah()
    {
            echo json_encode($this->Jamaah_Model->view_edit($_GET['id']));
    }

    public function hapus_jamaah()
    {
        $this->form_validation->set_rules('id','id','required');

        if($this->form_validation->run() ){
            $this->Jamaah_Model->delete_jamaah($_POST['id']);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
    }

    public function cetak()
    {
        $title['judul'] = "Cetak Jamaah";
        $data['jamaah'] = $this->Jamaah_Model->all_jamaah();
        $this->load->view("cetak/header-cetak", $title); 
        $this->load->view("cetak/jamaah", $data); 
        $this->load->view("cetak/footer-cetak"); 
        
        
    }

}