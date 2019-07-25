<?php

class Performa_Lampu_model extends CI_Model
{
    public function operasi()
    {
        $query = "SELECT operasi FROM performa_lampu ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function no_operasi()
    {
        $query = "SELECT no_operasi FROM performa_lampu ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function tanggal()
    {
        $query = "SELECT tanggal FROM performa_lampu ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function keop()
    {
        $query = "SELECT ket_operasi FROM performa_lampu ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function kenop()
    {
        $query = "SELECT ket_no_operasi FROM performa_lampu ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function tambah($data)
    {
        $this->db->insert('performa_lampu', $data);
    }

    public function getAll()
    {
        $query = "SELECT * FROM performa_lampu ORDER BY id DESC";
        return $this->db->query($query)->result_array();
    }
}
