<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('mod_matkul');
    }

    public function index(){
        if ($this->session->userdata('isLogin') == TRUE){
            $bulan = date('m');
            $tahun = date('Y');
            $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
            $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
            $data['matkul'] = $this->mod_matkul->fetchAll();
            $data['subtitle'] = "Semester " . $semester . " " . $tahun_ajaran;
            $this->load->view('matakuliah/view', $data);
        } else {
            redirect('login');
        }
    }

    public function insert(){
        $kodemk = $this->input->post('kodemk');
		$namamk = $this->input->post('namamk');
		$sks = $this->input->post('sks');
		$semester = substr($kodemk, 6, 1) % 2 == 0 ? 'Genap' : 'Ganjil';
		$tipe = $this->input->post('tipe');
        $this->mod_matkul->insert($nip, $nama_dosen, $jk, $alamat, $telepon, $email);
        $this->session->set_flashdata('success_message', 'Data berhasil ditambahkan');
        redirect('matakuliah');
    }

    public function form_edit(){
        $kodemk = $this->input->get('kodemk');
        $hasil = $this->mod_matkul->fetchMatkul($kodemk);
        $this->load->view('matakuliah/form_edit', compact('hasil'));
    }

    public function update(){
        $old_kodemk = $this->input->post('old_kodemk');
        $kodemk = $this->input->post('kodemk');
		$namamk = $this->input->post('namamk');
		$sks = $this->input->post('sks');
		$semester = substr($kodemk, 6, 1) % 2 == 0 ? 'Genap' : 'Ganjil';
		$tipe = $this->input->post('tipe');
        $this->mod_matkul->update($old_nip, $nip, $nama_dosen, $jk, $alamat, $telepon, $email);
        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('matakuliah');
    }

    public function confirm_delete(){
        $kodemk = $this->input->get('kodemk');
        $hasil = $this->mod_matkul->fetchMatkul($kodemk);
        $this->load->view('matakuliah/confirm_delete', compact('hasil'));
    }

    public function delete($id){
        $this->mod_matkul->delete($id);
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus');
        redirect('matakuliah');
    }
}

?>