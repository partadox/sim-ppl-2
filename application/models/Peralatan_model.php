<?php

class Peralatan_model extends CI_Model
{
    public function getAllPeralatan()
    {
        $query = "SELECT peralatan.*, peralatan_ktg.kategori FROM peralatan INNER JOIN peralatan_ktg ON peralatan.kategori_id = peralatan_ktg.id ";
        return $this->db->query($query)->result_array();
    }

    public function TambahPeralatan($data)
    {
        $this->db->insert('peralatan', $data);
    }

    public function hapusDataPeralatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peralatan');
    }

    public function edit_peralatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('peralatan', $data);
        return true;
    }
}
