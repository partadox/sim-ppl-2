<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Petugas_model');
        $this->load->model('Peralatan_model');
        $this->load->model('Perawatan_model');
        $this->load->model('Logbook_model');
        $this->load->model('LKP_model');
        $this->load->library('form_validation');
        $this->load->library('javascript');
    }

    public function index()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Selamat Datang Admin di Dashboard SIM-PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_petugas()
    {
        $data['role_name_sidebar'] = 'Admin';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item active';

        $data['sidebar_peralatan']   = 'nav-item';
        $data['sidebar_peralatan_collapse']   = 'collapse';
        $data['sidebar_peralatan_semua']      = 'collapse-item';

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

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Petugas - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->Petugas_model->getAllPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_petugas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_petugas()
    {
        $this->form_validation->set_rules('add_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('add_nip', 'Nip', 'required|trim');
        $this->form_validation->set_rules('add_user_role', 'User_role', 'required|trim');
        $this->form_validation->set_rules('add_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('add_phone', 'Phone', 'required|trim|is_natural');
        $this->form_validation->set_rules('add_alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('add_username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('add_password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $add_name = $this->input->post('add_name');
            $add_nip = $this->input->post('add_nip');
            $add_user_role = $this->input->post('add_user_role');
            $add_email = $this->input->post('add_email');
            $add_phone = $this->input->post('add_phone');
            $add_alamat = $this->input->post('add_alamat');
            $add_username = $this->input->post('add_username');
            $add_password = $this->input->post('add_password');

            $petugas_baru = ([
              'name'=>$add_name,
              'nip'=>$add_nip,
              'role_id'=>$add_user_role,
              'alamat'=>$add_alamat,
              'date_created'=>time(),
              'email'=>$add_email,
              'phone'=>$add_phone,
              'image'=>'admin.png',
              'username'=>$add_username,
              'password'=>$add_password
            ]);
            $data = array_merge($petugas_baru);
            if ($this->Petugas_model->TambahPetugas($data) == false) {
                $this->session->set_flashdata('pesan', 'Data Petugas Ditambah!');
                $this->data_petugas();
            } else {
                $this->data_petugas();
            }
        } else {
            $this->data_petugas();
        }
    }

    public function hapus_petugas($id)
    {
        $this->Petugas_model->hapusDataPetugas($id);
        $this->session->set_flashdata('pesan', 'Data Petugas Berhasil Terhapus!');
        $this->data_petugas();
    }

    public function edit_petugas()
    {
        $id = $this->input->post('id');
        $data = array(
        'name'=> $this->input->post('name'),
        'nip'=>  $this->input->post('edit_nip'),
        'alamat'=>  $this->input->post('edit_alamat'),
        'email'=>   $this->input->post('edit_email'),
        'phone'=>   $this->input->post('edit_phone'),
        'username'=>$this->input->post('edit_username'),
        'password'=>$this->input->post('edit_password')
        );

        $this->Petugas_model->edit_petugas($data, $id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
        $this->data_petugas();
    }

    public function data_peralatan()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_fl']                   = 'nav-item';
        $data['sidebar_fl_collapse']          = 'collapse';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Peralatan - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['peralatan'] = $this->Peralatan_model->getAllPeralatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_peralatan', $data);
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
        $data['role_name_sidebar'] = 'Admin';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

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

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Pemeliharaan- SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_perawatan', $data);
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
        $data['role_name_sidebar'] = 'Admin';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

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

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Pemeliharaan Harian - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_perawatan_harian', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_mingguan()
    {
        $data['role_name_sidebar'] = 'Admin';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

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

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Pemeliharaan Mingguan - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_perawatan_mingguan', $data);
        $this->load->view('templates/footer');
    }

    public function data_perawatan_bulanan()
    {
        $data['role_name_sidebar'] = 'Admin';

        $data['sidebar_dashboard']   = 'nav-item';
        $data['sidebar_penjadwalan'] = 'nav-item';
        $data['sidebar_petugas']     = 'nav-item';

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
        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Pemeliharaan Bulanan - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perawatan'] = $this->Perawatan_model->getAllPerawatan();
        $data['option_alat'] = $this->Perawatan_model->OptionAlat();
        $data['option_petugas'] = $this->Perawatan_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_perawatan_bulanan', $data);
        $this->load->view('templates/footer');
    }

    public function data_facility_logbook()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_fl']                   = 'nav-item active';
        $data['sidebar_fl_collapse']          = 'collapse show';
        $data['sidebar_fl_data']              = 'collapse-item active';
        $data['sidebar_fl_print']             = 'collapse-item';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Facility Logbook - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['logbook'] = $this->Logbook_model->getAllLogbook();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_facility_logbook', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_logbook()
    {
        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        $this->form_validation->set_rules('add_nama_alat', 'Alat', 'required');
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('add_pemeriksa', 'Pemeriksa', 'required');

        if ($this->form_validation->run()) {
            $add_tanggal = $this->input->post('add_tanggal');
            $time = $this->input->post('time');
            $add_nama_alat = $this->input->post('add_nama_alat');
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_catatan = $this->input->post('add_catatan');
            $add_pemeriksa = $this->input->post('add_pemeriksa');

            $logbook_baru = ([
              'waktu'=>$add_tanggal,
              'jam'=>$time,
              'nama_alat'=>$add_nama_alat,
              'nama_petugas'=>$add_nama_petugas,
              'catatan'=>$add_catatan,
              'status_id'=>'1',
              'nama_pemeriksa'=>$add_pemeriksa
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

    public function hapus_logbook($id)
    {
        $this->Logbook_model->hapusDataLogbook($id);
        $this->session->set_flashdata('pesan_logbook', 'Data Logbook Berhasil Terhapus!');
        $this->data_facility_logbook();
    }

    public function data_facility_logbook_print()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_fl']                   = 'nav-item active';
        $data['sidebar_fl_collapse']          = 'collapse show';
        $data['sidebar_fl_data']              = 'collapse-item';
        $data['sidebar_fl_print']             = 'collapse-item active';

        $data['sidebar_lkp']                  = 'nav-item';
        $data['sidebar_lkp_collapse']         = 'collapse';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Facility Logbook - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['logbook'] = $this->Logbook_model->getAllLogbook();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_facility_logbook_print', $data);
        $this->load->view('templates/footer');
    }

    public function data_laporan_kerusakan()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_lkp']                  = 'nav-item active';
        $data['sidebar_lkp_collapse']         = 'collapse show';
        $data['sidebar_lkp_data']             = 'collapse-item active';
        $data['sidebar_lkp_print']            = 'collapse-item';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Laporan Kerusakan dan Perbaikan - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_kerusakan'] = $this->LKP_model->getAllLKP();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_laporan_kerusakan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_lkp()
    {
        $this->form_validation->set_rules('add_tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('add_lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('add_uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('add_tindakan', 'Tindakan', 'required');
        $this->form_validation->set_rules('add_keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('add_spare_part_nama', 'Spare_part_nama', 'required');
        $this->form_validation->set_rules('add_spare_part_jumlah', 'Spare_part_jumlah', 'required');
        $this->form_validation->set_rules('add_nama_petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('add_pemeriksa', 'Pemeriksa', 'required');

        if ($this->form_validation->run()) {
            $add_tanggal = $this->input->post('add_tanggal');
            $add_lokasi = $this->input->post('add_lokasi');
            $add_uraian = $this->input->post('add_uraian');
            $add_tindakan = $this->input->post('add_tindakan');
            $add_keterangan = $this->input->post('add_keterangan');
            $add_spare_part_nama = $this->input->post('add_spare_part_nama');
            $add_spare_part_jumlah = $this->input->post('add_spare_part_jumlah');
            $add_nama_petugas = $this->input->post('add_nama_petugas');
            $add_pemeriksa = $this->input->post('add_pemeriksa');

            $laporan_kerusakan_baru = ([
              'tanggal'=>$add_tanggal,
              'lokasi'=>$add_lokasi,
              'uraian'=>$add_uraian,
              'tindakan'=>$add_tindakan,
              'keterangan'=>$add_keterangan,
              'spare_part_nama'=>$add_spare_part_nama,
              'spare_part_jumlah'=>$add_spare_part_jumlah,
              'nama_petugas'=>$add_nama_petugas,
              'nama_pemeriksa'=>$add_pemeriksa,
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

    public function hapus_lkp($id)
    {
        $this->LKP_model->hapusDataLKP($id);
        $this->session->set_flashdata('pesan_lkp', 'Data Laporan Kerusakan Berhasil Terhapus!');
        $this->data_laporan_kerusakan();
    }

    public function data_laporan_kerusakan_print()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_lkp']                  = 'nav-item active';
        $data['sidebar_lkp_collapse']         = 'collapse show';
        $data['sidebar_lkp_data']             = 'collapse-item';
        $data['sidebar_lkp_print']            = 'collapse-item active';

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item';

        $data['title'] = 'Data Laporan Kerusakan - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan_kerusakan'] = $this->LKP_model->getAllLKP();
        $data['option_alat'] = $this->Logbook_model->OptionAlat();
        $data['option_petugas'] = $this->Logbook_model->OptionPetugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_laporan_kerusakan_print', $data);
        $this->load->view('templates/footer');
    }

    public function sop()
    {
        $data['role_name_sidebar'] = 'Admin';

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

        $data['sidebar_mr']          = 'nav-item';
        $data['sidebar_sop']         = 'nav-item active';

        $data['title'] = 'Standart Operasional - SIM PPL Bandar Udara Budiarto Tangerang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sop');
        $this->load->view('templates/footer');
    }
}
