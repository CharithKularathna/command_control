<?php
class Home extends Controller{
    //If signed in redirect to dashboard


    protected function index(){
        if ($_SESSION['is_logged_in']){
            //Should be modified to redirect according to user type

            header("Location: ".ROOT_URL.$_SESSION['user']['type'].'/dashboard');
        }
        else{
            $viewmodel = HomeModel::getModelInstance();
            $this->returnView($viewmodel->Index(),true);

        }
        
    }
    
    protected function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user']);
        session_destroy();
        //Redirect to Homepage

        header('Location: '.ROOT_URL);

    }
}
?>