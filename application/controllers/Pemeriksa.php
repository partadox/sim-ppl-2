<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Dashboard_model');
        $this->load->model('Peralatan_model');
        $this->load->model('Skcadang_model');
        $this->load->model('Perawatan_model');
        $this->load->model('Logbook_model');
        $this->load->model('LKP_model');
        $this->load->model('Ccr_model');
        $this->load->model('Ups_model');
        $this->load->model('Genset_model');
        $this->load->model('Performa_Lampu_model');
        $this->load->library('form_validation');
        $this->load->library('javascript');
    }

    public function index()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';
        $data['sidebar_dashboard']   = 'nav-item active';

        $data['title'] = 'Selamat Datang Pemeriksa di Dashboard SIM-PPL Bandar Udara Budiarto Curug';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']                  = 'nav-item';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan_belum'] = $this->Dashboard_model->countPerawatanPemeriksaBelum();
        $data['perawatan_sudah'] = $this->Dashboard_model->countPerawatanPemeriksaSudah();
        $data['fl_belum'] = $this->Dashboard_model->countflPemeriksaBelum();
        $data['fl_sudah'] = $this->Dashboard_model->countflPemeriksaSudah();
        $data['lkp_belum'] = $this->Dashboard_model->countlkpPemeriksaBelum();
        $data['lkp_sudah'] = $this->Dashboard_model->countlkpPemeriksaSudah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item active';
        $data['sidebar_perawatan_collapse']   = 'collapse show';
        $data['sidebar_perawatan_semua']      = 'collapse-item active';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_perawatan', $data);
        $this->load->view('templates/footer');
    }

    public function disetujui()
    {
        $id = $this->input->post('id');
        $data = array(
      'pemeriksa'=> $this->input->post('accpemeriksa'),
      'status_id'=>  $this->input->post('accstatus_id'),
      'tanggal_periksa'=> $this->input->post('acctanggal_periksa')
      );

        $this->Perawatan_model->edit_perawatan($data, $id);
        $this->session->set_flashdata('pesan_perawatan', 'Data Sudah Diperiksa!');
        $this->data_perawatan();
    }


    public function data_perawatan_harian()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item active';
        $data['sidebar_perawatan_collapse']   = 'collapse show';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item active';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Harian - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_perawatan_harian', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_mingguan()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item active';
        $data['sidebar_perawatan_collapse']   = 'collapse show';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item active';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Mingguan - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_perawatan_mingguan', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_bulanan()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item active';
        $data['sidebar_perawatan_collapse']   = 'collapse show';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item active';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Bulanan - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_perawatan_bulanan', $data);
        $this->load->view('templates/footer');
    }

    public function data_facility_logbook()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item active';
        $data['sidebar_fl_collapse']          = 'collapse show';
        $data['sidebar_fl_data']              = 'collapse-item active';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Facility Logbook - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['logbook'] = $this->Logbook_model->getAllLogbook();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_facility_logbook', $data);
        $this->load->view('templates/footer');
    }

    public function disetujui_facility_logbook()
    {
        $id = $this->input->post('id');
        $data = array(
      'nama_pemeriksa'=> $this->input->post('accpemeriksa'),
      'status_id'=>  $this->input->post('accstatus_id'),
      'waktu_periksa'=> $this->input->post('acctanggal_periksa')
      );

        $this->Logbook_model->acc_fl($data, $id);
        $this->session->set_flashdata('pesan_logbook', 'Data Sudah Diperiksa!');
        $this->data_facility_logbook();
    }

    public function data_facility_logbook_print()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item active';
        $data['sidebar_fl_collapse']          = 'collapse show';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item active';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Facility Logbook Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['logbook'] = $this->Logbook_model->getAllLogbook();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_facility_logbook_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_laporan_kerusakan()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item active';
        $data['sidebar_lkp_collapse']         = 'collapse show';
        $data['sidebar_lkp_data']             = 'collapse-item active';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Laporan Kerusakan dan Perbaikan - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_kerusakan'] = $this->LKP_model->getAllLKP();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_laporan_kerusakan', $data);
        $this->load->view('templates/footer');
    }

    public function disetujui_laporan_kerusakan()
    {
        $id = $this->input->post('id');
        $data = array(
      'nama_pemeriksa'=> $this->input->post('accpemeriksa'),
      'status_id'=>  $this->input->post('accstatus_id'),
      'tanggal_periksa'=> $this->input->post('acctanggal_periksa')
      );

        $this->LKP_model->acc_lkp($data, $id);
        $this->session->set_flashdata('pesan_lkp', 'Data Sudah Diperiksa!');
        $this->data_laporan_kerusakan();
    }

    public function data_laporan_kerusakan_print()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item active';
        $data['sidebar_lkp_collapse']         = 'collapse show';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item active';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Laporan Kerusakan Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_kerusakan'] = $this->LKP_model->getAllLKP();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_laporan_kerusakan_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ccr()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item active';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading CCR - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_ccr'] = $this->Ccr_model->getAllCcr();
        $data['option_alat'] = $this->Ccr_model->OptionAlat();
        $data['option_petugas'] = $this->Ccr_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_ccr', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ccr_print()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item active';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading CCR Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_ccr'] = $this->Ccr_model->getAllCcr();
        $data['option_alat'] = $this->Ccr_model->OptionAlat();
        $data['option_petugas'] = $this->Ccr_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_ccr_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ups()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item active';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading UPS - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_ups'] = $this->Ups_model->getAllUps();
        $data['option_alat'] = $this->Ups_model->OptionAlat();
        $data['option_petugas'] = $this->Ups_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_ups', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ups_print()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item active';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading UPS Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_ups'] = $this->Ups_model->getAllUps();
        $data['option_alat'] = $this->Ups_model->OptionAlat();
        $data['option_petugas'] = $this->Ups_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_ups_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_genset()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item active';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading Genset - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_genset'] = $this->Genset_model->getAllGenset();
        $data['option_alat'] = $this->Genset_model->OptionAlat();
        $data['option_petugas'] = $this->Genset_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_genset', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_genset_print()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item active';
        $data['sidebar_mr_collapse']      = 'collapse show';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item active';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Meter Reading Genset Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_genset'] = $this->Genset_model->getAllGenset();
        $data['option_alat'] = $this->Genset_model->OptionAlat();
        $data['option_petugas'] = $this->Genset_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/data_mr_genset_print', $data);
        $this->load->view('templates/footer');
    }

    public function performa_lampu()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item active';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item';


        $data['title'] = 'Performa Lampu Runway - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['operasi'] =$this->Performa_Lampu_model->Operasi();
        $data['keop'] =$this->Performa_Lampu_model->ket_operasi();
        $data['kenop'] =$this->Performa_Lampu_model->ket_noperasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/performa_lampu', $data);
        $this->load->view('templates/footer');
    }

    public function performa_lampu_op()
    {
        $jumlah     = $this->input->post('operasi');
        $keterangan =  $this->input->post('ket_operasi');


        $this->Performa_Lampu_model->edit_op($jumlah, $keterangan);
        $this->performa_lampu();
    }

    public function performa_lampu_nop()
    {
        $jumlah     = $this->input->post('no_operasi');
        $keterangan =  $this->input->post('ket_no_operasi');


        $this->Performa_Lampu_model->edit_nop($jumlah, $keterangan);
        $this->performa_lampu();
    }

    public function gambar_installasi()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item active';

        $data['sidebar_sop']         = 'nav-item';


        $data['title'] = 'Gambar Installasi - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/gambar_installasi');
        $this->load->view('templates/footer');
    }

    public function sop()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']               = 'nav-item';
        $data['sidebar_mr_collapse']      = 'collapse';
        $data['sidebar_mr_ccr']           = 'collapse-item';
        $data['sidebar_mr_ccr_print']     = 'collapse-item';
        $data['sidebar_mr_ups']           = 'collapse-item';
        $data['sidebar_mr_ups_print']     = 'collapse-item';
        $data['sidebar_mr_genset']        = 'collapse-item';
        $data['sidebar_mr_genset_print']  = 'collapse-item';

        $data['sidebar_performa_lampu']  = 'nav-item';
        $data['sidebar_gambar']          = 'nav-item';

        $data['sidebar_sop']         = 'nav-item active';

        $data['title'] = 'Standart Operasional - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sop');
        $this->load->view('templates/footer');
    }
}
