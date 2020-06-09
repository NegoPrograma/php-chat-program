<?php

class AjaxController extends Controller{

    public  $data;

    public function __construct(){
        parent::__construct();
    }

    public function sendmessage(){
        $messageModel =  new MessageModel();
        $origin;
        $callId;
        if(isset($_POST['msg']) && !empty($_POST['msg'])){
            
            $msg = addslashes($_POST['msg']);

            if(!isset($_POST['call_id']))
                $callId = $_SESSION['chatwindow'];
            else
                $callId = $_POST['call_id'];

            if($_SESSION['area'] == 'suporte')
                $origin = 0;
            else
                $origin = 1;
            
            $messageModel->sendMessage($callId,$origin,$msg);
        }
    }

    public function getmessages(){
        $messageModel = new MessageModel();
        $callModel = new CallModel();
        if(!isset($_POST['call_id']))
            $callId = $_SESSION['chatwindow'];
        else
            $callId = $_POST['call_id'];
            
        $lastmsg = $callModel->getLastMessage($callId,$_SESSION['area']);

        echo json_encode($messageModel->getMessages($callId,$lastmsg));

    }
    public function getcalls(){
        $this->data =   array();
        $calls =  new CallModel();
        $this->data['calls'] =$calls->fetchCalls();
        
       for($i = 0; $i < count($this->data['calls']);$i++){
            $this->data['calls'][$i]['true_id'] = $this->data['calls'][$i]['id'];
            $this->data['calls'][$i]['id'] = md5($this->data['calls'][$i]['id']);
            
       }
        echo json_encode($this->data);
    }

}