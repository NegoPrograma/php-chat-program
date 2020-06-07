<?php


class Core {//extends Controller{

    /**
     * currentController e Action
     * detem a string que dizem o nome atual do controller
     * que deve ser usado e a ação que deve ser chamada
     * pelo controller.
     */

    /**
     * método que inicia o ciclo MVC.
     */
    public function run(){

        //10 é o valor padrão para "index.php", ja PHP_SELF retorna a url inteira.
        $url = explode("index.php",$_SERVER["PHP_SELF"]);
        $url =  end($url);
        $params = array();
        
        if(!empty($url) && $url != '/'){
            $url = explode("/",$url);
            array_shift($url);

          $currentController = ucfirst($url[0]) ."Controller";

          if(isset($url[1])){
              $currentAction = $url[1];
            } else {
              $currentAction = "index";
            }
          if(count($url) > 2){
             $params = array_slice($url,2);
          }            

        } else {
          $currentController = "HomeController";
          $currentAction = "index";
        }

        //print_r($params);

        //require_once __DIR__.'./Controller.php';
        $c = new $currentController();
        //$c->$currentAction();
        /**
         * Call_user_func_array(
         * array($objetoInstanciado,$MétodoDesteObjetoEmString),
         * $parametros)
         * 
         * serve para conseguirmos invocar um método de uma classe
         * independente de seus parâmetros
         */
        call_user_func_array([$c,$currentAction],$params);

    }
    
}