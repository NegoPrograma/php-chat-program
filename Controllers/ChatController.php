<?php


class ChatController extends Controller {

    /**
     * 
     */
    private $data = array();

    public function __construct(){
    }

    
    public function index(){
     
        $callModel = new CallModel();
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes(substr($_GET['id'],32));
            $callModel->statusUpdate($id,'1');
            $_SESSION['chatwindow'] = $id;
            $_SESSION['id_list'][] = $id;
        }
        elseif(isset($_POST['name']) && !empty($_POST['name'])){
            $name = addslashes($_POST['name']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $_SESSION['chatwindow'] = $callModel->addCall($name,$ip);
        }        
        elseif((!isset($_SESSION['chatwindow']) || empty($_SESSION['chatwindow']))){
            $this->loadTemplate('newcall',$this->data);
            exit;
        }


        
        $callId =  $_SESSION['chatwindow'];
        $this->data['name'] = $callModel->fetchCallName($callId);
        $this->loadTemplate("chat",$this->data);
    }

    
};