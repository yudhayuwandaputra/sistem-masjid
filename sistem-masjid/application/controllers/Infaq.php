<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Infaq_Model');
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
        $title['judul'] = "Infaq";
        $data['infaq']= $this->Infaq_Model->all_infaq($data['keyword']);
        $data['jumlah_mufaqi'] = $this->Infaq_Model->get_count();
		$this->load->view("template/header", $title);
		$this->load->view("admin/infaq", $data);
		$this->load->view("template/footer");
    }

    public function tambah_infaq()
    {
        $this->form_validation->set_rules('nama_admin','Nama','required');

        if($this->form_validation->run() ){
            $data = [
                "nama_admin"=> $this->input->post('nama_admin', true),
                "nama_infaq"=> $this->input->post('nama_infaq', true),
                "tanggal"=> $this->input->post('tanggal', true),
                "total"=> $this->input->post('total', true),
                "keterangan"=> $this->input->post('keterangan', true)
            ];

            $this->Infaq_Model->create_infaq($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('infaq');
        }
    }

    public function update_infaq()
    {
        $this->form_validation->set_rules('nama_admin','Nama','required');

        if($this->form_validation->run() ){

            $data = [
                "nama_admin"=> $this->input->post('nama_admin', true),
                "nama_infaq"=> $this->input->post('nama_infaq', true),
                "tanggal"=> $this->input->post('tanggal', true),
                "total"=> $this->input->post('total', true),
                "keterangan"=> $this->input->post('keterangan', true)
            ];

            $this->Infaq_Model->update_aksi_infaq($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('infaq');
        }
    }

    public function edit_infaq()
    {
            echo json_encode($this->Infaq_Model->view_edit($_GET['id']));
    }

    public function hapus_infaq()
    {
        $this->form_validation->set_rules('id','id','required');

        if($this->form_validation->run() ){
            $this->Infaq_Model->delete_infaq($_POST['id']);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
    }

    public function cetak()
    {
        $title['judul'] = "Cetak Infaq";
        $data['infaq'] = $this->Infaq_Model->all_infaq();
        $data['jumlah_mufaqi'] = $this->Infaq_Model->get_count();
        $this->load->view("cetak/header-cetak", $title); 
        $this->load->view("cetak/infaq", $data); 
        $this->load->view("cetak/footer-cetak"); 
        
        
    }
    
}