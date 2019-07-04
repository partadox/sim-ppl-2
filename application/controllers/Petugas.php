<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
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
        $data['role_name_sidebar'] = 'Petugas';

        $data['sidebar_dashboard']   = 'nav-item active';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

        $data['sidebar_peralatan']   = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

        $data['sidebar_perawatan']   = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Selamat Datang Petugas di Dashboard SIM-PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

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

        $data['sidebar_peralatan']   = 'nav-item active';
        $data['sidebar_peralatan_collapse']   = 'collapse show';
        $data['sidebar_peralatan_semua']   = 'collapse-item active';

        $data['sidebar_perawatan']   = 'nav-item';
        $data['sidebar_perawatan_collapse']   = 'collapse';
        $data['sidebar_perawatan_semua']      = 'collapse-item';
        $data['sidebar_perawatan_hari']       = 'collapse-item';
        $data['sidebar_perawatan_minggu']     = 'collapse-item';
        $data['sidebar_perawatan_bulan']      = 'collapse-item';

        $data['sidebar_fl']          = 'nav-item';
        $data['sidebar_lkp']         = 'nav-item';
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Peralatan - SIM PPL Bandar Udara Budiarto Tangerang';
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

    public function data_perawatan()
    {
        $data['role_name_sidebar'] = 'Petugas';

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
              'keterangan'=>$add_keterangan
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_harian', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_mingguan()
    {
        $data['role_name_sidebar'] = 'Petugas';

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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_mingguan', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_bulanan()
    {
        $data['role_name_sidebar'] = 'Petugas';

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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/data_perawatan_bulanan', $data);
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
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sop');
        $this->load->view('templates/footer');
    }
}
