<?php
class Conexao1{
public $server='127.0.0.1';
public $user='root';
public $senha='';
public $db='Pessoas';


//public function __construct($server, $user, $senha, $db) {
//    $this->server = $server;
//    $this->user = $user;
//    $this->senha = $senha;
//    $this->db = $db;
//}






public function Conectar() {


     
      //$link= mysql_connect($this->server,$this->user,$this->senha) or die (mysql_error());
          
        //mysql_select_db($this->db) or die (mysql_error());
      
        //$link= mysqli_connect($this->server,$this->user,$this->senha,$this->db) or  die("Não foi possivel conectar ao servidor e ao banco! ".  mysqli_connect_error());
            
        //return $link;

        $server='127.0.0.1';
        $user='root';
        $senha='';
        $db='Pessoas';

        try {
          
          $link = new PDO('mysql:host='.$server.';dbname='.$db,$user,$senha);

          return $link;
        
        } catch (PDOException $e) {
         echo "Conection falied database:". $e->getMessage();
        }
 
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
                
                //mysqli_query($conectar,"Update  Pessoa Set Nome='$nome', Data='$data', Contato='$contato', TipoPessoa='$tipopessoa' 
                       //Where Id= '$id';");       
                
                $conectar->query("Update  Pessoa Set Nome='$nome', Data='$data', Contato='$contato', TipoPessoa='$tipopessoa' Where Id= '$id';");

            }
         
          
           
       } catch (PDOException $exc) {
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
                   
                     //mysqli_query($conectar,"Insert Into Pessoa (Nome,Data,Contato,TipoPessoa) values('$nome','$data','$contato'
                     //,'$tipopessoa');");
                     
                      $conectar->query("Insert Into Pessoa (Nome,Data,Contato,TipoPessoa) values('$nome','$data','$contato'
                      ,'$tipopessoa');"); 
               } 
            
            
              
                    
                      
           
        } catch (PDOException $ex) {
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
        
                 //$list=mysqli_query($conectar,"Select * from Pessoa");
                 $list=$conectar->query("Select * from Pessoa");
                 return $list; 
               
              }
        } catch (PDOException $exc) {
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
        
                  //$query_id= mysqli_query($conectar,"Select Nome,Data,Contato,TipoPessoa From Pessoa 
                          //Where Id = '$id' ;");
               
                  $query_id=$conectar->query("Select Nome,Data,Contato,TipoPessoa From Pessoa Where Id = '$id' ;");
                  return $query_id;
              }
              
          } catch (PDOException $exc) {
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
        
                 //mysqli_query($conectar,"Delete from Pessoa where Id='$id' ;");
                 $conectar->query("Delete from Pessoa where Id='$id' ;");
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
              $con = new Conexao1();
               $con->Conectar();
               
         } catch (Exception $exc) {
             echo $exc->getTraceAsString();
         }

        
                 
     }

     
    
}


