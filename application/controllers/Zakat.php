<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Zakat_Model');
        $this->load->model('Jamaah_Model');
        $this->load->library('form_validation');
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
            $title['judul'] = "Zakat";
            $data['zakat'] = $this->Zakat_Model->all_zakat($data['keyword']);
            $data['jamaah'] = $this->Jamaah_Model->all_jamaah();
            $data['jumlah_muzaki'] = $this->Zakat_Model->get_count();
            $this->load->view("template/header", $title);
            $this->load->view("admin/zakat", $data);
            $this->load->view("template/footer");
    }

    public function tambah_zakat()
    {
        $this->form_validation->set_rules('nama','Nama','required');

        if($this->form_validation->run() ){
            $data = [
                "tanggal_zakat"=> $this->input->post('tanggal', true),
                "nama_jamaah"=> $this->input->post('nama', true),
                "jenis_zakat"=> $this->input->post('zakat', true),
                "berat"=> $this->input->post('beras', true),
                "nominal"=> $this->input->post('uang', true)
            ];
            $this->Zakat_Model->create_zakat($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('zakat');
        }
    }
    public function update_zakat()
    {
        $this->form_validation->set_rules('id','id','required');

        if($this->form_validation->run() ){
            $data = [
                "tanggal_zakat"=> $this->input->post('tanggal', true),
                "id_zakat"=> $this->input->post('id', true),
                "jenis_zakat"=> $this->input->post('zakat', true),
                "berat"=> $this->input->post('beras', true),
                "nominal"=> $this->input->post('uang', true)
            ];
            $this->Zakat_Model->update_aksi_zakat($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('zakat');
        }
    }

    public function edit_zakat()
    {
            echo json_encode($this->Zakat_Model->view_edit($_GET['id']));
    }

    public function hapus_zakat()
    {
        $this->form_validation->set_rules('id','id','required');

        if($this->form_validation->run() ){
            $this->Zakat_Model->delete_zakat($_POST['id']);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
    }

    public function cetak()
    {
        $title['judul'] = "Cetak Zakat";
        $data['jumlah_muzaki'] = $this->Zakat_Model->get_count();
        $data['zakat'] = $this->Zakat_Model->all_zakat();
        $this->load->view("cetak/header-cetak", $title); 
        $this->load->view("cetak/zakat", $data); 
        $this->load->view("cetak/footer-cetak"); 
        
        
    }

    
}