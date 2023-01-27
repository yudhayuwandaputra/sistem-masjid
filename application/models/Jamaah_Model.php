<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jamaah_Model extends CI_Model
{
    public function all_jamaah($keyword = null)
    {
        if ($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('jurusan', $keyword);
        }
        $this->db->limit('32');
        $query = $this->db->get('jamaah');
        return $query->result();
    }

    public function view_edit($id)
    {
        return $this->db->get_where('jamaah', ['id' => $id])->row_array(); 
    }

    public function create_jamaah($data)
    {
        $this->db->insert('jamaah', $data);
    }

    public function update_aksi_jamaah($data)
    {
        $this->db->where('id', $this->input->post('id'));
		$this->db->update('jamaah', $data);
    }

    public function delete_jamaah($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('jamaah');
    }
    public function get_count()
    {
        $this->db->select('COUNT(nama) as total');
        $this->db->from('jamaah');
        $query = $this->db->get();
        return $query->result();
    }
}

