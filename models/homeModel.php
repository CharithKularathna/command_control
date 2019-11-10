<?php
class HomeModel extends Model{
    //Singleton
    private static $_homeModel;
    public static function getModelInstance(){
        if(self::$_homeModel !== null){
            return self::$_homeModel;
        }
        else{
            return self::$_homeModel = new HomeModel();
        }
    }

    //Methods for HomeModel Object

    public function index(){
        return;    
    }

}
?>