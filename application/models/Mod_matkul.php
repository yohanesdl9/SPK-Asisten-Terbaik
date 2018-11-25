<?php 
class Mod_matkul extends CI_Model{
    public function fetchAll(){
        $bulan = date('m');
        $semester = ($bulan >= 2 && $bulan <= 7) ? 'Genap' : 'Ganjil';
        return $this->db->where('semester', $semester)->get('matakuliah')->result();
    }

    public function fetchMatkul($kodemk){
        return $this->db->where('kodemk', $kodemk)->get('matakuliah')->row();
    }

    public function insert(){
        $data = array(
            'kodemk' => $kodemk, 
            'namamk' => $namamk, 
            'sks' => $sks, 
            'semester' => $semester, 
            'tipe' => $tipe
        );
        $this->db->insert('matakuliah', $data);
    }

    public function update(){
        $data = array(
            'kodemk' => $kodemk, 
            'namamk' => $namamk, 
            'sks' => $sks, 
            'semester' => $semester, 
            'tipe' => $tipe
        );
        $this->db->where('kodemk', $old_kodemk)->update('matakuliah', $data);
    }

    public function delete($kodemk){
        return $this->db->where('kodemk', $kodemk)->delete('matakuliah');
    }
}
?>