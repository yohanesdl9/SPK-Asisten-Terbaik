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

    public function insert($kode_kelas, $avg_kelas, $jumlah_A, $jumlah_B_plus, $jumlah_B, $jumlah_C_plus, $jumlah_C, $jumlah_D, $jumlah_E){
        $data = array(
            'kode_kelas' => $kode_kelas,
            'avg_kelas' => $avg_kelas,
            'jumlah_A' => $jumlah_A,
            'jumlah_B_plus' => $jumlah_B_plus,
            'jumlah_B' => $jumlah_B,
            'jumlah_C_plus' => $jumlah_C_plus,
            'jumlah_C' => $jumlah_C,
            'jumlah_D' => $jumlah_D,
            'jumlah_E' => $jumlah_E
        );
        $this->db->insert('detail_nilai', $data);
    }

    public function update($kode_kelas, $avg_kelas, $jumlah_A, $jumlah_B_plus, $jumlah_B, $jumlah_C_plus, $jumlah_C, $jumlah_D, $jumlah_E){
        $data = array(
            'avg_kelas' => $avg_kelas,
            'jumlah_A' => $jumlah_A,
            'jumlah_B_plus' => $jumlah_B_plus,
            'jumlah_B' => $jumlah_B,
            'jumlah_C_plus' => $jumlah_C_plus,
            'jumlah_C' => $jumlah_C,
            'jumlah_D' => $jumlah_D,
            'jumlah_E' => $jumlah_E
        );
        $this->db->where('kode_kelas', $kode_kelas)->update('detail_nilai', $data);
    }
}
?>