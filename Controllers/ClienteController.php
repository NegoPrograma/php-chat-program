<?php


class ClienteController extends Controller {

    /**
     * 
     */
    private $data = array();

    public function __construct(){
        $_SESSION['area']  =  'cliente';
    }

    
    public function index(){
    
        $this->loadTemplate("cliente",$this->data);
    }

    
};