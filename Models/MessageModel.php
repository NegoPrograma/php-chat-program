
<?php

class MessageModel extends Model {

    public function getMessages($callid,$lastmsg){
        $result = array();

        $stmt = "SELECT * FROM messages 
        WHERE call_id = '{$callid}'
        AND send_time > '{$lastmsg}'";

        $sql = $this->db->query($stmt);

        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }
        $callModel = new CallModel();
        $area = $_SESSION['area'];
        $callModel->updateLastMessage($callid,$area);
        return $result;



    }
    //id 	call_id 	message 	origin 	send_time 	
    public function sendMessage($callid,$origin,$msg){
        if(!empty($callid) && !empty($msg)){
           
            $stmt = "INSERT INTO messages 
            SET call_id = '{$callid}',
            message = '{$msg}',
            origin = '{$origin}',
            send_time = NOW()";

            $this->db->query($stmt);
        }
    }

}


?>