<?php

class Ups_model extends CI_Model
{
    public function getAllUps()
    {
        $query = "SELECT mr_ups.*,  user.name, peralatan.nama FROM mr_ups INNER JOIN user ON mr_ups.nama_petugas = user.id INNER JOIN peralatan ON mr_ups.nama_ups = peralatan.id";
        return $this->db->query($query)->result_array();
    }

    public function OptionAlat()
    {
        $query = "SELECT * FROM peralatan WHERE kategori_id='1' ORDER BY peralatan.nama ASC";
        return $this->db->query($query)->result_array();
    }

    public function OptionPetugas()
    {
        $query = "SELECT * FROM user ";
        return $this->db->query($query)->result_array();
    }

    public function TambahUps($data)
    {
        $this->db->insert('mr_ups', $data);
    }

    public function hapusDataUps($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mr_ups');
    }

    public function edit_perawatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('perawatan', $data);
        return true;
    }
}
