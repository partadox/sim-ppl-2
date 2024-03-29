<?php

class Dashboard_model extends CI_Model
{
    public function countPetugas()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->num_rows();
    }

    public function countPeralatan()
    {
        $query = "SELECT * FROM peralatan";
        return $this->db->query($query)->num_rows();
    }

    public function countSkcadang()
    {
        $query = "SELECT * FROM skcadang";
        return $this->db->query($query)->num_rows();
    }

    public function countSkcadang_keluar()
    {
        $query = "SELECT * FROM skcadang_keluar";
        return $this->db->query($query)->num_rows();
    }

    public function countPerawatan()
    {
        $query = "SELECT * FROM perawatan";
        return $this->db->query($query)->num_rows();
    }

    public function countPerawatanPemeriksaBelum()
    {
        $query = "SELECT * FROM perawatan WHERE status_id = '1'";
        return $this->db->query($query)->num_rows();
    }

    public function countPerawatanPemeriksaSudah()
    {
        $query = "SELECT * FROM perawatan WHERE status_id = '2'";
        return $this->db->query($query)->num_rows();
    }

    public function countfl()
    {
        $query = "SELECT * FROM facility_logbook";
        return $this->db->query($query)->num_rows();
    }

    public function countflPemeriksaBelum()
    {
        $query = "SELECT * FROM facility_logbook WHERE status_id = '1'";
        return $this->db->query($query)->num_rows();
    }

    public function countflPemeriksaSudah()
    {
        $query = "SELECT * FROM facility_logbook WHERE status_id = '2'";
        return $this->db->query($query)->num_rows();
    }

    public function countlkp()
    {
        $query = "SELECT * FROM laporan_kerusakan";
        return $this->db->query($query)->num_rows();
    }

    public function countlkpPemeriksaBelum()
    {
        $query = "SELECT * FROM laporan_kerusakan WHERE status_id = '1'";
        return $this->db->query($query)->num_rows();
    }

    public function countlkpPemeriksaSudah()
    {
        $query = "SELECT * FROM laporan_kerusakan WHERE status_id = '2'";
        return $this->db->query($query)->num_rows();
    }

    public function countccr()
    {
        $query = "SELECT * FROM mr_ccr";
        return $this->db->query($query)->num_rows();
    }

    public function countups()
    {
        $query = "SELECT * FROM mr_ups";
        return $this->db->query($query)->num_rows();
    }

    public function countgenset()
    {
        $query = "SELECT * FROM mr_genset";
        return $this->db->query($query)->num_rows();
    }
}
