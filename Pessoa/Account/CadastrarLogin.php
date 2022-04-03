 <title>Cadastrar Login - Sistema Pessoa</title>
         <link rel='stylesheet' type='text/css' href='../Content/bootstrap.css'>
         <link rel='stylesheet' type='text/css' href='../Content/bootstrap.min.css'>
         
          <table border='1' class='table-responsive' style='border:solid;width: 100%; border-style:inset; background-color:#3071a9;height: 120px;direction:initial' >
            <thead>    
                <tr  style='font-size:50px'>
                    <th class='text-center'>Cadastrar Pessoa</th>
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

include '../Entitie/Usuario.php';
require '../CamadaControle/UsuarioControle.php';

$Id=isset($_POST['id']);
$Login = $_POST['login'];
$Senha=$_POST['senha'];

$usuario= new Usuario($Id, $Login, $Senha);


try{
    if ($usuario->Login && $usuario->Senha ){  
        $controleusuario= new UsuarioControle();
        $result=  $controleusuario->_GetData();
        //while (list($login)=  mysqli_fetch_row($result)){
        foreach ($result as $user) {
          # code...
                 if ($usuario->Login==$user['login'] ){
                    throw  new PDOException();
                 }
                 if ( strlen($usuario->Senha)  != 4 ){
                    throw  new Exception();
                 }        
        }

        $query= $controleusuario->Salvar($usuario->Login, $usuario->Senha,$usuario->Id);

        echo "<div class='text-center'><label class='alert alert-success alert-dismissible fade in' role='alert'><h3>Usuario salvo com sucesso.</h3></a></div>";
        echo "<div class='text-center'> <a href='Login.php'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;


    }else{
        echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Nao foi salvar usuario.</h3></a></div>";
        echo "<div class='text-center'> <a href='PaginaCadastroLogin.php'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
    }
  
    
    } catch (PDOException $exc) {
              echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Usuario já existe tente outro.</h3></a></div>";
              echo "<div class='text-center'> <a href='PaginaCadastroLogin.php'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
    } 

     catch (Exception $exc) {
              echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Senha senha deverá ser de 04 dígitos.</h3></a></div>";
              echo "<div class='text-center'> <a href='PaginaCadastroLogin.php'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
    } 

