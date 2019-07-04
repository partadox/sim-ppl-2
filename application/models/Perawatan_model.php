<?php

class Perawatan_model extends CI_Model
{
    public function getAllPerawatan()
    {
        $query = "SELECT perawatan.*, peralatan.nama, user.name, status.status FROM perawatan INNER JOIN peralatan ON perawatan.nama_alat = peralatan.id INNER JOIN user ON perawatan.nama_petugas = user.id INNER JOIN status ON perawatan.status_id = status.id";
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

    public function TambahPerawatan($data)
    {
        $this->db->insert('perawatan', $data);
    }

    public function hapusDataPerawatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('perawatan');
    }

    public function edit_perawatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('perawatan', $data);
        return true;
    }
}
