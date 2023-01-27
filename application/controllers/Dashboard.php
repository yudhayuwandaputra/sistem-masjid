<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
		$this->load->model('admin');
		$this->load->model('Jamaah_Model');
		$this->load->model('Infaq_Model');
		$this->load->model('Pengeluaran_Model');
		$this->load->model('Zakat_Model');
		if(!$this->session->userdata('user_nama')){
			redirect("login");
		}
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			if($this->input->post('submit')){
                $data['keyword'] = $this->input->post('keyword');
            }else{
                $data['keyword'] = null;
            }
			$title['judul'] = "Dashboard";
			$data['zakat_jamaah'] = $this->Zakat_Model->all_zakat($data['keyword']);
			$data['zakat']=$this->Zakat_Model->get_zakat()->result();
			$data['pengeluaran']=$this->Pengeluaran_Model->get_pengeluaran()->result();
			$data['infaq']=$this->Infaq_Model->get_infaq()->result();
			$data['jumlah'] = $this->Jamaah_Model->get_count();
			$data['jumlah_muzaki'] = $this->Zakat_Model->get_count();
            $this->load->view("template/header", $title);	
            $this->load->view("admin/dashboard",$data);
            $this->load->view("template/footer");			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}

}