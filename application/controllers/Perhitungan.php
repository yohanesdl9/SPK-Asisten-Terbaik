<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('ahp');
        $this->load->model('mod_perhitungan');
    }

    public function index(){
        if ($this->session->userdata('isLogin') == TRUE){
            $this->load->view('perhitungan/input_matriks');
        } else {
            $result = $this->db->get('bobot_kriteria')->row();
            $alt = $this->mod_perhitungan->hitungSolusiIdeal();
            $this->load->view('perhitungan/view_alt_bobot', compact('result', 'alt'));
        }
    }

    public function process_AHP(){
        $pair_1_2 = $this->input->post('C12');
        $pair_1_3 = $this->input->post('C13');
        $pair_1_4 = $this->input->post('C14');
        $pair_2_3 = $this->input->post('C23');
        $pair_2_4 = $this->input->post('C24');
        $pair_3_4 = $this->input->post('C34');
        $pairwise_matrix = array(
            array(1, $pair_1_2, $pair_1_3, $pair_1_4),
            array((1/$pair_1_2), 1, $pair_2_3, $pair_2_4),
            array((1/$pair_1_3), (1/$pair_2_3), 1, $pair_3_4),
            array((1/$pair_1_4), (1/$pair_2_4), (1/$pair_3_4), 1),
        );
        $result = $this->ahp->process($pairwise_matrix);
        if ($result['CR'] > 0.1){
            $this->session->set_flashdata('error_message', 'Rasio pembobotan tidak konsisten. Ulangi menginputkan matriks perbandingan');
            redirect('perhitungan');
        } else {
            $this->mod_perhitungan->insertKriteria($result['bobot']);
            $result = $this->db->get('bobot_kriteria')->row();
            $alt = $this->mod_perhitungan->hitungSolusiIdeal();
            $this->load->view('perhitungan/view_alt_bobot', compact('result', 'alt', 'pairwise_matrix'));
        }
        
    }
}

?>