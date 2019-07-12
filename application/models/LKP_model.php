<?php

class LKP_model extends CI_Model
{
    public function getAllLKP()
    {
        $query = "SELECT laporan_kerusakan.*,  user.name, status.status FROM laporan_kerusakan INNER JOIN user ON laporan_kerusakan.nama_petugas = user.id INNER JOIN status ON laporan_kerusakan.status_id = status.id";
        return $this->db->query($query)->result_array();
    }

    public function OptionAlat()
    {
        $query = "SELECT * FROM peralatan";
        return $this->db->query($query)->result_array();
    }

    public function OptionPetugas()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }

    public function TambahLKP($data)
    {
        $this->db->insert('laporan_kerusakan', $data);
    }

    public function hapusDataLKP($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_kerusakan');
    }

    public function acc_lkp($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('laporan_kerusakan', $data);
        return true;
    }
}
