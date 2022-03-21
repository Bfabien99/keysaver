<?php

    class usersModel{

        public function database_connect()
        {
            $dsn="mysql:dbname=passwordmanager;host=localhost";
            $password = "";
            $user = "root";

            $connect = new PDO($dsn,$user,$password,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);

            if (!$connect) 
            {
                return new \Exception("Database cannot connect");
            }
            else
            {   
                return $connect;
            }
        }

        public function checkLogin($pseudo, $password)
        {
            $db = $this->database_connect();
            $query = $db->prepare('SELECT id, pseudo, password FROM users WHERE pseudo = '.'"'.$pseudo.'"'.' AND password = '.'"'.$password.'"');
            $query->execute();
            $result = $query->fetch();
            
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function getUser($pseudo)
        {
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
            $query->execute([
                'pseudo' => $pseudo
            ]);
            $result = $query->fetch();
            
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function getAllPass($id){
            $db = $this->database_connect();
            $query = $db->prepare('SELECT * FROM users INNER JOIN manager ON users.id = manager.user_id WHERE manager.user_id = '.$id);
            $query->execute();
            $result = $query->fetchAll();

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }
        }

    }