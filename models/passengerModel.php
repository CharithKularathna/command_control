<?php
class PassengerModel extends Model{

    //Singleton
    public $balanceRes;
    private static $_passengerModel;
    public static function getModelInstance(){
        if(self::$_passengerModel !== null){
            return self::$_passengerModel;
        }
        else{
            return self::$_passengerModel = new PassengerModel();
        }
    }

    //Methods for the passengerModel Object (Object is returned/created using singleton pattern)

    public function signIn(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = crypt($post['password'],'$W$bestsalteeeveeer@UoM7');
        if($post['submit']){
            $q = "SELECT * FROM passengerdata WHERE email = :email";
            $this->query($q);
            $this->bind(':email',$post['email']);

            $result = $this->result();
            
            
                if($result && $result['password'] == $password){
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user'] = array(
                        'fname'=> $result['fname'],
                        'lname'=> $result['lname'],
                        'email' => $result['email'],
                        'id' => $result['id'],
                        'type' => 'passenger'
                    );
                    header('Location: '.ROOT_URL.'passenger/dashboard');
                }
                else{
                    Messages::setMessage("Invalid Credentials. Please, re-enter.","error");
                }
        }
    }

    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = crypt($post['password'],'$W$bestsalteeeveeer@UoM7');

        if($post['submit']){
            $this->query('SELECT * FROM passengerdata WHERE email = :email');
            $this->bind(':email',$post['email']);
            $result = $this->result();
            
            if ($result){
                //Email already exists
                Messages::setMessage('An account already exists for the given e-mail.','error');
            }

            //If email doesn't exist
            else{
                $this->query('INSERT INTO passengerdata (fname, lname, email, address, password, nic, contact) VALUES (:fname,:lname,:email,:address,:password,:nic,:contact)');
                $password = crypt($post['password'],'$W$bestsalteeeveeer@UoM7');
                $this->bind(':fname',$post['fname']);
                $this->bind(':lname',$post['lname']);
                $this->bind(':email',$post['email']);
                $this->bind(':address',$post['address']);
                $this->bind(':password',$password);
                $this->bind(':nic',$post['nic']);
                $this->bind(':contact',$post['contact']);
                $this->execute();
                

                if ($this->lastInsertId()){
                    $this->createAccount();
                    header('Location: '.ROOT_URL.'passenger/signin');
                }
            }
            
        }
    }

    public function dashboard(){
        return;
    }

    //Store account balance and related info in a separate table. (Primary Key: email)
    private function createAccount(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('INSERT INTO passengeracc (email, balance) VALUES (:email, :balance)');
        $this->bind(':email',$post['email']);
        $this->bind(':balance',0);
        $this->execute();
    }

    public function balance(){
        if (!($_SESSION['is_logged_in'])){
            Messages::setMessage('Sign-in first.','error');
            header('Location: '.ROOT_URL.'passenger/signin');
            
        }
        else{
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('SELECT * FROM passengeracc WHERE email = :email');
            $this->bind(':email',$_SESSION['user']['email']);
            $result = $this->resultSet();
            $this->balanceRes = $result[0];
        }
    }

    public function deposit(){
        if (!($_SESSION['is_logged_in'])){
            Messages::setMessage('Sign-in first.','error');
            header('Location: '.ROOT_URL.'passenger/signin');  
        }
        else{
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($post['submit']){
                $this->query('SELECT * FROM passengeracc WHERE email = :email');
                $this->bind(':email',$_SESSION['user']['email']);
                $result = $this->resultSet();
                $balance = $result[0]['balance'];
                $this->changeBalance($balance);
                header('Location: '.ROOT_URL);
            }
        }
    }

    private function changeBalance($balance){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('UPDATE passengeracc SET balance = :newbalance WHERE email = :email');
        $this->bind(':email',$_SESSION['user']['email']);
        $newbalance = $balance + $post['amount'];
        $this->bind(':newbalance',$newbalance);
        $this->execute();
    }



}
?>