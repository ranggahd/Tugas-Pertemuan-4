<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

   var $CI = NULL;

   function __construct() {
      // mendapatkan instance CodeIgniter
      $this->CI =& get_instance();
   }

   function tampil_sidebar() {
      // Memuat model 'usermodel'
      $this->CI->load->model('usermodel');
      
      // Mengambil level pengguna dari sesi
      $level = $this->CI->session->userdata('level');
      
      // Mendapatkan menu yang sesuai dengan level pengguna
      $data['menu'] = $this->CI->usermodel->get_menu_for_level($level);
      $data['level'] = $this->CI->session->userdata('level');
      
      // Menampilkan sidebar dengan data menu
      $this->CI->load->view('sidebar-nav', $data);
   }
}
