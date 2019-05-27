<?php
class BusOwner extends Controller{
    protected function index(){
        
    }
    protected function register(){
        //Redirect to Model
        $viewmodel = BusOwnerModel::getModelInstance();;
        $this->returnView($viewmodel->register(),true);
    }
    protected function signIn(){
        //Redirect to Model
        $viewmodel = BusOwnerModel::getModelInstance();;
        $this->returnView($viewmodel->signIn(),true);
    }
    protected function dashboard(){
        //Redirect to Model
        $viewmodel = BusOwnerModel::getModelInstance();;
        $this->returnView($viewmodel->dashboard(),false);
    }
    protected function balance(){
        $viewmodel = BusOwnerModel::getModelInstance();
        $this->returnView($viewmodel->balance(),false);
        new dashTopNav();
        new busOwnerSideNav();
        new balanceDiv($viewmodel->balanceRes);
    }
    protected function deposit(){
        $viewmodel = BusOwnerModel::getModelInstance();
        $this->returnView($viewmodel->deposit(),false);
        new dashTopNav();
        new busOwnerSideNav();
    }
}
?>