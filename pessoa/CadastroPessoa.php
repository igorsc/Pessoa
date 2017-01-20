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

/**
 * Description of CadastroPessoa
 *
 * @author Igor
 */


require './Entitie/Pessoa.php';
require './CamadaControle/PessoaControle.php' ;
require './CamadaControle/UsuarioControle.php';

//$pessoa = new Pessoa();
$controlepessoa= new PessoaControle();

session_start();
if  ($_SESSION['Idlogin']>0){
       echo"<ul style='padding-left:1200px'>
                        <span>Bem Vindo ". $_SESSION['login']."</span> 
                        <a href='Account/Logoff.php'><span  class='glyphicon glyphicon-off'></span></a>                  
                    </ul>";

if(isset($_GET['id'])>0){
    
    
    $pessoa = new Pessoa($_GET['id'],$_GET['nome'], $_GET['data'], $_GET['contato'], $_GET['tipopessoa']);
    $Id=$_GET['id'];
    
    $tipopessoa= $_GET['tipopessoa'] ;
    
  
    
    echo " <form action='CadastroPessoaAtlz.php?id=$Id' method='post'>
            <div class='row'>
                <div class='col-md-6'>    
                    <label id='lblNome' class='text-left form-inline' style='color: blue'>Nome</label>
                    <input name='nome' id='txtNome' type='text' class='form-control' value='$pessoa->Nome'/>
                </div>
                <div class='col-md-6'>    
                    <label id='lblData' class='text-left form-inline' style='color: blue'>Data</label>
                    <!--<input name='data' id='txtData' type='text'  onkeypress='dateMask(this,event)'  placeholder='mm/dd/aaaa' maxlength='10' class='form-control' />-->
                    <input name='data' id='txtData' type='date'  onkeypress='dateMask(this,event)'  class='form-control' value='$pessoa->Data' />
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label id='lblContato' class='text-left form-inline' style='color: blue'>Contato</label>
                    <input name='contato' id='txtContato' type='text' class='form-control' onkeypress='mascara(txtContato,'## #####-####')' maxlength='13' placeholder='99 99999-9999' value='$pessoa->Contato'/>
                </div>
                <div class='col-md-6'>
                    <label id='lblTipoPessoa' class='text-left form-inline' style='color: blue' >Tipo Pessoa</label>
                        <select id='sltTipoPessoa' name='tipopessoa' class='form-control' value='$pessoa->TipoPessoa' >";
                            if ($tipopessoa==0){
                                echo "<option value='$tipopessoa'>Selecione...</option>";
                                echo "<option value='1'>Fisica</option>";
                                echo "<option value='2' >Juridica</option>";
                            }
                            if ($tipopessoa==1){
                                echo "<option value='0' >Selecione...</option>";
                                echo "<option value='$tipopessoa' selected >Fisica</option>";
                                echo "<option value='2' >Juridica</option>";
                            }else if ($tipopessoa==2){
                                echo "<option value='0' >Selecione...</option>";
                                echo "<option value='1' >Fisica</option>";
                                echo "<option value='$tipopessoa' selected>Juridica</option>";
                            }
                          
                    echo"</select>
                </div>
            </div>
            <br/>
            <div class='text-center'>
                <input   id='btnSalvar' type='submit' value='Salvar' class='btn-primary btn-lg'/>
            </div>
        </form>
        <br/>";
//                    $controleuser = new UsuarioControle();
//                    $query=$controleuser->_GetData();
//                    while (list($id,$login,$senha)=  mysql_fetch_row($query)) {
//                        $varid=$id;
//                        $varlogin=$login;
//                        $varsenha=$senha;
//                       
//                    }
       
         $idLogin = $_SESSION['Idlogin'];
         $login = $_SESSION['login'];
         $senha=$_SESSION['senha'];
        echo" <div class='text-center'>
            <a href='ListarPessoa.php?id=$idLogin&login=$login&senha=$senha'><input type='submit' value='Voltar' class='btn-primary btn-lg' /></a>       
        </div>";
     
} else if (isset($_GET['id'])==0) {

$pessoa = new Pessoa(isset($_GET['id']),$_POST['nome'], $_POST['data'], $_POST['contato'], $_POST['tipopessoa']);     
$pessoa->setNome( $_POST['nome']);

$pessoa->setData($_POST['data']);

$pessoa->setContato($_POST['contato']);


$pessoa->setTipoPessoa($_POST['tipopessoa']);

//$pessoa->Id =$_POST['id'];
//$pessoa->Nome=$_POST['nome'];
//$pessoa->Data= $_POST['data'];
//$pessoa->Contato= $_POST['contato'];
//$pessoa->TipoPessoa= $_POST['tipopessoa'];      


 
     
 try {
     
    
          
          if($pessoa->Nome!='' && $pessoa->Data!='' && $pessoa->Contato!='' && $pessoa->TipoPessoa> 0 ){        
                       
                   $controlepessoa->Salvar($pessoa->Nome, $pessoa->Data, $pessoa->Contato, $pessoa->TipoPessoa, $pessoa->Id);
                    //echo' $pessoa->Nome, $pessoa->Data, $pessoa->Contato, $pessoa->TipoPessoa,$pessoa->Id </br>';
                   
                   echo" <div class='text-center'><label class='alert alert-success alert-dismissible fade in' role='alert'><h3>Salvo com sucesso.Voltar para cadastro!</h3></lable></div>";
                  
                   echo "<div class='text-center'> <a href='CadastroPessoa.php?id=$pessoa->Id&nome=$pessoa->Nome&data=$pessoa->Data&contato=$pessoa->Contato&tipopessoa=$pessoa->TipoPessoa'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
                    
                    
              
          }else{
             echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Nao foi possivel salvar.</h3></a></div>";
             echo "<div class='text-center'> <a href='CadastroPessoa.html'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
          } 
          
       } catch (Exception $ex) {
          echo 'Error:'.$ex->getMessage();
         }       
   
    
    
   
    
}      

}
 
 

 
 
