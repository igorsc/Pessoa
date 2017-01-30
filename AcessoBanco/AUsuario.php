<?php
class Conexao2{
public $server='127.0.0.1';
public $user='root';
public $senha='';
public $db='Pessoa';


//public function __construct($server, $user, $senha, $db) {
//    $this->server = $server;
//    $this->user = $user;
//    $this->senha = $senha;
//    $this->db = $db;
//}






public function Conectar() {


     
      //$link= mysql_connect($this->server,$this->user,$this->senha) or die (mysql_error());
          
       //mysql_select_db($this->db) or die (mysql_error());
      
        //$link= mysqli_connect($this->server,$this->user,$this->senha,$this->db)or   die("Não foi possivel conectar ao servidor e ao banco! ".  mysqli_connect_error());

      $server='127.0.0.1';
      $user='root';
      $senha='';
      $db='Pessoa';

      try {
          
          $link = new PDO('mysql:host='.$server.';dbname='.$db,$user,$senha);

          return $link;

      } catch (PDOException $e) {
         echo 'Conection falied database :'.$e->getMessage();
      }
    

 
}



}
  

?>













<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AUsuario
 *
 * @author Igor
 */


class AUsuario extends Conexao2 {
    //put your code here
    
     public function Update($login,$senha,$id ){
       try { 
            
//             $conn = new PDO("mysql:host=".$this->server.";dbname=".$this->database, $this->username, $this->password);
           
            $conn = new Conexao2();
            $conectar =$conn->Conectar();
            
            if ($conectar==null) {
                throw new Exception("Não foi possivel conectar ao banco de dados");
            }else {
                
                //mysqli_query($conectar,"Update  Usuario Set Login='$login', Senha='$senha', 
                       //Where Id= '$id';");       
                
                $conectar->query("Update  Usuario Set Login='$login', Senha='$senha' Where Id= '$id';");

            }
         
          
           
       } catch (PDOException $exc) {
           echo "Error:".$exc->getMessage();
        }

      
       
   }
  
    
    public function Insert($login,$senha){
        try {
            
           //$conn = new PDO("mysql:host=".$this->server.";dbname=".$this->database , $this->username, $this->password);
           
              $conn = new Conexao2();
             $conectar =$conn->Conectar();
              
               if ($conectar ==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
               }else {
                   
                     //mysqli_query($conectar,"Insert Into Usuario (Login,Senha) values('$login','$senha');");
                     
                      $conectar->query("Insert Into Usuario (Login,Senha) values('$login','$senha');"); 
               } 
            
            
              
                    
                      
           
        } catch (PDOException $ex) {
            echo "Error:".$ex->getMessage();
        }
        
        
    }
    
    
    public function GetData() {
        try {
              $conn = new Conexao2();
               $conectar =$conn->Conectar();
              
              if ( $conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else {
        
                 //$list=  mysqli_query($conectar,"Select * from Usuario");
                 $list= $conectar->query("Select * from Usuario");
                 return $list; 
               
              }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

     
    }
    
    
      public function GetById($id) {
        
          try {
                $conn = new Conexao2();
                $conectar =$conn->Conectar();
              
              if ($conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else  {
        
                  //$query_id= mysqli_query($conectar,"Select Login,Senha From Usuario 
                          //Where Id = '$id' ;");

                  $query_id=$conectar->query("Select Login,Senha From Usuario Where Id = '$id' ;");
               
                  return $query_id;
              }
              
          } catch (PDOException $exc) {
              echo $exc->getMessage();
          }

        
    }
    
    
    public function Delete($id) {
        
        try {
               $conn = new Conexao2();
               $conectar =$conn->Conectar();
              
              if ($conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else if ($id>0){
        
                 //mysqli_query($conectar,"Delete from Usuario where Id='$id' ;");
                $conectar->query("Delete from Usuario where Id='$id' ;");
                 echo "<div class='text-center'><label class='alert alert-success alert-dismissible fade in' role='alert'><h3>Deletado com sucesso!</h3></label></div>"; 
              
              }else {
                 echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Não foi possivel deletar!</h3></label></div>"; 
              }
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        
    }

     public function GetConectar(){
         
         try {
              $con = new Conexao2();
               $con->Conectar();
               
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }

        
                 
     }
}
