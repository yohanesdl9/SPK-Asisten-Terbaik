<?php 
class Mod_isinilai extends CI_Model{
    public function fetchAll(){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        return $this->db->where('semester', $semester)->where('tahun_ajaran', $tahun_ajaran)->get('view_detail_nilai')->result();
    }

    public function fetch($kode_kelas){
        return $this->db->where('kode_kelas', $kode_kelas)->get('detail_nilai');
    }

    public function fetchMatkul($kode_kelas){
        return $this->db->where('kode_kelas', $kode_kelas)->get('view_jadwal_kuliah');
    }

    public function insert($kodemk, $kelas, $hari, $nip, $jam_mulai, $jam_selesai, $kode_ruang, $tahun_ajaran, $jumlah_peserta){
        $tahun = explode('/', $tahun_ajaran);
        $data = array(
            'kode_kelas' => $kodemk . '-' . $kelas . '-' . $tahun[0],
            'kodemk' => $kodemk,
            'kelas' => $kelas,
            'hari' => $hari,
            'nip' => $nip,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'koderuang' => $kode_ruang,
            'tahun_ajaran' => $tahun_ajaran,
            'jumlah_peserta' => $jumlah_peserta 
        );
        $this->db->insert('jadwal_kuliah', $data);
    }

    public function update($old_kodekelas, $kodemk, $kelas, $hari, $nip, $jam_mulai, $jam_selesai, $kode_ruang, $tahun_ajaran, $jumlah_peserta){
        $tahun = explode('/', $tahun_ajaran);
        $data = array(
            'kode_kelas' => $kodemk . '-' . $kelas . '-' . $tahun[0],
            'kodemk' => $kodemk,
            'kelas' => $kelas,
            'hari' => $hari,
            'nip' => $nip,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'koderuang' => $kode_ruang,
            'tahun_ajaran' => $tahun_ajaran,
            'jumlah_peserta' => $jumlah_peserta 
        );
        $this->db->where('kode_kelas', $old_kodekelas)->update('jadwal_kuliah', $data);
    }
}
?>