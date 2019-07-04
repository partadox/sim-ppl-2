<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Peralatan_model');
        $this->load->model('Perawatan_model');
        $this->load->library('form_validation');
        $this->load->library('javascript');
    }

    public function index()
    {
        $data['role_name_sidebar'] = 'Pemeriksa';
        $data['sidebar_dashboard']   = 'nav-item active';

        $data['title'] = 'Selamat Datang Pemeriksa di Dashboard SIM-PPL Bandar Udara Budiarto Tangerang';

        $data['sidebar_perawatan']            = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']                  = 'nav-item';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

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

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan - SIM PPL Bandar Udara Budiarto Tangerang';
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

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Harian - SIM PPL Bandar Udara Budiarto Tangerang';
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

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Mingguan - SIM PPL Bandar Udara Budiarto Tangerang';
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

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Perawatan Bulanan - SIM PPL Bandar Udara Budiarto Tangerang';
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

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item active';

        $data['title'] = 'Standart Operasional - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar3', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sop');
        $this->load->view('templates/footer');
    }
}
