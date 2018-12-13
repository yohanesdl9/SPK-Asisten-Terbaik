<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_asisten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jadast');
        $this->load->model('mod_jadkul');
    }

    public function index(){
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
        if (empty($this->input->post('mk_kelas')) || empty($this->input->post('asisten1'))){
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			//redirect('jadwal_asisten/form_insert');
		} else {
			$kode_kelas = explode('/', $this->input->post('mk_kelas'));
			$jadwal = $this->mod_jadkul->fetchMatkul($kode_kelas[0])->row();
			$asisten1 = explode("-", $this->input->post('asisten1'));
            $jadwal_ast1 = $this->mod_jadast->cek_benturan_asisten($kode_kelas[0], $asisten1[1], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
			if ($kode_kelas[1] == 2){
				if (empty($this->input->post('asisten2'))){
					$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
					redirect('jadwal_asisten/form_insert');
				} else {
					$asisten2 = explode("-", $this->input->post('asisten2'));
                    $jadwal_ast2 = $this->mod_jadast->cek_benturan_asisten($kode_kelas[0], $asisten2[1], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
					if ($jadwal_ast1 > 0 || $jadwal_ast2 > 0){
						$this->session->set_flashdata('error_message', $asisten1[1] . ' dan/atau ' . $asisten2[1] . 
						' telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
						redirect('jadwal_asisten/form_insert');
					} else {
						$this->mod_jadast->insert($kode_kelas[0], $asisten1[0], $asisten2[0]);
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
					$this->mod_jadast->insert($kode_kelas[0], $asisten1[0]);
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
        if (empty($this->input->post('mk_kelas')) || empty($this->input->post('asisten1'))){
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('jadwal_asisten/form_edit/' . $kode_kelas);
		} else {
			$kode_kelas = explode('/', $this->input->post('mk_kelas'));
        	$jadwal = $this->mod_jadkul->fetchMatkul($kode_kelas[0])->row();
        	$asisten1 = explode("-", $this->input->post('asisten1'));
            $jadwal_ast1 = $this->mod_jadast->cek_benturan_asisten($kode_kelas[0], $asisten1[1], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
			if ($kode_kelas[1] == 2){
				if (empty($this->input->post('asisten2'))){
					$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
					redirect('jadwal_asisten/form_edit/' . $kode_kelas[0]);
				} else {
					$asisten2 = explode("-", $this->input->post('asisten2'));
                    $jadwal_ast2 = $this->mod_jadast->cek_benturan_asisten($kode_kelas[0], $asisten2[1], $jadwal->hari, $jadwal->jam_mulai, $jadwal->jam_selesai);
					if ($jadwal_ast1 > 0 || $jadwal_ast2 > 0){
						$this->session->set_flashdata('error_message', $asisten1[1] . ' dan/atau ' . $asisten2[1] . 
						' telah mengasisteni matakuliah/kelas lain pada hari dan jam yang sama.');
						redirect('jadwal_asisten/form_edit/' . $kode_kelas);
					} else {
						$this->mod_jadast->update($kode_kelas[0], $asisten1[0], $asisten2[0]);
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
					$this->mod_jadast->update($kode_kelas[0], $asisten1[0]);
					$this->session->set_flashdata('success_message', "Data berhasil diubah");
					redirect('jadwal_asisten');
				}
			}
		}
    }
}

?>