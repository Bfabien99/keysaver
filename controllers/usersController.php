<?php

    require 'models/usersModel.php';

    class usersController{

        public function checkLogin($pseudo, $password){
            $initModel = new usersmodel();
            $call = $initModel->checkLogin($pseudo, $password);
            return $call; 
        }
        
        public function getUserbyPseudo($pseudo){
            $initModel = new usersmodel();
            $call = $initModel->getUser($pseudo);
            return $call; 
        }

        public function getUserPassword($id){
            $initModel = new usersmodel();
            $call = $initModel->getAllPass($id);
            return $call; 
        }

    }