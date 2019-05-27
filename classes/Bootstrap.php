<?php
class BootStrap{
    private $controller;
    private $action;
    private $request;

    public function __construct($request){
        $this->request = $request;
        if($this->request['controller']==""){
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if($this->request['action']==""){
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }

    public function createController(){

        if(class_exists($this->controller)){   
            $parents = class_parents($this->controller);      //Argument can be given using class name as a string or as an object of the class.
            //Check whether Extended
            if (in_array("Controller",$parents)){
                if(method_exists($this->controller,$this->action)){
                    return new $this->controller($this->action,$this->request);    //Refers to the concrete object class by $this->controller();
                }
                else{
                    echo "METHOD DOES NOT EXIST";
                    return;
                }
            }else{
                echo "BASE CONTROLLER DOES NOT EXIST";
                return;
            }
        
        }else{
            echo "CONTROLLER CLASS DOES NOT EXIST";
            return;
        }

    }
        
}
    

 
?>