<?php if (!defined('BASEPATH')) { 
    exit('No direct script access allowed'); 
}

class Newitem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('item_model');
    }

    public function index() {
        // Mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        
        // Mencegah user mengakses menu yang tidak boleh ia buka
        $this->auth->cek_menu(2);

        // Mengambil data item untuk ditampilkan
        $data['daftar_item'] = $this->item_model->select_all()->result();

        // Menampilkan sidebar dan halaman utama
        $this->menu->tampil_sidebar();
        $this->load->view('new-item', $data);
    }

    // Pagination Table
    public function lihat_item_paging($offset = 0) {
        // Tentukan jumlah data per halaman
        $perpage = 10;

        // Load library pagination
        $this->load->library('pagination');

        // Konfigurasi tampilan paging
        $config = array(
            'base_url' => site_url('newitem/lihat_item_paging'),
            'total_rows' => count($this->item_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // Inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_item'] = $this->item_model->select_all_paging($limit)->result();
        $this->load->view('t-new-item', $data);
    }

    public function lihat_item() {
        $data['daftar_item'] = $this->item_model->select_all()->result();
        $this->load->view('new-item', $data);
    }

    // Proses tambah item
    public function proses_tambah_item() {
        $data = array(
            'kd_model' => $this->input->post('kd_model'),
            'nama_model' => $this->input->post('nama_model'),
            'jml_produk' => $this->input->post('jml_produk'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->item_model->insert_item($data);
        echo "success";
    }

    // Proses pencarian item berdasarkan kode model
    public function proses_cari_item() {
        $kd_model = $this->input->post('kd_model');
        $data['daftar_item'] = $this->item_model->select_by_kode($kd_model)->result();
        $this->load->view('t-new-item', $data);
    }
}
