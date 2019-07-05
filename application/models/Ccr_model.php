<?php

class Ccr_model extends CI_Model
{
    public function getAllCcr()
    {
        $query = "SELECT mr_ccr.*,  user.name, peralatan.nama FROM mr_ccr INNER JOIN user ON mr_ccr.nama_petugas = user.id INNER JOIN peralatan ON mr_ccr.nama_ccr = peralatan.id";
        return $this->db->query($query)->result_array();
    }

    public function OptionAlat()
    {
        $query = "SELECT * FROM peralatan WHERE kategori_id='1'";
        return $this->db->query($query)->result_array();
    }

    public function OptionPetugas()
    {
        $query = "SELECT * FROM user ";
        return $this->db->query($query)->result_array();
    }

    public function TambahCcr($data)
    {
        $this->db->insert('mr_ccr', $data);
    }

    public function hapusDataCcr($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mr_ccr');
    }

    public function edit_perawatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('perawatan', $data);
        return true;
    }
}
