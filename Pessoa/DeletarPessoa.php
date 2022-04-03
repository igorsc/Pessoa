   <title>Deletar Pessoa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Content/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="Content/bootstrap.min.css">
    
    
        
         <table border="1" class="table-responsive" style="border:solid;width: 100%; border-style:inset; background-color:#3071a9;height: 120px;direction:initial" >
            <thead>    
                <tr  style="font-size:50px">
                    <th class="text-center">Deletar Pessoa</th>
                </tr>
            </thead>
           
        </table>
        
        <br/>




<?php
     include './CamadaControle/PessoaControle.php';
     
     session_start();
    if  ($_SESSION['Idlogin']>0){
       echo"<ul style='padding-left:1200px'>
                        <span>Bem Vindo ". $_SESSION['login']."</span> 
                        <a href='Account/Logoff.php'><span  class='glyphicon glyphicon-off'></span></a>                  
                    </ul>";
  
       $controlepessoa = new PessoaControle();
     
       $id=$_GET['id'];
     
     
       $controlepessoa->_Delete($id);
    
    
       echo "<div class='text-center'> <a href='ListarPessoa.php?id=".$_SESSION['Idlogin']."&login=".$_SESSION['login']."&senha=".$_SESSION['senha']."'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;
    } 
?>


