<?php 
class Mod_asisten extends CI_Model{
    public function fetchAll(){
        return $this->db->get('asisten_dosen')->result();
    }

    public function fetchAsisten($nrp){
        return $this->db->where('nrp', $nrp)->get('asisten_dosen')->row();
    }

    public function insert($nrp, $nama, $jk, $alamat, $telepon, $jabatan, $nilai_disiplin){
        $data = array(
            'nrp' => $nrp, 
            'nama' => $nama, 
            'jk' => $jk,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jabatan' => $jabatan,
            'nilai_disiplin' => $nilai_disiplin
        );
        $this->db->insert('asisten_dosen', $data);
    }

    public function update($old_nrp, $new_nrp, $nama, $jk, $alamat, $telepon, $nilai_disiplin){
        $data = array(
            'nrp' => $new_nrp, 
            'nama' => $nama, 
            'jk' => $jk,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'nilai_disiplin' => $nilai_disiplin
        );
        $this->db->where('nrp', $old_nrp)->update('asisten_dosen', $data);
    }

    public function delete($nrp){
        return $this->db->where('nrp', $nrp)->delete('asisten_dosen');
    }
}
?>