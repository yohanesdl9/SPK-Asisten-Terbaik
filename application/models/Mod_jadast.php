<?php 
class Mod_jadast extends CI_Model{
    public function fetchAll(){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        return $this->db->where('semester', $semester)->where('tahun_ajaran', $tahun_ajaran)->get('view_jadwal_asisten')->result();
    }

    public function fetchAllTanpaAsisten(){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        return $this->db->where('semester', $semester)->where('tahun_ajaran', $tahun_ajaran)->get('view_jadwal_tanpa_asisten');
    }

    public function fetch($kode_kelas){
        return $this->db->where('kode_kelas', $kode_kelas)->get('jadwal_asisten');
    }

    public function insert($kode_kelas){
        
    }

    public function update($old_kodekelas, $kodemk, $kelas, $hari, $nip, $jam_mulai, $jam_selesai, $kode_ruang, $tahun_ajaran, $jumlah_peserta){

    }
}
?>