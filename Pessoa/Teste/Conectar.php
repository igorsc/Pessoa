<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Conectar{
    
    
    
    public function  Conectar(){
      
        
    }

    public function Conect($table){
    
        try{
            $con = new PDO("mysql:host=localhost;dbname=Pessoa",'root','');
           return  $con->query("Select * from ".$table."");
    
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        
       
    }

}