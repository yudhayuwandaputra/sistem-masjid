<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakat_Model extends CI_Model
{
    public function all_zakat($keyword = null)
    {
        if ($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('tanggal_zakat', $keyword);
        }
        $this->db->limit('32');
        $this->db->select('id_zakat, nama, tanggal_zakat, berat, nominal');
        $this->db->from('zakat_fitrah');
        $this->db->join('jamaah', 'jamaah.nama = zakat_fitrah.nama_jamaah');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_edit($id)
    {
        $this->db->select('*');
        $this->db->from('zakat_fitrah');
        $this->db->join('jamaah', 'jamaah.nama = zakat_fitrah.nama_jamaah');
        $this->db->where('zakat_fitrah.id_zakat', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function create_zakat($data)
    {
        $this->db->insert('zakat_fitrah', $data);
    }

    public function update_aksi_zakat($data)
    {
        $this->db->where('id_zakat', $this->input->post('id'));
		$this->db->update('zakat_fitrah', $data);
    }

    public function delete_zakat($id)
    {
        $this->db->where('id_zakat',$id);
        $this->db->delete('zakat_fitrah');
    }

    public function get_count()
    {
        $this->db->select('COUNT(nama_jamaah) as total');
        $this->db->from('zakat_fitrah');
        $query = $this->db->get();
        return $query->result();
    }
    function get_zakat(){
        return $this->db->query("SELECT SUM(berat) as jumlah_berat,SUM(nominal) as jumlah_nominal FROM zakat_fitrah");
    }
}