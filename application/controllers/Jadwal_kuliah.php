<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_kuliah extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_jadkul');
        $this->load->model('mod_ruang');
    }

    public function index(){
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $data['jadwal'] = $this->mod_jadkul->fetchAll();
        $data['subtitle'] = "Semester " . $semester . " " . $tahun_ajaran;
        $this->load->view('jadwal_kuliah/view', $data);
    }

    public function form_insert(){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $matkul = $this->db->where('semester', $semester)->get('matakuliah')->result();
        $dosen = $this->db->get('dosen')->result();
        $ruang = $this->db->get('ruang')->result();
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $this->load->view('jadwal_kuliah/form', compact('tahun', 'semester', 'matkul', 'dosen', 'ruang', 'tahun_ajaran'));
    }

    public function insert(){
        $mode = $this->input->post('mode');
        $old_kodekelas = $this->input->post('old_kodekelas');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
		$matkul = $this->input->post('matkul');
		$kelas = $this->input->post('kelas');
		$dosen = $this->input->post('dosen');
		$ruang = $this->input->post('ruang');
		$hari = $this->input->post('hari');
		$jumlah = $this->input->post('jumlah');
		if (empty($matkul) || empty($kelas) || empty($dosen) || empty($ruang) || empty($hari) ||
		empty($this->input->post('jammulai')) || empty($this->input->post('jamselesai')) || empty($jumlah)){
			$this->session->set_flashdata('error_message', "Harap masukkan data dengan benar!");
			redirect($mode == 'insert' ? 'jadwal_kuliah/form_insert' : 'jadwal_kuliah/form_edit/' . $old_kodekelas);
		} else {
			$jammulai = $this->input->post('jammulai').":00";
            $jamselesai = $this->input->post('jamselesai').":00";
            $tahun = explode('/', $tahun_ajaran);
			$query = $this->mod_jadkul->fetchMatkul($matkul . '-' . $kelas . '-' . $tahun[0])->num_rows();
			if ($query > 0){
				$this->session->set_flashdata('error_message', "Data yang dimasukkan sudah ada");
				redirect('jadwal_kuliah');
			} else {
				if ($this->mod_jadkul->cek_benturan_ruang($matkul . '-' . $kelas . '-' . $tahun[0], $ruang, $hari, $jammulai, $jamselesai)){
					$this->session->set_flashdata('error_message', "Ruang $ruang telah digunakan untuk jadwal kuliah lain pada hari dan jam yang sama");
					redirect($mode == 'insert' ? 'jadwal_kuliah/form_insert' : 'jadwal_kuliah/form_edit/' . $old_kodekelas);
				} else {
					$kapasitas = $this->mod_ruang->fetchRuang($ruang)->row()->kapasitas;
                    if ($jumlah > $kapasitas){
                        $this->session->set_flashdata('error_message', "Kapasitas ruangan tidak mencukupi");
                        redirect($mode == 'insert' ? 'jadwal_kuliah/form_insert' : 'jadwal_kuliah/form_edit/' . $old_kodekelas);
                    } else {
                        if ($mode == 'insert'){
                            $this->mod_jadkul->insert($matkul, $kelas, $hari, $dosen, $jammulai, $jamselesai, $ruang, $tahun_ajaran, $jumlah);
                            $this->session->set_flashdata('success_message', "Data berhasil dimasukkan");
                        } else {
                            $this->mod_jadkul->update($old_kodekelas, $matkul, $kelas, $hari, $dosen, $jammulai, $jamselesai, $ruang, $tahun_ajaran, $jumlah);
                            $this->session->set_flashdata('success_message', 'Data berhasil diubah');
                        }
                        redirect('jadwal_kuliah');
                    }
				}
			}
		}
    }

    public function form_edit($kode_kelas){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $matkul = $this->db->where('semester', $semester)->get('matakuliah')->result();
        $dosen = $this->db->get('dosen')->result();
        $ruang = $this->db->get('ruang')->result();
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $data_ubah = $this->mod_jadkul->fetch($kode_kelas)->row();
        $this->load->view('jadwal_kuliah/form', compact('tahun', 'semester', 'matkul', 'dosen', 'ruang', 'tahun_ajaran', 'data_ubah'));
    }

    public function confirm_delete(){
        $kode_kelas = $this->input->get('kode_kelas');
        $hasil = $this->mod_jadkul->fetchMatkul($kode_kelas)->row();
        $this->load->view('jadwal_kuliah/confirm_delete', compact('hasil'));
    }

    public function delete($id){
        $this->mod_jadkul->delete($id);
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus');
        redirect('jadwal_kuliah');
    }
}

?>