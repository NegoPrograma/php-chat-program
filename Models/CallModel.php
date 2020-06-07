<?php

class CallModel extends Model {
    
    public function fetchCalls(){
        $stmt = "SELECT * FROM calls WHERE status IN (0,1)";
        $sql = $this->db->query($stmt);
        $result=$sql->fetchAll();
        return $result;

    }
}