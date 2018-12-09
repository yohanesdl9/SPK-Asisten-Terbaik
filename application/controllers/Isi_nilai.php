<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isi_nilai extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('mod_isinilai');
    }

    public function index(){
        if ($this->session->userdata('isLogin') == TRUE){
            $bulan = date('m');
            $tahun = date('Y');
            $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
            $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
            $data['jadwal'] = $this->mod_isinilai->fetchAll();
            $data['subtitle'] = "Semester " . $semester . " " . $tahun_ajaran;
            $this->load->view('isi_nilai/view', $data);
        } else {
            redirect('login');
        }
    }

    public function insert(){

        redirect('jadwal_kuliah');
    }

    public function form_edit(){

    }

    public function update(){

        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('jadwal_kuliah');
    }

    public function confirm_delete(){

    }

    public function delete($id){

    }
}

?>