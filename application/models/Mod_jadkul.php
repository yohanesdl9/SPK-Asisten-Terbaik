<?php 
class Mod_jadkul extends CI_Model{
    public function fetchAll(){
        $bulan = date('m');
        $tahun = date('Y');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        return $this->db->where('semester', $semester)->where('tahun_ajaran', $tahun_ajaran)->get('view_jadwal_kuliah')->result();
    }

    public function fetch($kode_kelas){
        return $this->db->where('kode_kelas', $kode_kelas)->get('jadwal_kuliah');
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

    public function delete($kodemk){
        return $this->db->where('kode_kelas', $kodemk)->delete('jadwal_kuliah');
    }

    function cek_benturan_ruang($kode_kelas, $ruang, $hari, $jam_mulai, $jam_selesai){
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $query = "SELECT * FROM view_jadwal_kuliah WHERE kode_kelas <> '$kode_kelas' AND koderuang = '$ruang' AND hari = $hari 
        AND (((jam_mulai < '$jam_mulai' AND jam_selesai > '$jam_mulai') OR (jam_mulai < '$jam_selesai' AND jam_selesai > '$jam_selesai')) 
        OR (jam_mulai = '$jam_mulai' AND jam_selesai = '$jam_selesai')) AND tahun_ajaran = '$tahun_ajaran' AND semester = '$semester'";
        return $this->db->query($query)->num_rows();
    }
}
?>