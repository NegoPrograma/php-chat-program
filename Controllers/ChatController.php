<?php


class ChatController extends Controller {

    /**
     * 
     */
    private $data = array();

    public function __construct(){
    }

    
    public function index(){
    
        $this->loadTemplate("chat",$this->data);
    }

    
};