<?php
//Bridge Pattern : Controller acts as a bridge between Models and Views. 
abstract class Controller{
    protected $request;
    protected $action;

    public function __construct($action,$request){
        $this->request = $request;
        $this->action = $action;
    }

    public function executeAction(){
        return $this->{$this->action}();
    }

    protected function returnView($viewmodel,$fullview){
        $view = 'https://transmax-bus.herokuapp.com/views/'.get_class($this).'/'.$this->action.'.php';
        if($fullview){
            require('views/main.php');
        }else{
            require($view);
        }
    }

}