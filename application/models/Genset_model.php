<?php

class Genset_model extends CI_Model
{
    public function getAllGenset()
    {
        $query = "SELECT mr_genset.*,  user.name, peralatan.nama FROM mr_genset INNER JOIN user ON mr_genset.nama_petugas = user.id INNER JOIN peralatan ON mr_genset.nama_genset = peralatan.id";
        return $this->db->query($query)->result_array();
    }

    public function OptionAlat()
    {
        $query = "SELECT * FROM peralatan WHERE kategori_id='2' ORDER BY peralatan.nama ASC";
        return $this->db->query($query)->result_array();
    }

    public function OptionPetugas()
    {
        $query = "SELECT * FROM user ";
        return $this->db->query($query)->result_array();
    }

    public function TambahGenset($data)
    {
        $this->db->insert('mr_genset', $data);
    }

    public function hapusDataGenset($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mr_genset');
    }

    public function edit_perawatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('perawatan', $data);
        return true;
    }
}
