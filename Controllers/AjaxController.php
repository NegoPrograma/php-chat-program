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
        echo json_encode($this->data);
    }

}