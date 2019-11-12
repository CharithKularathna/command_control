<?php
class Passenger extends Controller{
    
    protected function register(){
        //Redirect to Model
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->register(),false);    
    }
    protected function signIn(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->signIn(),false);
    }
    protected function dashboard(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->dashboard(),false);
    }
    protected function balance(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->balance(),false);
        new dashTopNav();
        new passengerSideNav();
        new balanceDiv($viewmodel->balanceRes);
    }
    protected function deposit(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->deposit(),false);
        new dashTopNav();
        new passengerSideNav();
        new depositForm();
    }

    protected function bookseat(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->bookseat(),false);
        new dashTopNav();
        new passengerSideNav();
        new bookSeatForm();
        new resultBar($viewmodel);

    }
    protected function bookseatfinal(){
        $viewmodel = PassengerModel::getModelInstance();
        $this->returnView($viewmodel->bookseatfinal(),false);
        //new dashTopNav();
        //new passengerSideNav();
    }



    

}
?>