<?php

class Logbook_model extends CI_Model
{
    public function getAllLogbook()
    {
        $query = "SELECT facility_logbook.*,  user.name, status.status FROM facility_logbook INNER JOIN user ON facility_logbook.nama_petugas = user.id INNER JOIN status ON facility_logbook.status_id = status.id";
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

    public function TambahLogbook($data)
    {
        $this->db->insert('facility_logbook', $data);
    }

    public function hapusDataLogbook($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('facility_logbook');
    }

    public function edit_perawatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('perawatan', $data);
        return true;
    }
}
