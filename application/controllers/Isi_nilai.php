<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isi_nilai extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_isinilai');
        $this->load->model('mod_jadkul');
        $this->load->model('mod_jadast');
    }

    public function index(){
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $data['jadwal'] = $this->mod_isinilai->fetchAll();
        $data['subtitle'] = "Semester " . $semester . " " . $tahun_ajaran;
        $this->load->view('isi_nilai/view', $data);
    }

    public function form_insert($kode_kelas){
        $data_nilai = $this->mod_isinilai->fetch($kode_kelas)->row();
        $hasil = $this->mod_jadkul->fetchMatkul($kode_kelas)->row();
        $asisten = $this->mod_jadast->fetchJadwal($kode_kelas)->row();
        $status = $this->mod_isinilai->fetch($kode_kelas)->num_rows();
        $this->load->view('isi_nilai/form', compact('data_nilai', 'hasil', 'asisten', 'status'));
    }

    public function insert($status){
        $kode_kelas = $this->input->post('kode_kelas');
        $avg_kelas = $this->input->post('avg_kelas');
        $jumlah_A = $this->input->post('jumlah_A') ? $this->input->post('jumlah_A') : 0;
        $jumlah_B_plus = $this->input->post('jumlah_B_plus') ? $this->input->post('jumlah_B_plus') : 0;
        $jumlah_B = $this->input->post('jumlah_B') ? $this->input->post('jumlah_B') : 0;
        $jumlah_C_plus = $this->input->post('jumlah_C_plus') ? $this->input->post('jumlah_C_plus') : 0;
        $jumlah_C = $this->input->post('jumlah_C') ? $this->input->post('jumlah_C') : 0;
        $jumlah_D = $this->input->post('jumlah_D') ? $this->input->post('jumlah_D') : 0;
        $jumlah_E = $this->input->post('jumlah_E') ? $this->input->post('jumlah_E') : 0;
        $jumlah_peserta = $this->input->post('jumlah_peserta');
        if(empty($avg_kelas)){
            $this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar');
            redirect('isi_nilai/form_insert/' . $kode_kelas);
        } else {
            if (($jumlah_A + $jumlah_B_plus + $jumlah_B + $jumlah_C_plus + $jumlah_C + $jumlah_D + $jumlah_E) != $jumlah_peserta){
                $this->session->set_flashdata('error_message', 'Cek kembali jumlah peserta dengan nilai yang didapatkan dengan jumlah peserta keseluruhan');
                redirect('isi_nilai/form_insert/' . $kode_kelas);
            } else {
                switch($status){
                    case 0:
                        $this->mod_isinilai->insert($kode_kelas, $avg_kelas, $jumlah_A, $jumlah_B_plus, $jumlah_B, $jumlah_C_plus, $jumlah_C, $jumlah_D, $jumlah_E);
                        break;
                    case 1:
                        $this->mod_isinilai->update($kode_kelas, $avg_kelas, $jumlah_A, $jumlah_B_plus, $jumlah_B, $jumlah_C_plus, $jumlah_C, $jumlah_D, $jumlah_E);
                        break;
                }
                
                $this->session->set_flashdata('success_message', 'Nilai berhasil tersimpan');
                redirect('isi_nilai');
            }
        }
    }
}

?>