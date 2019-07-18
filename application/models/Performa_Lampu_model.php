<?php

class Performa_Lampu_model extends CI_Model
{
    public function Operasi()
    {
        $query = "SELECT status, jumlah FROM performa_lampu";
        return $this->db->query($query)->result_array();
    }

    public function ket_operasi()
    {
        $query = "SELECT keterangan FROM performa_lampu WHERE id ='1'";
        return $this->db->query($query)->row_array();
    }

    public function ket_noperasi()
    {
        $query = "SELECT keterangan FROM performa_lampu WHERE id ='2'";
        return $this->db->query($query)->row_array();
    }

    public function NoOperasi()
    {
        $query = "SELECT no_operasi FROM performa_lampu WHERE id = (SELECT MAX(id) FROM performa_lampu)";
        return $this->db->query($query)->result();
    }

    public function Today()
    {
        $query = "SELECT tanggal FROM performa_lampu WHERE id = (SELECT MAX(id) FROM performa_lampu)";
        return $this->db->query($query)->result();
    }

    public function edit_op($jumlah, $keterangan)
    {
        $query = "UPDATE performa_lampu SET jumlah='$jumlah', keterangan='$keterangan' WHERE id='1'";
        return $this->db->query($query);
    }

    public function edit_nop($jumlah, $keterangan)
    {
        $query = "UPDATE performa_lampu SET jumlah='$jumlah', keterangan='$keterangan' WHERE id='2'";
        return $this->db->query($query);
    }
}
