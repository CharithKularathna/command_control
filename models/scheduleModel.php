<?php
class ScheduleModel extends Model{

    //Singleton
    
    private static $_scheduleModel;
    public static function getModelInstance(){
        if(self::$_scheduleModel !== null){
            return self::$_scheduleModel;
        }
        else{
            return self::$_scheduleModel = new ScheduleModel();
        }
    }

    public function index(){
        

    }
}



?>