<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$opcao = 1;
//$cont =0;      
//
//    
//    
//while ($cont<10) {
//    switch ($opcao) {
//    case 1:
//        echo "Bem Vindo </br>";
//        break;
//    
//     case 2:
//        echo "Olá </br>";
//        break;
//
//    default:
//        echo 'finalizar </br>';
//        break;
//      
//   }
//
//    $cont++;
//}
//
//
//echo '</br></br>';
//
//
//
//for ($i = 0; $i <10; $i++) {
//    switch ($opcao) {
//    case 1:
//        echo "Bem Vindo </br>";
//        break;
//    
//     case 2:
//        echo "Olá </br>";
//        break;
//
//    default:
//        echo "finalizar </br>";
//        break;
//      
//    }
//
//}
//
//echo '</br></br>';
//    
// 
//$i=0;
//
//$array =  array("Igor","Costa","Oscar");
//
//foreach ($array as $value) {
//   echo "array[$i]=$value<br/>";
//   $i++;
//}
//
//echo '</br></br>';
//
//foreach ($array as $key => $value) {
//    echo "$key = $value ";
//    print_r($array);
//    echo "<br/>";
//}
//
//echo '</br></br>';
//
//
//
//
//
//$posicao = array(0=>"Igor" , 1=>"Costa", 2=>"Santos");
//
//for ($index = 0; $index < count($posicao); $index++) {
//    if ($index==2) {
//        $posicao[3]="Sandra";
//    }
//}
//
//
//print_r($posicao);
//
//
//$cont=0;
//
//while ($cont<count($posicao)) {
//    
//    
//     
//        $posicao[4]="Cardoso";
//    
//    
//      $cont= count($posicao);
//}
//
//
//echo '</br></br>';
//
//print_r($posicao);
        
        

//---------------------------------------------------------------

//mysql_connect('localhost','root','');
//mysql_select_db("Pessoa");
//$query=  mysql_query("Select * from Usuario");

include '../Teste/Conectar.php'; 
 
$con = new Conectar();

$query=$con->Conect('usuario');

 

echo "<table>"
        . "<tr>"
            . "<th></th>"
            . "<th>Login</th>
               <th>Senha</th>"
        ."</tr>";
    
foreach ($query as $row) {
   
    echo  "<tr>"
                . "<td>".$row['id']."</td>"
                . "<td>".$row['login']."</td>"
                . "<td>".$row['senha']."</td>"
          . "</tr>";
         
}

echo '</table>';
