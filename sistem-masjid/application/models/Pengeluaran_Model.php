<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_Model extends CI_Model
{
    public function all_pengeluaran($keyword = null)
    {
        if ($keyword){
            $this->db->like('nama_pengeluaran', $keyword);
            $this->db->or_like('tanggal', $keyword);
        }
        $this->db->limit('32');
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->order_by('id', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function create_pengeluaran($data)
    {
        $this->db->insert('pengeluaran', $data);
    }
    public function view_edit($id)
    {
        return $this->db->get_where('pengeluaran', ['id' => $id])->row_array(); 
    }

    
    public function update_aksi_pengeluaran($data)
    {
        $this->db->where('id', $this->input->post('id'));
		$this->db->update('pengeluaran', $data);
    }

    public function delete_pengeluaran($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pengeluaran');
    }
    function get_pengeluaran(){
        return $this->db->query("SELECT SUM(total_pengeluaran) as jumlah_pengeluaran FROM pengeluaran");
    }       
}