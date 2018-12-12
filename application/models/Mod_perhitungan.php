<?php 
class Mod_perhitungan extends CI_Model{
    public function insertKriteria($eigen_vectnor){
        $data = array(
            'bobot_disiplin' => $eigen_vectnor[0],
            'bobot_avg_lulus' => $eigen_vectnor[1],
            'bobot_avg_kelas' => $eigen_vectnor[2],
            'bobot_avg_nilai_A' => $eigen_vectnor[3]
        );
        if ($this->db->get('bobot_kriteria')->num_rows() > 0){
            $this->db->update('bobot_kriteria', $data);
        } else {
            $this->db->insert('bobot_kriteria', $data);
        }
    }

    public function hitungSolusiIdeal(){
        $alternatives = array();
        $alt = $this->db->get('view_solusi_ideal')->result();
        foreach($alt as $jd){
            $SIP = $jd->C1_P + $jd->C2_P + $jd->C3_P + $jd->C4_P;
            $SIN = $jd->C1_N + $jd->C2_N + $jd->C3_N + $jd->C4_N;
            $preferensi = array(
                'nrp' => $jd->nrp,
                'nama' => $jd->nama,
                'SIP' => $SIP,
                'SIN' => $SIN,
                'nilai_pref' => $SIN/($SIP + $SIN)
            );
            array_push($alternatives, $preferensi);
        }
        usort($alternatives, function($i, $j){
            $a = $i['nilai_pref'];
            $b = $j['nilai_pref'];
            if ($a == $b) return 0;
            elseif ($a < $b) return 1;
            else return -1;
        });
        return $alternatives;
    }
}
?>