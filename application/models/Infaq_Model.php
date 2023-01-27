<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq_Model extends CI_Model
{
    public function all_infaq($keyword = null)
    {
        if ($keyword){
            $this->db->like('nama_infaq', $keyword);
            $this->db->or_like('tanggal', $keyword);
        }
        $this->db->limit('20');
        $query = $this->db->get('infaq');
        return $query->result();
    }
    public function create_infaq($data)
    {
        $this->db->insert('infaq', $data);
    }

    public function view_edit($id)
    {
        return $this->db->get_where('infaq', ['id' => $id])->row_array();
    }

    public function update_aksi_infaq($data)
    {
        $this->db->where('id', $this->input->post('id'));
		$this->db->update('infaq', $data);
    }

    public function delete_infaq($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('infaq');
    }   
    
    public function get_count()
    {
        $this->db->select('COUNT(nama_admin) as total');
        $this->db->from('infaq');
        $query = $this->db->get();
        return $query->result();
    }

    function get_infaq(){
        return $this->db->query("SELECT SUM(total) as total_infaq FROM infaq");
    }

}