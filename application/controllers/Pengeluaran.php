<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pengeluaran_Model');
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
        $title['judul'] = "Pengeluaran";
        $data['pengeluaran']= $this->Pengeluaran_Model->all_pengeluaran($data['keyword']);
		$this->load->view("template/header", $title);
		$this->load->view("admin/pengeluaran", $data);
		$this->load->view("template/footer");
    }

    public function update_pengeluaran()
    {
        $this->form_validation->set_rules('nama_pengeluaran','Pengeluaran','required');

        if($this->form_validation->run() ){
            $data = [
                "nama_pengeluaran"=> $this->input->post('nama_pengeluaran', true),
                "nama_admin"=> $this->input->post('nama_admin', true),
                "tanggal"=> $this->input->post('tanggal', true),
                "total_pengeluaran"=> $this->input->post('total_pengeluaran', true),
                "sisa_saldo"=> $this->input->post('sisa_saldo', true),
                "keterangan"=> $this->input->post('keterangan', true)
            ];

            $this->Pengeluaran_Model->update_aksi_pengeluaran($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pengeluaran');
        }
    }

    public function edit_pengeluaran()
    {
            echo json_encode($this->Pengeluaran_Model->view_edit($_GET['id']));
    }


    public function tambah_pengeluaran()
    {
        $this->form_validation->set_rules('nama_pengeluaran','Peengeluaran','required');

        if($this->form_validation->run() ){
            $data = [
                "nama_pengeluaran"=> $this->input->post('nama_pengeluaran', true),
                "nama_admin"=> $this->input->post('nama_admin', true),
                "tanggal"=> $this->input->post('tanggal', true),
                "total_pengeluaran"=> $this->input->post('total_pengeluaran', true),
                "sisa_saldo"=> $this->input->post('sisa_saldo', true),
                "keterangan"=> $this->input->post('keterangan', true)
            ];

            $this->Pengeluaran_Model->create_pengeluaran($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pengeluaran');
        }
    }

    public function hapus_pengeluaran()
    {
        $this->form_validation->set_rules('id','id','required');

        if($this->form_validation->run() ){
            $this->Pengeluaran_Model->delete_pengeluaran($_POST['id']);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
    }

    public function cetak()
    {
        $title['judul'] = "Cetak Pengeluaran";
        $data['pengeluaran'] = $this->Pengeluaran_Model->all_pengeluaran();
        $this->load->view("cetak/header-cetak", $title); 
        $this->load->view("cetak/pengeluaran", $data); 
        $this->load->view("cetak/footer-cetak"); 
        
        
    }
    
}