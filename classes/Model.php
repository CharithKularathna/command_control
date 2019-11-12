<?php

    abstract class Model{
        
        //Abstract static method for singleton pattern 
        public abstract static function getModelInstance();
        

        private $dsn;

        private $dbh;
        private $error;
        private $statement;

        protected function __construct(){
            $this->dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;

            $options=array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh = new PDO($this->dsn,DB_USER,DB_PASSWORD,$options);
            }
            catch(PDOException $e) {
                $this->error = $e->getMessage();
                echo $e->getMessage();
                echo "exception caught";
            }
        }

        public function query($query){
            $this->statement = $this->dbh->prepare($query);
        }

        public function bind($param,$value,$type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->statement->bindValue($param,$value,$type);
            print_r($this->statement);
        }

        public function execute(){
            return $this->statement->execute();
        }

        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function lastInsertId(){
            return $this->dbh->lastInsertId();
        }

        public function result(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }

    }

?>