<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_dosen');
    }

    public function index(){
        $data['dosen'] = $this->mod_dosen->fetchAll();
        $this->load->view('dosen/view', $data);
    }

    public function insert(){
        $nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
        $this->mod_dosen->insert($nip, $nama_dosen, $jk, $alamat, $telepon, $email);
        $this->session->set_flashdata('success_message', 'Data berhasil ditambahkan');
        redirect('dosen');
    }

    public function form_edit(){
        $nip = $this->input->get('nip');
        $hasil = $this->mod_dosen->fetchDosen($nip);
        $this->load->view('dosen/form_edit', compact('hasil'));
    }

    public function update(){
        $old_nip = $this->input->post('old_nip');
        $nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
        $this->mod_dosen->update($old_nip, $nip, $nama_dosen, $jk, $alamat, $telepon, $email);
        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('dosen');
    }

    public function confirm_delete(){
        $nip = $this->input->get('nip');
        $hasil = $this->mod_dosen->fetchDosen($nip);
        $this->load->view('dosen/confirm_delete', compact('hasil'));
    }

    public function delete($id){
        $this->mod_dosen->delete($id);
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus');
        redirect('dosen');
    }
}

?>