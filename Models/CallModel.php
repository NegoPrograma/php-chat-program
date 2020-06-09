<?php

class CallModel extends Model {
    
    public function updateLastMessage($callId,$area){

        if(!empty($callId) && !empty($area)){
            $lastRead;
            if($area == 'suporte'){
                $lastRead = 'last_time_read_by_support';
            }
            else{
                $lastRead = 'last_time_read_by_customer';
            }
            $stmt = "UPDATE calls
            SET ".$lastRead." = NOW() where id = '{$callId}' ";
            $this->db->query($stmt);
        }
    }
    
    public function getLastMessage($callId,$area){
        $lastMessage;
        if(!empty($callId) && !empty($area)){
            if($area == 'suporte'){
                $lastRead = 'last_time_read_by_support';
            }
            else{
                $lastRead = 'last_time_read_by_customer';
            }
            $stmt = "SELECT ".$lastRead." as lm FROM calls WHERE id = '{$callId}'";
            $result = $this->db->query($stmt);
            if($result->rowCount() > 0){
                $result = $result->fetch();
                $lastMessage = $result['lm'];
            }
            return $lastMessage;
        }
    }
    public function addCall($name,$ip){
        $stmt= "INSERT INTO calls (name,ip,start_time) VALUES ('{$name}','{$ip}',NOW())";
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