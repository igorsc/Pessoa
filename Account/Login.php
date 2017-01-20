


 <title>Logar-Sistema Pessoa</title>
         <link rel='stylesheet' type='text/css' href='../Content/bootstrap.css'>
         <link rel='stylesheet' type='text/css' href='../Content/bootstrap.min.css'>
         
          <table border='1' class='table-responsive' style='border:solid;width: 100%; border-style:inset; background-color:#3071a9;height: 120px;direction:initial' >
            <thead>    
                <tr  style='font-size:50px'>
                    <th class='text-center'>Sistema Pessoa</th>
                </tr>
            </thead>
           
        </table>
         <br/>
         <form action="../ListarPessoa.php" method="post">
            <div class="row">
                <div class="col-md-4">
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
                <input   id="btnSalvar" type="submit" value="Entrar" class="btn-primary btn-lg"/>
            </div>
         </form>
         <br/>
           <div class="text-center">
               <a href="PaginaCadastroLogin.php">Cadastre-se para logar</a>
            </div>
        
        <br/>