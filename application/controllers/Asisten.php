<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asisten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_asisten');
    }

    public function index(){
        $data['asdos'] = $this->mod_asisten->fetchAll();
        $this->load->view('asisten/view', $data);
    }

    public function insert(){
        $nrp = $this->input->post('nrp');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $jabatan = $this->input->post('jabatan');
        $nilai_disiplin = $this->input->post('nilai_disiplin');
        $this->mod_asisten->insert($nrp, $nama, $jk, $alamat, $telepon, $jabatan, $nilai_disiplin);
        $this->session->set_flashdata('success_message', 'Data berhasil ditambahkan');
        redirect('asisten');
    }

    public function form_edit(){
        $nrp = $this->input->get('nrp');
        $asisten = $this->mod_asisten->fetchAsisten($nrp);
        $this->load->view('asisten/form_edit', compact('asisten'));
    }

    public function update(){
        $old_nrp = $this->input->post('old_nrp');
        $nrp = $this->input->post('nrp');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $nilai_disiplin = $this->input->post('nilai_disiplin');
        $this->mod_asisten->update($old_nrp, $nrp, $nama, $jk, $alamat, $telepon, $nilai_disiplin);
        $this->session->set_flashdata('success_message', 'Data berhasil diubah');
        redirect('asisten');
    }

    public function confirm_delete(){
        $nrp = $this->input->get('nrp');
        $asisten = $this->mod_asisten->fetchAsisten($nrp);
        $this->load->view('asisten/confirm_delete', compact('asisten'));
    }

    public function delete($id){
        $this->mod_asisten->delete($id);
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus');
        redirect('asisten');
    }

    public function deleteAll(){
        
    }
}

?>