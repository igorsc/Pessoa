<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
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
         <form action="CadastrarLogin.php" method="post">
            <div class="row">
                <div class="col-md-4" >
                    <label id="lblLogin" class="text-left form-inline" style="color:blue">Login</label>
                    <input name="login" id="txtLogin" type="text" class="form-control"/>                        
                </div>
            </div>
             <div class="row">
                 <div class="col-md-4">    
                    <label id="lblSenha" class="text-left form-inline" style="color: blue">Senha</label>
                    <input name="senha" id="txtSenha" type="password"  class="form-control" />
                </div>
             </div>
            <br/>
            
            <div class="text-center">
                <input   id="btnSalvar" type="submit" value="Cadastrar" class="btn-primary btn-lg"/>
            </div>
         </form>
    
        
        <br/>



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

