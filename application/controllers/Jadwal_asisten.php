<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_asisten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jadast');
    }

    public function index(){
        if ($this->session->userdata('isLogin') == TRUE){
            $bulan = date('m');
            $tahun = date('Y');
            $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
            $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
            $data['jadwal'] = $this->mod_jadast->fetchAll();
            $data['matkul'] = $this->mod_jadast->fetchAllTanpaAsisten()->result();
            $data['filled'] = $this->mod_jadast->fetchAllTanpaAsisten()->num_rows();
            $data['subtitle'] = "Semester " . $semester . " " . $tahun_ajaran;
            $data['asisten'] = $this->db->get('asisten_dosen')->result();
            $this->load->view('jadwal_asisten/view', $data);
        } else {
            redirect('login');
        }
    }

    public function insert(){

        redirect('jadwal_asisten');
    }

    public function form_edit(){

    }

    public function update(){

        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('jadwal_asisten');
    }
}

?>