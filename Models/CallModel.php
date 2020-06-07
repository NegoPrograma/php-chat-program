<?php

class CallModel extends Model {
    
    public function addCall($name,$ip,$time){
        $stmt= "INSERT INTO calls (name,ip,start_time) VALUES ({$name},{$ip},{$time})";
        $this->db->query($stmt);
        return $this->db->lastInsertId();
    }

    public function fetchCallName($id){
        if(!empty($id)){
            $stmt = "SELECT * FROM calls WHERE id = {$id}";
            $result = $this->db->query($stmt)->fetch();
            return $result['name'];
        }
    }
    public function fetchCalls(){
        $stmt = "SELECT * FROM calls WHERE status IN (0,1)";
        $sql = $this->db->query($stmt);
        $result= $sql->fetchAll();
        return $result;

    }

    public function statusUpdate($id,$status){
        if(!empty($id) && !empty($status)){
            $stmt= "UPDATE calls SET status = {$status} WHERE id = {$id}";
            $this->db->query($stmt);
        }
    }
}