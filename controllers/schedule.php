<?php
class Schedule extends Controller{
    protected function index(){
        $viewmodel = ScheduleModel::getModelInstance();
        $this->returnView($viewmodel->deposit(),true);

    }
} 

?>