<?php

    require 'models/managersModel.php';

    class managersController{

        public function addData($id,$account,$key,$reference){
            $initModel = new managersmodel();
            $call = $initModel->add($id,$account,$key,$reference);
            return $call; 
        }

        public function removeData($reference){
            $initModel = new managersmodel();
            $call = $initModel->delete($reference);
            return $call; 
        }

        public function updateData($account,$key,$reference,$identifiant){
            $initModel = new managersmodel();
            $call = $initModel->update($account,$key,$reference,$identifiant);
            return $call; 
        }

        public function getDatabyReference($reference){
            $initModel = new managersmodel();
            $call = $initModel->get($reference);
            return $call; 
        }

        public function searchData($id,$value){
            $initModel = new managersmodel();
            $call = $initModel->search($id,$value);
            return $call; 
        }

    }