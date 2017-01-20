<?php
class Conexao1{
public $server='localhost';
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
      
        $link= mysqli_connect($this->server,$this->user,$this->senha,$this->db) or  die("Não foi possivel conectar ao servidor e ao banco! ".  mysqli_connect_error());
            
        return $link;

 
}



}
  

?>







<?php
  
 


class APessoa extends Conexao1  {
    //put your code here
    
//  public $server='localhost' ;
//  public $username='root';
//  public $password='';
//  public $database='Pessoa';
    
  
  
   public function Update($nome,$data,$contato,$tipopessoa,$id ){
       try { 
            
//             $conn = new PDO("mysql:host=".$this->server.";dbname=".$this->database, $this->username, $this->password);
           
            $conn = new Conexao1();
            $conectar =$conn->Conectar();
            
            if ($conectar==null) {
                throw new Exception("Não foi possivel conectar ao banco de dados");
            }else {
                
                mysqli_query($conectar,"Update  Pessoa Set Nome='$nome', Data='$data', Contato='$contato', TipoPessoa='$tipopessoa' 
                       Where Id= '$id';");       
                
                //$conn->query("Insert Into Pessoa (Nome,Data,Contato,TipoPessoa) values('$nome','$data','$contato','$tipopessoa');");

            }
         
          
           
       } catch (Exception $exc) {
           echo "Error:".$exc->getMessage();
        }

      
       
   }
  
    
    public function Insert($nome,$data,$contato,$tipopessoa){
        try {
            
           //$conn = new PDO("mysql:host=".$this->server.";dbname=".$this->database , $this->username, $this->password);
           
              $conn = new Conexao1();
             $conectar =$conn->Conectar();
              
               if ($conectar ==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
               }else {
                   
                     mysqli_query($conectar,"Insert Into Pessoa (Nome,Data,Contato,TipoPessoa) values('$nome','$data','$contato'
                     ,'$tipopessoa');");
                     
                      // $conn->query("Insert Into Pessoa (Nome,Data,Contato,TipoPessoa) values('$nome','$data','$contato'
                //       ,'$tipopessoa');"); 
               } 
            
            
              
                    
                      
           
        } catch (Exception $ex) {
            echo "Error:".$ex->getMessage();
        }
        
        
    }
    
    
    public function GetData() {
        try {
              $conn = new Conexao1();
               $conectar =$conn->Conectar();
              
              if ( $conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else {
        
                 $list=mysqli_query($conectar,"Select * from Pessoa");
                 
                 return $list; 
               
              }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

     
    }
    
    
      public function GetById($id) {
        
          try {
                $conn = new Conexao1();
                $conectar =$conn->Conectar();
              
              if ($conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else  {
        
                  $query_id= mysqli_query($conectar,"Select Nome,Data,Contato,TipoPessoa From Pessoa 
                          Where Id = '$id' ;");
               
                  return $query_id;
              }
              
          } catch (Exception $exc) {
              echo $exc->getMessage();
          }

        
    }
    
    
    public function Delete($id) {
        
        try {
               $conn = new Conexao1();
               $conectar =$conn->Conectar();
              
              if ($conectar==null) {
                   
                throw new Exception("Não foi possivel conectar ao banco de dados");
                
              }else if ($id>0){
        
                 mysqli_query($conectar,"Delete from Pessoa where Id='$id' ;");
                 echo "<div class='text-center'><label class='alert alert-success alert-dismissible fade in' role='alert'><h3>Deletado com sucesso!</h3></label></div>"; 
              
              }else {
                 echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Não foi possivel deletar!</h3></label></div>"; 
              }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
    }

     public function GetConectar(){
         
         try {
              $con = new Conexao1();
               $con->Conectar();
               
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }

        
                 
     }

     
    
}


