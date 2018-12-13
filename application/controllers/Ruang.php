<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_ruang');
    }

    public function index(){
        $data['ruang'] = $this->mod_ruang->fetchAll();
        $this->load->view('ruang/view', $data);
    }

    public function insert(){
        $koderuang = $this->input->post('koderuang');
        $nama_ruang = $this->input->post('nama_ruang');
        $kapasitas = $this->input->post('kapasitas');
        $this->mod_ruang->insert($koderuang, $nama_ruang, $kapasitas);
        $this->session->set_flashdata('success_message', 'Data berhasil ditambahkan');
        redirect('ruang');
    }

    public function form_edit(){
        $koderuang = $this->input->get('koderuang');
        $hasil = $this->mod_ruang->fetchRuang($koderuang);
        $this->load->view('ruang/form_edit', compact('hasil'));
    }

    public function update(){
        $old_koderuang = $this->input->post('old_koderuang');
        $koderuang = $this->input->post('koderuang');
        $nama_ruang = $this->input->post('nama_ruang');
        $kapasitas = $this->input->post('kapasitas');
        $this->mod_ruang->update($old_koderuang, $koderuang, $nama_ruang, $kapasitas);
        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('ruang');
    }

    public function confirm_delete(){
        $koderuang = $this->input->get('koderuang');
        $hasil = $this->mod_ruang->fetchRuang($koderuang);
        $this->load->view('ruang/confirm_delete', compact('hasil'));
    }

    public function delete($id){
        $this->mod_ruang->delete($id);
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus');
        redirect('ruang');
    }
}

?>