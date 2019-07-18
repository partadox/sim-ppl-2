<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
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
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item active';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Selamat Datang Petugas di Dashboard SIM-PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->Dashboard_model->countPetugas();
        $data['peralatan'] = $this->Dashboard_model->countPeralatan();
        $data['skcadang'] = $this->Dashboard_model->countSkcadang();
        $data['skcadang_keluar'] = $this->Dashboard_model->countSkcadang_keluar();
        $data['perawatan'] = $this->Dashboard_model->countPerawatan();
        $data['fl'] = $this->Dashboard_model->countfl();
        $data['lkp'] = $this->Dashboard_model->countlkp();
        $data['ccr'] = $this->Dashboard_model->countccr();
        $data['ups'] = $this->Dashboard_model->countups();
        $data['genset'] = $this->Dashboard_model->countgenset();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_peralatan()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item active';
        $data['sidebar_peralatan_collapse']   = 'collapse show';
        $data['sidebar_peralatan_semua']      = 'collapse-item active';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Peralatan - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['peralatan'] = $this->Peralatan_model->getAllPeralatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_peralatan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_peralatan()
    {
        $this->form_validation->set_rules('add_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('add_nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('add_merk', 'Merk', 'required|trim');
        $this->form_validation->set_rules('add_tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('add_tahun_install', 'TahunInstall', 'required|trim');
        $this->form_validation->set_rules('add_jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('add_kondisi', 'Kondisi', 'required|trim');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run()) {
            $add_kategori = $this->input->post('add_kategori');
            $add_nama = $this->input->post('add_nama');
            $add_merk = $this->input->post('add_merk');
            $add_tipe = $this->input->post('add_tipe');
            $add_tahun_install = $this->input->post('add_tahun_install');
            $add_jumlah = $this->input->post('add_jumlah');
            $add_data_teknis = $this->input->post('add_data_teknis');
            $add_kondisi = $this->input->post('add_kondisi');
            $add_keterangan = $this->input->post('add_keterangan');

            $peralatan_baru = ([
              'nama'=>$add_nama,
              'kategori_id'=>$add_kategori,
              'merk'=>$add_merk,
              'tipe'=>$add_tipe,
              'data_teknis'=>$add_data_teknis,
              'tahun_install'=>$add_tahun_install,
              'jumlah'=>$add_jumlah,
              'kondisi'=>$add_kondisi,
              'keterangan'=>$add_keterangan
            ]);
            $data = array_merge($peralatan_baru);
            if ($this->Peralatan_model->TambahPeralatan($data) == false) {
                $this->session->set_flashdata('pesan', 'Data Peralatan Ditambah!');
                $this->data_peralatan();
            } else {
                $this->data_peralatan();
            }
        } else {
            $this->data_peralatan();
        }
    }

    public function hapus_peralatan($id)
    {
        $this->Peralatan_model->hapusDataPeralatan($id);
        $this->session->set_flashdata('pesan', 'Data Peralatan Berhasil Terhapus!');
        $this->data_peralatan();
    }

    public function edit_peralatan()
    {
        $id = $this->input->post('id');
        $data = array(
          'nama'=>$this->input->post('add_nama'),
          'merk'=>$this->input->post('add_merk'),
          'tipe'=>$this->input->post('add_tipe'),
          'data_teknis'=>$this->input->post('add_data_teknis'),
          'jumlah'=>$this->input->post('add_jumlah'),
          'kondisi'=>$this->input->post('add_kondisi'),
          'keterangan'=>$this->input->post('add_keterangan')
        );

        $this->Peralatan_model->edit_peralatan($data, $id);
        $this->session->set_flashdata('pesan', 'Data Peralatan Berhasil Diubah!');
        $this->data_peralatan();
    }

    public function data_peralatan_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item active';
        $data['sidebar_peralatan_collapse']   = 'collapse show';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item active';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Peralatan Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['peralatan'] = $this->Peralatan_model->getAllPeralatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_peralatan_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_skcadang()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item active';
        $data['sidebar_skcadang_collapse']   = 'collapse show';
        $data['sidebar_skcadang_data']       = 'collapse-item active';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Suku Cadang - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['skcadang'] = $this->Skcadang_model->getAllSkcadang();
        $data['option_skcadang'] = $this->Skcadang_model->OptionSkcadang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_skcadang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_skcadang()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('nama_skcadang', 'Nama_skcadang', 'required|trim');
        $this->form_validation->set_rules('merk', 'Merk', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('daya', 'Daya', 'required|trim');
        $this->form_validation->set_rules('tegangan', 'Tegangan', 'required');
        $this->form_validation->set_rules('arus', 'Arus', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run()) {
            $tanggal = $this->input->post('tanggal');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama_skcadang');
            $merk = $this->input->post('merk');
            $tipe = $this->input->post('tipe');
            $daya = $this->input->post('daya');
            $tegangan = $this->input->post('tegangan');
            $arus = $this->input->post('arus');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');

            $skcadang_baru = ([
              'tanggal_br'=>$tanggal,
              'kode'=>$kode,
              'nama_skcadang'=>$nama,
              'merk'=>$merk,
              'tipe'=>$tipe,
              'daya'=>$daya,
              'tegangan'=>$tegangan,
              'arus'=>$arus,
              'jumlah'=>$jumlah,
              'keterangan'=>$keterangan
            ]);
            $data = array_merge($skcadang_baru);
            if ($this->Skcadang_model->TambahSkcadang($data) == false) {
                $this->session->set_flashdata('pesan_skcadang', 'Data Suku Cadang Ditambah!');
                $this->data_skcadang();
            } else {
                $this->data_skcadang();
            }
        } else {
            $this->data_skcadang();
        }
    }

    public function edit_skcadang()
    {
        $id = $this->input->post('id');
        $data = array(
          'tanggal_br'=>$this->input->post('tanggal_br'),
          'kode'=>$this->input->post('kode'),
          'nama_skcadang'=>$this->input->post('nama_skcadang'),
          'merk'=>$this->input->post('merk'),
          'tipe'=>$this->input->post('tipe'),
          'daya'=>$this->input->post('daya'),
          'tegangan'=>$this->input->post('tegangan'),
          'arus'=>$this->input->post('arus'),
          'jumlah'=>$this->input->post('jumlah'),
          'keterangan'=>$this->input->post('keterangan')
        );

        $this->Skcadang_model->edit_skcadang($data, $id);
        $this->session->set_flashdata('pesan_skcadang', 'Data Suku Cadang Berhasil Diubah!');
        $this->data_skcadang();
    }

    public function ambil_skcadang()
    {
        $ambil_skcadang = array(
        'id_skcadang'   =>$this->input->post('id_skcadang'),
        'tanggal_keluar'=>$this->input->post('tanggal_keluar'),
        'jumlah_keluar' =>$this->input->post('jumlah_keluar'),
        'utk_ganti'     =>$this->input->post('utk_ganti'),
        'nama_petugas'  =>$this->input->post('nama_petugas'),
      );
        $data = array_merge($ambil_skcadang);
        $this->Skcadang_model->TambahAmbil($data);
        $this->session->set_flashdata('pesan_skcadang', 'Data Suku Cadang Terambil!');
        $this->data_skcadang();
    }

    public function hapus_skcadang($id)
    {
        $this->Skcadang_model->hapusDataSkcadang($id);
        $this->session->set_flashdata('pesan_skcadang', 'Data Suku Cadang Berhasil Terhapus!');
        $this->data_skcadang();
    }

    public function data_skcadang_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item active';
        $data['sidebar_skcadang_collapse']   = 'collapse show';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item active';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Suku Cadang Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['skcadang'] = $this->Skcadang_model->getAllSkcadang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_skcadang_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_skcadang_keluar()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item active';
        $data['sidebar_skcadang_collapse']   = 'collapse show';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item active';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Suku Cadang Keluar - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['skcadang_keluar'] = $this->Skcadang_model->getAllSkcadangKeluar();
        $data['option_skcadang'] = $this->Skcadang_model->OptionSkcadang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_skcadang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_skcadang_keluar($id)
    {
        $this->Skcadang_model->hapusDataSkcadangKeluar($id);
        $this->session->set_flashdata('pesan_skcadang_out', 'Data Suku Cadang Dikembalikan!');
        $this->data_skcadang_keluar();
    }

    public function data_skcadang_keluar_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item active';
        $data['sidebar_skcadang_collapse']   = 'collapse show';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item active';

        $data['sidebar_perawatan']   = 'nav-item';
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

        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Keluar Suku Cadang Print - SIM PPL Bandar Udara Budiarto Curug';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['skcadang_keluar'] = $this->Skcadang_model->getAllSkcadangKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_skcadang_keluar_print', $data);
        $this->load->view('templates/footer');
    }


    public function data_perawatan()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item active';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_perawatan()
    {
        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('add_nama_alat', 'Alat', 'required');
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_kegiatan', 'Kegiatan', 'required');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run()) {
            $add_tanggal = $this->input->post('add_tanggal');
            $add_nama_alat = $this->input->post('add_nama_alat');
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_kegiatan = $this->input->post('add_kegiatan');
            $add_keterangan = $this->input->post('add_keterangan');

            $perawatan_baru = ([
              'tanggal'=>$add_tanggal,
              'nama_alat'=>$add_nama_alat,
              'nama_petugas'=>$add_nama_petugas,
              'kegiatan'=>$add_kegiatan,
              'keterangan'=>$add_keterangan,
              'status_id'=>'1',
              'Pemeriksa'=>'',
              'tanggal_periksa'=>'0000-00-00'
            ]);
            $data = array_merge($perawatan_baru);
            if ($this->Perawatan_model->TambahPerawatan($data) == false) {
                $this->session->set_flashdata('pesan_perawatan', 'Data Perawatan Ditambah!');
                $this->data_perawatan();
            } else {
                $this->data_perawatan();
            }
        } else {
            $this->data_perawatan();
        }
    }

    public function hapus_perawatan($id)
    {
        $this->Perawatan_model->hapusDataPerawatan($id);
        $this->session->set_flashdata('pesan_perawatan', 'Data Perawatan Berhasil Terhapus!');
        $this->data_perawatan();
    }

    public function data_perawatan_harian()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item active';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_harian', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_mingguan()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item active';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_mingguan', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_bulanan()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item active';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_bulanan', $data);
        $this->load->view('templates/footer');
    }

    public function data_facility_logbook()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_facility_logbook', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_logbook()
    {
        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_catatan', 'Catatan', 'required');

        if ($this->form_validation->run()) {
            $add_tanggal = $this->input->post('add_tanggal');
            $time = $this->input->post('time');
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_catatan = $this->input->post('add_catatan');

            $logbook_baru = ([
              'waktu'=>$add_tanggal,
              'jam'=>$time,
              'nama_petugas'=>$add_nama_petugas,
              'catatan'=>$add_catatan,
              'status_id'=>'1',
              'nama_pemeriksa'=>'-'
            ]);
            $data = array_merge($logbook_baru);
            if ($this->Logbook_model->TambahLogbook($data) == false) {
                $this->session->set_flashdata('pesan_logbook', 'Data Facility Logbook Ditambah!');
                $this->data_facility_logbook();
            } else {
                $this->data_facility_logbook();
            }
        } else {
            $this->data_facility_logbook();
        }
    }

    public function data_facility_logbook_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_facility_logbook_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_laporan_kerusakan()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_laporan_kerusakan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_lkp()
    {
        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('add_lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('add_uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('add_tindakan', 'Tindakan', 'required');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('add_kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('add_spare_part_nama', 'Spare_part_nama', 'required');
        $this->form_validation->set_rules('add_spare_part_jumlah', 'Spare_part_jumlah', 'required');
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');

        if ($this->form_validation->run()) {
            $add_tanggal = $this->input->post('add_tanggal');
            $add_lokasi = $this->input->post('add_lokasi');
            $add_uraian = $this->input->post('add_uraian');
            $add_tindakan = $this->input->post('add_tindakan');
            $add_keterangan = $this->input->post('add_keterangan');
            $add_spare_part_nama = $this->input->post('add_spare_part_nama');
            $add_spare_part_jumlah = $this->input->post('add_spare_part_jumlah');
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_kondisi = $this->input->post('add_kondisi');

            $laporan_kerusakan_baru = ([
              'tanggal'=>$add_tanggal,
              'lokasi'=>$add_lokasi,
              'uraian'=>$add_uraian,
              'tindakan'=>$add_tindakan,
              'keterangan'=>$add_keterangan,
              'spare_part_nama'=>$add_spare_part_nama,
              'spare_part_jumlah'=>$add_spare_part_jumlah,
              'nama_petugas'=>$add_nama_petugas,
              'kondisi'=>$add_kondisi,
              'nama_pemeriksa'=>'-',
              'status_id'=>'1'
            ]);
            $data = array_merge($laporan_kerusakan_baru);
            if ($this->LKP_model->TambahLKP($data) == false) {
                $this->session->set_flashdata('pesan_lkp', 'Data Laporan Kerusakan Ditambah!');
                $this->data_laporan_kerusakan();
            } else {
                $this->data_laporan_kerusakan();
            }
        } else {
            $this->data_laporan_kerusakan();
        }
    }

    public function data_laporan_kerusakan_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_laporan_kerusakan_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ccr()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_ccr', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ccr()
    {
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_nama_alat', 'Alat', 'required');

        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');

        $this->form_validation->set_rules('add_indikasi', 'Indikasi', 'required');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');

        $this->form_validation->set_rules('add_supply_vr', 'Supply_vr', 'required');
        $this->form_validation->set_rules('add_supply_vs', 'Supply_vs', 'required');
        $this->form_validation->set_rules('add_supply_vt', 'Supply_vt', 'required');
        $this->form_validation->set_rules('add_frek', 'Frek', 'required');

        $this->form_validation->set_rules('add_step_1a', 'Step_1a', 'required');
        $this->form_validation->set_rules('add_step_2a', 'Step_2a', 'required');
        $this->form_validation->set_rules('add_step_3a', 'Step_3a', 'required');
        $this->form_validation->set_rules('add_step_4a', 'Step_4a', 'required');
        $this->form_validation->set_rules('add_step_5a', 'Step_5a', 'required');

        if ($this->form_validation->run()) {
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_nama_alat = $this->input->post('add_nama_alat');
            $add_tanggal = $this->input->post('add_tanggal');
            $time = $this->input->post('time');
            $add_indikasi = $this->input->post('add_indikasi');
            $add_keterangan = $this->input->post('add_keterangan');
            $add_supply_vr = $this->input->post('add_supply_vr');
            $add_supply_vs = $this->input->post('add_supply_vs');
            $add_supply_vt = $this->input->post('add_supply_vt');
            $add_frek = $this->input->post('add_frek');
            $add_step_1a = $this->input->post('add_step_1a');
            $add_step_2a = $this->input->post('add_step_2a');
            $add_step_3a = $this->input->post('add_step_3a');
            $add_step_4a = $this->input->post('add_step_4a');
            $add_step_5a = $this->input->post('add_step_5a');

            $laporan_ccr_baru = ([
              'nama_petugas'=>$add_nama_petugas,
              'nama_ccr'=>$add_nama_alat,
              'tanggal'=>$add_tanggal,
              'jam'=>$time,
              'indikasi'=>$add_indikasi,
              'keterangan'=>$add_keterangan,
              'supply_vr'=>$add_supply_vr,
              'supply_vs'=>$add_supply_vs,
              'supply_vt'=>$add_supply_vt,
              'frek'=>$add_frek,
              'step_1a'=>$add_step_1a,
              'step_2a'=>$add_step_2a,
              'step_3a'=>$add_step_3a,
              'step_4a'=>$add_step_4a,
              'step_5a'=>$add_step_5a
            ]);
            $data = array_merge($laporan_ccr_baru);
            if ($this->Ccr_model->TambahCcr($data) == false) {
                $this->session->set_flashdata('pesan_ccr', 'Data Meter Reading CCR Ditambah!');
                $this->data_mr_ccr();
            } else {
                $this->data_mr_ccr();
            }
        } else {
            $this->data_mr_ccr();
        }
    }

    public function data_mr_ccr_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_ccr_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_ups()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_ups', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ups()
    {
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_nama_alat', 'Alat', 'required');

        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');

        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');

        $this->form_validation->set_rules('add_input_vr', 'Input_vr', 'required');
        $this->form_validation->set_rules('add_input_vs', 'Input_vs', 'required');
        $this->form_validation->set_rules('add_input_vt', 'Input_vt', 'required');
        $this->form_validation->set_rules('add_input_ar', 'Input_ar', 'required');
        $this->form_validation->set_rules('add_input_as', 'Input_as', 'required');
        $this->form_validation->set_rules('add_input_at', 'Input_at', 'required');

        $this->form_validation->set_rules('add_output_v', 'Output_v', 'required');
        $this->form_validation->set_rules('add_output_a', 'Output_a', 'required');
        $this->form_validation->set_rules('add_bat_v', 'Baterai_v', 'required');
        $this->form_validation->set_rules('add_bat_a', 'Baterai_a', 'required');

        if ($this->form_validation->run()) {
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_nama_alat = $this->input->post('add_nama_alat');
            $add_tanggal = $this->input->post('add_tanggal');
            $time = $this->input->post('time');
            $add_keterangan = $this->input->post('add_keterangan');
            $add_input_vr = $this->input->post('add_input_vr');
            $add_input_vs = $this->input->post('add_input_vs');
            $add_input_vt = $this->input->post('add_input_vt');
            $add_input_ar = $this->input->post('add_input_ar');
            $add_input_as = $this->input->post('add_input_as');
            $add_input_at = $this->input->post('add_input_at');
            $add_output_v = $this->input->post('add_output_v');
            $add_output_a = $this->input->post('add_output_a');
            $add_bat_v = $this->input->post('add_bat_v');
            $add_bat_a = $this->input->post('add_bat_a');

            $laporan_ups_baru = ([
              'nama_petugas'=>$add_nama_petugas,
              'nama_ups'=>$add_nama_alat,
              'tanggal'=>$add_tanggal,
              'jam'=>$time,
              'keterangan'=>$add_keterangan,
              'input_vr'=>$add_input_vr,
              'input_vs'=>$add_input_vs,
              'input_vt'=>$add_input_vt,
              'input_ar'=>$add_input_ar,
              'input_as'=>$add_input_as,
              'input_at'=>$add_input_at,
              'output_v'=>$add_output_v,
              'output_a'=>$add_output_a,
              'baterai_v'=>$add_bat_v,
              'baterai_a'=>$add_bat_a
            ]);
            $data = array_merge($laporan_ups_baru);
            if ($this->Ups_model->TambahUps($data) == false) {
                $this->session->set_flashdata('pesan_ups', 'Data Meter Reading UPS Ditambah!');
                $this->data_mr_ups();
            } else {
                $this->data_mr_ups();
            }
        } else {
            $this->data_mr_ups();
        }
    }

    public function data_mr_ups_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_ups_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_mr_genset()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_genset', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_genset()
    {
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_nama_alat', 'Alat', 'required');

        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');

        $this->form_validation->set_rules('add_penggunaan', 'Penggunaan', 'required');
        $this->form_validation->set_rules('time2', 'Time2', 'required');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');

        $this->form_validation->set_rules('add_generator_vr', 'Generator_vr', 'required');
        $this->form_validation->set_rules('add_generator_vs', 'Generator_vs', 'required');
        $this->form_validation->set_rules('add_generator_vt', 'Generator_vt', 'required');
        $this->form_validation->set_rules('add_generator_ar', 'Generator_ar', 'required');
        $this->form_validation->set_rules('add_generator_as', 'Generator_as', 'required');
        $this->form_validation->set_rules('add_generator_at', 'Generator_at', 'required');
        $this->form_validation->set_rules('add_frek', 'Frekuensi', 'required');

        $this->form_validation->set_rules('add_bat_v', 'Baterai_v', 'required');
        $this->form_validation->set_rules('add_bat_a', 'Baterai_a', 'required');

        if ($this->form_validation->run()) {
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_nama_alat = $this->input->post('add_nama_alat');
            $add_tanggal = $this->input->post('add_tanggal');
            $time = $this->input->post('time');
            $add_penggunaan = $this->input->post('add_penggunaan');
            $time2 = $this->input->post('time2');
            $add_keterangan = $this->input->post('add_keterangan');
            $add_generator_vr = $this->input->post('add_generator_vr');
            $add_generator_vs = $this->input->post('add_generator_vs');
            $add_generator_vt = $this->input->post('add_generator_vt');
            $add_generator_ar = $this->input->post('add_generator_ar');
            $add_generator_as = $this->input->post('add_generator_as');
            $add_generator_at = $this->input->post('add_generator_at');
            $add_frek = $this->input->post('add_frek');
            $add_bat_v = $this->input->post('add_bat_v');
            $add_bat_a = $this->input->post('add_bat_a');

            $laporan_genset_baru = ([
              'nama_petugas'=>$add_nama_petugas,
              'nama_genset'=>$add_nama_alat,
              'tanggal'=>$add_tanggal,
              'jam'=>$time,
              'penggunaan'=>$add_penggunaan,
              'jam_operasi'=>$time2,
              'ket_operasi'=>$add_keterangan,
              'generator_vr'=>$add_generator_vr,
              'generator_vs'=>$add_generator_vs,
              'generator_vt'=>$add_generator_vt,
              'generator_ar'=>$add_generator_ar,
              'generator_as'=>$add_generator_as,
              'generator_at'=>$add_generator_at,
              'frek'=>$add_frek,
              'baterai_v'=>$add_bat_v,
              'baterai_a'=>$add_bat_a
            ]);
            $data = array_merge($laporan_genset_baru);
            if ($this->Genset_model->TambahGenset($data) == false) {
                $this->session->set_flashdata('pesan_genset', 'Data Meter Reading Genset Ditambah!');
                $this->data_mr_genset();
            } else {
                $this->data_mr_genset();
            }
        } else {
            $this->data_mr_genset();
        }
    }

    public function data_mr_genset_print()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_mr_genset_print', $data);
        $this->load->view('templates/footer');
    }

    public function performa_lampu()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/performa_lampu', $data);
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
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/gambar_installasi');
        $this->load->view('templates/footer');
    }


    public function sop()
    {
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']            = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';
        $data['sidebar_peralatan_print']      = 'collapse-item';

        $data['sidebar_skcadang']            = 'nav-item';
        $data['sidebar_skcadang_collapse']   = 'collapse';
        $data['sidebar_skcadang_data']       = 'collapse-item';
        $data['sidebar_skcadang_print']      = 'collapse-item';
        $data['sidebar_skcadang_keluar']     = 'collapse-item';
        $data['sidebar_skcadang_keluar_print'] = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sop');
        $this->load->view('templates/footer');
    }
}
