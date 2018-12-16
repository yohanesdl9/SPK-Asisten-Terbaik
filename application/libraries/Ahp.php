<?php 

class Ahp{
    var $rc_index = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51);

    public function process($pairwise_matrix){
        $sum_cols = $this->sumEachColumn($pairwise_matrix);
        for ($i = 0; $i < count($pairwise_matrix); $i++){
            for ($j = 0; $j < count($pairwise_matrix[0]); $j++){
                $pairwise_matrix[$i][$j] /= $sum_cols[$j];
            }
        }
        $eigen_vectnor = array(0, 0, 0, 0);
        for ($i = 0; $i < count($pairwise_matrix); $i++){
            for ($j = 0; $j < count($pairwise_matrix[0]); $j++){
                $eigen_vectnor[$i] += $pairwise_matrix[$i][$j];
            }
        }
        for ($i = 0; $i < count($eigen_vectnor); $i++){
            $eigen_vectnor[$i] /= 4;
        }
        return array(
            'sum_cols' => $sum_cols,
            'pairwise_matrix' => $pairwise_matrix,
            'CR' => $this->checkConsistency($sum_cols, $eigen_vectnor),
            'bobot' => $eigen_vectnor
        );
    }

    public function checkConsistency($sum_cols, $eigen_vectnor){
        $eigen_max = 0;
        for ($i = 0; $i < count($eigen_vectnor); $i++){
            $eigen_max += ($sum_cols[$i] * $eigen_vectnor[$i]);
        }
        $consistency_idx = ($eigen_max - 4)/3;
        return $consistency_idx/$this->rc_index[3];
    }

    public function sumEachColumn($pairwise_matrix){
        $sum_cols = array(0, 0, 0, 0);
        for ($i = 0; $i < count($pairwise_matrix); $i++){
            for ($j = 0; $j < count($pairwise_matrix[0]); $j++){
                $sum_cols[$i] += $pairwise_matrix[$j][$i];
            }
        }
        return $sum_cols;
    }
}

?>