<?php


class HomeController extends Controller {

    /**
     * 
     */
    private $data = array();

    
    public function index(){
    
        $this->loadTemplate("home",$this->data);
    }

    public function fotos(){
        $pictures = new PictureModel();
        $this->data = $pictures->getPictures();
        
        $this->loadTemplate("fotos",$this->data);
    }

    public function sobre(){
        $this->loadTemplate('sobre',$this->data);
    }
    
};