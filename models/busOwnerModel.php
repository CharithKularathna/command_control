<?php
class BusOwnerModel extends Model{

    private static $_busDetails = [];
    //Singleton
    private static $_busOwnerModel;
    public static function getModelInstance(){
        if(self::$_busOwnerModel !== null){
            return self::$_busOwnerModel;
        }
        else{
            return self::$_busOwnerModel = new BusOwnerModel();
        }
    }


    public function signIn(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = crypt($post['password'],'$W$bestsalteeeveeer@UoM7');
        if($post['submit']){
            $q = "SELECT * FROM ownerdata WHERE email = :email";
            $this->query($q);
            $this->bind(':email',$post['email']);

            $result = $this->result();
            
            
                if($result && $result['password'] == $password){
                    //Matching credentials

                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user'] = array(
                        'fname'=> $result['fname'],
                        'lname'=> $result['lname'],
                        'email' => $result['email'],
                        'id' => $result['id'],
                        'type' => 'busowner'
                    );
                    header('Location: '.ROOT_URL.'busowner/dashboard');
                }
                else{
                    //Invalid credentials
                    Messages::setMessage('Invalid Credentials. Please, re-enter.','error');
                }
        }
    }

    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = crypt($post['password'],'$W$bestsalteeeveeer@UoM7');

        if($post['submit']){
            $this->query('SELECT * FROM ownerdata WHERE email = :email');
            $this->bind(':email',$post['email']);
            $result = $this->result();
            
            if ($result){
                //Email already exists
                Messages::setMessage('An account already exists for the given e-mail.','error');
            }

            //If email doesn't exist
            else{
                $this->query('INSERT INTO ownerdata (fname, lname, email, address, password, nic, contact) VALUES (:fname,:lname,:email,:address,:password,:nic,:contact)');
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
                    header('Location: '.ROOT_URL.'busowner/signin');
                }
            }
            
        }
    }

    public function dashboard(){
        return;
    }

    private function createAccount(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('INSERT INTO owneracc (email, balance) VALUES (:email, :balance)');
        $this->bind(':email',$post['email']);
        $this->bind(':balance',0);
        $this->execute();
    }

    public function balance(){
        if (!($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'busowner/signin');
            Messages::setMessage('Sign-in first.','error');
        }
        else{
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('SELECT * FROM owneracc WHERE email = :email');
            $this->bind(':email',$_SESSION['user']['email']);
            $result = $this->resultSet();
            $this->balanceRes = $result[0];
        }
    }

    public function registerbus(){
        if (!($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'busowner/signin');
            Messages::setMessage('Sign-in first.','error');
        }
        else{
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($post['submit']){
                setcookie('bn',$post['bn'], time() + (86400 * 30), "/");
                setcookie('route', $post['route'], time() + (86400 * 30), "/");
                setcookie('bustype', $post['bustype'], time() + (86400 * 30), "/");
                //self::$_busDetails['bn'] = $post['bn'];
                //self::$_busDetails['route'] = $post['route'];
                //self::$_busDetails['bustype'] = $post['bustype'];
                $this->query('SELECT * FROM routes WHERE routenum = :routenum');
                $this->bind(':routenum', $post['route']);
                $results = $this->resultSet();
                print_r($results);
                setcookie('start', $results[0]['start'], time() + (86400 * 30), "/");
                setcookie('destination', $results[0]['destination'], time() + (86400 * 30), "/");
                setcookie('duration', $results[0]['duration'], time() + (86400 * 30), "/");
                //self::$_busDetails['start'] = $results[0]['start'];
                //self::$_busDetails['destination'] = $results[0]['destination'];
                //self::$_busDetails['duration'] = $results[0]['duration'];
                
                header('Location: '.ROOT_URL.'busowner/registerbustwo');
            
            }

        }
    }

    public static function getBusDetails(){
        return self::$_busDetails;
    }

    public function registerbustwo(){
        if (!($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'busowner/signin');
            Messages::setMessage('Sign-in first.','error');
        }
        else{
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($post['submit']){
                $this->firstBusEntry();
                $this->secondBusEntry();
                //Redirect to dashboard
            }
        
        }
    }

    //Facade Design Pattern
    private function firstBusEntry(){
        if($_COOKIE['bustype']=='50'){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('INSERT INTO busreg (email, busnum, rnum, startpoint, destination, fromtime, available, seat) VALUES (:email, :busnum, :rnum, :startpoint, :destination, :fromtime, :available, :seat)');
            $this->bind(':email',$_SESSION['user']['email']);
            $this->bind(':busnum',$_COOKIE['bn']);
            $this->bind(':rnum',$_COOKIE['route']);
            $this->bind(':startpoint',$_COOKIE['start']);
            $this->bind(':fromtime',$post['time1']);
            $this->bind(':destination',$_COOKIE['destination']);
            $this->bind(':available','yes');
            $this->bind(':seat','00000000000000000000000000000000000000000000000000');
            $this->execute();
        }

        if($_COOKIE['bustype']=='32'){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('INSERT INTO thirtybusreg (email, busnum, rnum, startpoint, destination, fromtime, available, seat) VALUES (:email, :busnum, :rnum, :startpoint, :destination, :fromtime, :available, :seat)');
            $this->bind(':email',$_SESSION['user']['email']);
            $this->bind(':busnum',$_COOKIE['bn']);
            $this->bind(':rnum',$_COOKIE['route']);
            $this->bind(':startpoint',$_COOKIE['start']);
            $this->bind(':fromtime',$post['time1']);
            $this->bind(':destination',$_COOKIE['destination']);
            $this->bind(':available','yes');
            $this->bind(':seat','00000000000000000000000000000000');
            $this->execute();
        }
    }


    private function secondBusEntry(){
        if($_COOKIE['bustype']=='50'){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('INSERT INTO busreg (email, busnum, rnum, startpoint, destination, fromtime, available, seat) VALUES (:email, :busnum, :rnum, :startpoint, :destination, :fromtime, :available, :seat)');
            $this->bind(':email',$_SESSION['user']['email']);
            $this->bind(':busnum',$_COOKIE['bn']);
            $this->bind(':rnum',$_COOKIE['route']);
            $this->bind(':startpoint',$_COOKIE['destination']);
            $this->bind(':fromtime',$post['time2']);
            $this->bind(':destination',$_COOKIE['start']);
            $this->bind(':available','yes');
            $this->bind(':seat','00000000000000000000000000000000000000000000000000');
            $this->execute();
            if ($this->lastInsertId()){
                header('Location: '.ROOT_URL.'busowner/dashboard');
            }
        }

        if($_COOKIE['bustype']=='32'){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('INSERT INTO thirtybusreg (email, busnum, rnum, startpoint, destination, fromtime, available, seat) VALUES (:email, :busnum, :rnum, :startpoint, :destination, :fromtime, :available, :seat)');
            $this->bind(':email',$_SESSION['user']['email']);
            $this->bind(':busnum',$_COOKIE['bn']);
            $this->bind(':rnum',$_COOKIE['route']);
            $this->bind(':startpoint',$_COOKIE['destination']);
            $this->bind(':fromtime',$post['time2']);
            $this->bind(':destination',$_COOKIE['start']);
            $this->bind(':available','yes');
            $this->bind(':seat','00000000000000000000000000000000');
            $this->execute();
            if ($this->lastInsertId()){
                header('Location: '.ROOT_URL.'busowner/dashboard');
            }
        }
    }

}
?>