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

    public function insert($kode_kelas, $asisten_1, $asisten_2 = ''){
        if ($asisten_2 == ''){
            $data = array(
                'kode_kelas' => $kode_kelas,
                'nrp_1' => $asisten_1
            );
        } else {
            $data = array(
                'kode_kelas' => $kode_kelas,
                'nrp_1' => $asisten_1,
                'nrp_2' => $asisten_2
            );
        }
        $this->db->insert('jadwal_asisten', $data);
    }

    public function update($kode_kelas, $asisten_1, $asisten_2 = ''){
        if ($asisten_2 == ''){
            $data = array(
                'kode_kelas' => $kode_kelas,
                'nrp_1' => $asisten_1
            );
        } else {
            $data = array(
                'kode_kelas' => $kode_kelas,
                'nrp_1' => $asisten_1,
                'nrp_2' => $asisten_2
            );
        }
        $this->db->where('kode_kelas', $kode_kelas)->update('jadwal_asisten', $data);
    }
    function cek_benturan_asisten($kode_kelas, $asisten, $hari, $jam_mulai, $jam_selesai){
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_ajaran = $bulan <= 7 ? ($tahun - 1) . "/" . $tahun : $tahun . "/" . ($tahun + 1);
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        $query = "SELECT * FROM view_jadwal_asisten WHERE kode_kelas <> '$kode_kelas' AND (asisten_1 = '$asisten' OR asisten_2 = '$asisten') AND hari = $hari 
        AND (((jam_mulai < '$jam_mulai' AND jam_selesai > '$jam_mulai') OR (jam_mulai < '$jam_selesai' AND jam_selesai > '$jam_selesai')) 
        OR (jam_mulai = '$jam_mulai' AND jam_selesai = '$jam_selesai')) AND tahun_ajaran = '$tahun_ajaran' AND semester = '$semester'";
        echo $query;
        return $this->db->query($query)->num_rows();
    }
}
?>