<?php

    class managersModel{

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

        public function add($id,$account,$key,$reference)
        {
            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO manager SET reference = :reference, account = :account, code = :code, user_id = :user_id");
            $result = $query->execute([
                'user_id' => (int)$id,
                'account' => $account,
                'code' => $key,
                'reference' => $reference
            ]);

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function delete($reference){
            $db = $this->database_connect();
            $query = $db->prepare('DELETE FROM manager WHERE reference = '.'"'.$reference.'"');
            $result = $query->execute();
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }
        }

        public function update($account,$key,$reference,$identifiant)
        {
            $db = $this->database_connect();
            $query = $db->prepare("UPDATE manager SET reference = :reference, account = :account, code = :code WHERE reference = :identifiant");
            $result = $query->execute([
                'account' => $account,
                'code' => $key,
                'reference' => $reference,
                'identifiant' => $identifiant
            ]);

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function get($reference){
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM manager WHERE reference = :reference");
            $query->execute([
                'reference' => $reference
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

        public function search($id,$value){
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM `manager` WHERE `user_id` = $id AND (`reference` LIKE '%$value%' OR `account` LIKE '%$value%')");
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