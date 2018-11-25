<?php 
class Mod_ruang extends CI_Model{
    public function fetchAll(){
        return $this->db->get('ruang')->result();
    }

    public function fetchRuang($koderuang){
        return $this->db->where('koderuang', $koderuang)->get('ruang')->row();
    }

    public function insert($koderuang, $nama_ruang, $kapasitas){
        $data = array(
            'koderuang' => $koderuang,
            'nama_ruang' => $nama_ruang,
            'kapasitas' => $kapasitas
        );
        $this->db->insert('ruang', $data);
    }

    public function update($old_koderuang, $koderuang, $nama_ruang, $kapasitas){
        $data = array(
            'koderuang' => $koderuang,
            'nama_ruang' => $nama_ruang,
            'kapasitas' => $kapasitas
        );
        $this->db->where('koderuang', $old_koderuang)->update('ruang', $data);
    }

    public function delete($koderuang){
        return $this->db->where('koderuang', $koderuang)->delete('ruang');
    }
}
?>