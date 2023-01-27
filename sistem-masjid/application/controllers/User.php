<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Jamaah_Model');
        $this->load->model('Zakat_Model');
        $this->load->model('Infaq_Model');

    }

    public function index()
    {
        
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
        }else{
            $data['keyword'] = null;
        }
        $data['judul'] = "Selamat Datang jamaah";
        $data['zakat']=$this->Zakat_Model->get_zakat()->result();
        $data['infaq']=$this->Infaq_Model->get_infaq()->result();
        $data['jamaah'] = $this->Jamaah_Model->all_jamaah($data['keyword']);
        $this->load->view("template/temp-user", $data);
        $this->load->view("user/dashboard");
        $this->load->view("template/foot-user");
    }
}