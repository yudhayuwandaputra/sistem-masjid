<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function all_jamaah()
    {
        $this->db->select('*');
        $this->db->from('jamaah');
        $this->db->order_by('id', 'ASC');
        $this->db->limit('32');
        $query = $this->db->get();
        return $query->result();
    }
}