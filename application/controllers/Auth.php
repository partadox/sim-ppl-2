<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/login');
    } else {
      // validasi berhasil
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    // User Ada
    if($user) {
      // Cek password
        if(!password_verify($password, $user['password'])) {
            $data = [
              'username' => $user['username'],
              'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);
            if($user['role_id'] == 1) {
            redirect('admin');
          } elseif ($user['role_id'] == 2) {
            redirect('petugas');
          } elseif ($user['role_id'] == 3) {
            redirect('pemeriksa');
          }
          } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
          redirect('auth');
        }
      } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Terdaftar!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Keluar!</div>');
    redirect('auth');
  }


  public function blocked()
  {
    $this->load->view('auth/blocked');
  }


}
