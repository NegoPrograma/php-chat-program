<?php


class SuporteController extends Controller {

    /**
     * 
     */
    private $data = array();

    public function __construct(){
        $_SESSION['area']  =  'suporte';
    }

    
    public function index(){
    
        $this->loadTemplate("suporte",$this->data);
    }

   
};