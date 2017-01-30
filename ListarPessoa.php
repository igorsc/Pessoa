        
        <title>Listar Pessoas</title>
         <link rel="stylesheet" type="text/css" href="Content/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="Content/bootstrap.min.css">
         
          <table border="1" class="table-responsive" style="border:solid;width: 100%; border-style:inset; background-color:#3071a9;height: 120px;direction:initial" >
            <thead>    
                <tr  style="font-size:50px">
                    <th class="text-center">Listar Pessoas</th>
                </tr>
            </thead>

        </table>

        

       
        
        <!--<br/>-->
        
        
<!--        <table  border='1' class="table table-bordered table-responsive"  >
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Contato</th>
                    <th>Tipo Pessoa</th> 
                    <th></th>
                    <th></th>
                </tr>
            </thead>-->
        <?php
               
                include '../Pessoa/CamadaControle/PessoaControle.php';
                include './CamadaControle/UsuarioControle.php';
                include './Entitie/Enumerator.php';
                include './Entitie/Usuario.php';
                //include './AcessoBanco/Conexao.php';
            
                

                $usuario = new Usuario(isset($_REQUEST['id']), $_REQUEST['login'], $_REQUEST['senha']);
               
      
         $varlogin=null;
         $varsenha =null;
       
            
      
        
        $controleusuario= new UsuarioControle();
        $query=$controleusuario->_GetData();
        //$query=mysql_query("Select * from Usuario",$link);
        //while (list($id,$login,$senha)= mysqli_fetch_row($query)){ //mysql_fetch_row($query)){
        foreach ($query as $row) {
                              
            
            //if ($usuario->Login == $login && $usuario->Senha==$senha) {
              if ($usuario->Login == $row['Login'] && $usuario->Senha==$row['Senha']) {
                session_start();
                //$_SESSION['Idlogin']=$id;
                //$_SESSION['login']=$login;
                //$_SESSION['senha']=$senha;
                $_SESSION['Idlogin']=$row['Id'];
                $_SESSION['login']=$row['Login'];
                $_SESSION['senha']=$row['Senha'];
               echo"<ul style='padding-left:1200px'>
                        <span>Bem Vindo ". $_SESSION['login']."</span> 
                        <a href='Account/Logoff.php'><span  class='glyphicon glyphicon-off'></span></a>                  
                    </ul>";
               echo"<table  border='1' class='table table-bordered table-responsive'  >
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Contato</th>
                    <th>Tipo Pessoa</th> 
                    <th></th>
                    <th></th>
                </tr>
                </thead>";
               
               $pessoacontrole = new PessoaControle();
               $pessoacontrole->_GetConectar();
               //$query = mysql_query("Select * from Pessoa");
               $query = $pessoacontrole->_GetData();
               
               //while (list($id,$nome,$data,$contato,$tipopessoa)= mysqli_fetch_row($query)){ 
               foreach ($query as $row) {
                                
                /*echo
                "<tbody>
                    <tr>
                        <td>".$nome."</td>
                        <td>".$data."</td>
                        <td>".$contato."</td>";
                        if ($tipopessoa==Enumerator::Fisica){
                           echo"<td>".'Física'."</td>"; 
                        }else if($tipopessoa==Enumerator::Juridica){
                            echo '<td>'.'Jurídica'.'</td>';
                        }     
                        echo" <td><a id='editar' runat='server' href='CadastroPessoa.php?id=$id&nome=$nome&data=$data&contato=$contato&tipopessoa=$tipopessoa' class='glyphicon glyphicon-pencil' title='Editar'></a></td>
                        <td><a id='excluir' runat='server' href='DeletarPessoa.php?id=$id' title='Deletar' class='glyphicon glyphicon-remove'></a></td>
                    </tr> 
                </tbody>";*/
                echo
                "<tbody>
                    <tr>
                        <td>".$row['Nome']."</td>
                        <td>".$row['Data']."</td>
                        <td>".$row['Contato']."</td>";
                        if ($row['TipoPessoa']==Enumerator::Fisica){
                           echo"<td>".'Física'."</td>"; 
                        }else if($row['TipoPessoa']==Enumerator::Juridica){
                            echo '<td>'.'Jurídica'.'</td>';
                        }     
                        echo" <td><a id='editar' runat='server' href='CadastroPessoa.php?id=".$row['Id']."&nome=".$row['Nome']."&data=".$row['Data']."&contato=".$row['Contato']."&tipopessoa=".$row['TipoPessoa']."' class='glyphicon glyphicon-pencil' title='Editar'></a></td>
                        <td><a id='excluir' runat='server' href='DeletarPessoa.php?id=".$row['Id']."' title='Deletar' class='glyphicon glyphicon-remove'></a></td>
                    </tr> 
                </tbody>";
                       
               }
               
               echo"</table>
                    <br/>
                    <div class='text-center'>
                        <a href='CadastroPessoa.html'><input type='submit' value='Adcionar' name='adicionar' class='btn-primary btn-lg' /></a>
                    </div>";
            } 
               //$varlogin=$login;
               //$varsenha=$senha;
               $varlogin= $_SESSION['login'];
               $varsenha= $_SESSION['senha']; 
         }
         
         
        
            if ($usuario->Login!=$varlogin || $usuario->Senha!=$varsenha){
                echo "<div class='text-center'><label class='alert alert-danger alert-dismissible fade in' role='alert'><h3>Usuario nao autenticado.</h3></a></div>";
                echo "<div class='text-center'> <a href='../Pessoa/Account/Login.php'><input type='submit' value='Voltar' class='btn-primary btn-lg'/></a></div>" ;

            }
        
        
        ?> 
<!--        </table>
        <br/>
        <div class="text-center">
            <a href="CadastroPessoa.html"><input type="submit" value="Adcionar" name='adicionar' class="btn-primary btn-lg" /></a>
        </div>-->



       