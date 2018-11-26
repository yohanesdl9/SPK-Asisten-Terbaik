<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_asisten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jadast');
        $this->load->model('mod_jadkul');
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

    public function form_insert(){
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $matkul = $this->mod_jadast->fetchAllTanpaAsisten();
        $asisten = $this->db->get('asisten_dosen')->result();
        $subtitle = "Semester " . $semester . " " . $tahun_ajaran;
        $this->load->view('jadwal_asisten/form_insert', compact('matkul', 'asisten', 'subtitle'));
    }

    public function insert(){
        $kode_kelas = explode('/', $this->input->post('mk_kelas'))[0];
        $jadwal = $this->mod_jadkul->fetchMatkul($kode_kelas)->row();
        $asisten1 = explode("-", $this->input->post('asisten1'));
        $asisten2 = explode("-", $this->input->post('asisten2'));
        if (empty($no_jadwal) || empty($asisten1)){
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('jadwal_asisten/form_insert');
		} else {
            $jadwal_ast1 = $this->mod_jadast->cek_benturan_asisten($kode_kelas, $asisten1[0], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
			if ($jadwal->tipe == 2){
				if (empty($asisten2)){
					$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
					redirect('jadwal_asisten/form_insert');
				} else {
                    $jadwal_ast2 = $this->mod_jadast->cek_benturan_asisten($kode_kelas, $asisten2[0], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
					if ($jadwal_ast1 > 0 || $jadwal_ast2 > 0){
						$this->session->set_flashdata('error_message', $asisten1[1] . ' dan/atau ' . $asisten2[1] . 
						' telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
						redirect('jadwal_asisten/form_insert');
					} else {
						$this->mod_jadast->insert($kode_kelas, $asisten1[0], $asisten2[0]);
						$this->session->set_flashdata('success_message', "Data berhasil dimasukkan");
						redirect('jadwal_asisten');
					}
				}
			} else {
				if ($jadwal_ast1 > 0){
					$this->session->set_flashdata('error_message', $asisten1[1] . 
					'telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
					redirect('jadwal_asisten/form_insert');
				} else {
					$this->mod_jadast->insert($kode_kelas, $asisten1[0]);
					$this->session->set_flashdata('success_message', "Data berhasil dimasukkan");
					redirect('jadwal_asisten');
				}
			}
		}
    }

    public function form_edit($kode_kelas){
        $data_ubah = $this->mod_jadast->fetch($kode_kelas)->row();
        $mk = $this->mod_jadkul->fetchMatkul($kode_kelas)->row();
        $asisten = $this->db->get('asisten_dosen')->result();
        $this->load->view('jadwal_asisten/form_edit', compact('mk', 'asisten', 'subtitle', 'data_ubah'));
    }

    public function update(){
        $kode_kelas = explode('/', $this->input->post('mk_kelas'))[0];
        $jadwal = $this->mod_jadkul->fetchMatkul($kode_kelas)->row();
        $asisten1 = explode("-", $this->input->post('asisten1'));
        $asisten2 = explode("-", $this->input->post('asisten2'));
        if (empty($no_jadwal) || empty($asisten1)){
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('jadwal_asisten/form_update/' . $kode_kelas);
		} else {
            $jadwal_ast1 = $this->mod_jadast->cek_benturan_asisten($kode_kelas, $asisten1[0], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
			if ($jadwal->tipe == 2){
				if (empty($asisten2)){
					$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
					redirect('jadwal_asisten/form_update/' . $kode_kelas);
				} else {
                    $jadwal_ast2 = $this->mod_jadast->cek_benturan_asisten($kode_kelas, $asisten2[0], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
					if ($jadwal_ast1 > 0 || $jadwal_ast2 > 0){
						$this->session->set_flashdata('error_message', $asisten1[1] . ' dan/atau ' . $asisten2[1] . 
						' telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
						redirect('jadwal_asisten/form_update/' . $kode_kelas);
					} else {
						$this->mod_jadast->update($kode_kelas, $asisten1[0], $asisten2[0]);
						$this->session->set_flashdata('success_message', "Data berhasil diubah");
						redirect('jadwal_asisten');
					}
				}
			} else {
				if ($jadwal_ast1 > 0){
					$this->session->set_flashdata('error_message', $asisten1[1] . 
					'telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
					redirect('jadwal_asisten/form_insert');
				} else {
					$this->mod_jadast->update($kode_kelas, $asisten1[0]);
					$this->session->set_flashdata('success_message', "Data berhasil diubah");
					redirect('jadwal_asisten');
				}
			}
		}
    }
}

?>