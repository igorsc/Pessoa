
<title>Cadastro de Pessoa</title>
         <link rel='stylesheet' type='text/css' href='Content/bootstrap.css'>
         <link rel='stylesheet' type='text/css' href='Content/bootstrap.min.css'>
         
          <table border='1' class='table-responsive' style='border:solid;width: 100%; border-style:inset; background-color:#3071a9;height: 120px;direction:initial' >
            <thead>    
                <tr  style='font-size:50px'>
                    <th class='text-center'>Cadastro de Pessoas</th>
                </tr>
            </thead>
           
        </table>
        
        <br/>




<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './Entitie/Pessoa.php';
require './CamadaControle/PessoaControle.php' ;

$pessoa = new Pessoa($_GET['id'],$_POST['nome'], $_POST['data'], $_POST['contato'], $_POST['tipopessoa']);
$controlepessoa= new PessoaControle();

//$pessoa->setId($_GET['id']);

$pessoa->setNome( $_POST['nome']);

$pessoa->setData($_POST['data']);

$pessoa->setContato($_POST['contato']);

$pessoa->setTipoPessoa($_POST['tipopessoa']);

session_start();
if  ($_SESSION['Idlogin']>0){
       echo"<ul style='padding-left:1200px'>
                        <span>Bem Vindo ". $_SESSION['login']."</span> 
                        <a href='Account/Logoff.php'><span  class='glyphicon glyphicon-off'></span></a>                  
                    </ul>";
    
    try {
     
    
          
          if($pessoa->Nome!='' && $pessoa->Data!='' && $pessoa->Contato!='' && $pessoa->TipoPessoa> 0 ){        
                       
                   $controlepessoa->Salvar($pessoa->Nome, $pessoa->Data, $pessoa->Contato, $pessoa->TipoPessoa, $pessoa->Id);
                    //echo' $pessoa->Nome, $pessoa->Data, $pessoa->Contato, $pessoa->TipoPessoa,$pessoa->Id </br>';
                   
                   echo" <div class='text-center'><label class='alert alert-success alert-dismissible fade in' role='alert'><h3>Salvo com sucesso.Voltar para cadastro!</h3></lable></div>";
                  
                   echo "<div class='text-center'><a href='CadastroPessoa.php?id=$pessoa->Id&nome=$pessoa->Nome&data=$pessoa->Data&contato=$pessoa->Contato&tipopessoa=$pessoa->TipoPessoa'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
                    
                    
              
          }else{
             echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Nao foi possivel salvar.</h3></a></div>";
             echo "<div class='text-center'> <a href='CadastroPessoa.php?id=$pessoa->Id&nome=$pessoa->Nome&data=$pessoa->Data&contato=$pessoa->Contato&tipopessoa=$pessoa->TipoPessoa'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
          } 
          
       } catch (Exception $ex) {
          echo 'Error:'.$ex->getMessage();
         }       
     
}