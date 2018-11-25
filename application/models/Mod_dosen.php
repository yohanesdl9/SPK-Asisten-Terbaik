<?php 
class Mod_dosen extends CI_Model{
    public function fetchAll(){
        return $this->db->get('dosen')->result();
    }

    public function fetchDosen($nip){
        return $this->db->where('nip', $nip)->get('dosen')->row();
    }

    public function insert($nip, $nama_dosen, $jk, $alamat, $telepon, $email){
        $data = array(
            'nip' => $nip,
            'nama_dosen' => $nama_dosen,
            'jk' => $jk,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email . '@stiki.ac.id'
        );
        $this->db->insert('dosen', $data);
    }

    public function update($old_nip, $nip, $nama_dosen, $jk, $alamat, $telepon, $email){
        $data = array(
            'nip' => $nip,
            'nama_dosen' => $nama_dosen,
            'jk' => $jk,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email . '@stiki.ac.id'
        );
        $this->db->where('nip', $old_nip)->update('dosen', $data);
    }

    public function delete($nip){
        return $this->db->where('nip', $nip)->delete('dosen');
    }
}
?>