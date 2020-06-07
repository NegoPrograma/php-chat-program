<?php

class AjaxController extends Controller{

    public  $data;

    public function __construct(){
        parent::__construct();
    }
    public function getcalls(){
        $this->data =   array();
        $calls =  new CallModel();
        $this->data['calls'] =$calls->fetchCalls();
        
       for($i = 0; $i < count($this->data['calls']);$i++){
            $this->data['calls'][$i]['id'] = md5($this->data['calls'][$i]['id']);
       }
        echo json_encode($this->data);
    }

}