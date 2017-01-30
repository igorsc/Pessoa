<?php
define('diretorio','./AcessoBanco');
require_once diretorio.'/APessoa.php';
?> 

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaControle
 *
 * @author Igor
 */
class PessoaControle extends APessoa  {
    //put your code here
    
    
    public function Salvar($nome, $data, $contato, $tipopessoa ,$id){
        $acessopessoa= new APessoa();
        if($id == 0){
            
            return $acessopessoa->Insert($nome, $data, $contato, $tipopessoa);
        
        } else if($id > 0){
            return $acessopessoa->Update($nome, $data, $contato, $tipopessoa, $id );
        }
    }
    
    
    public function _GetData(){
        
         $acessopessoa = new APessoa();
         return  $acessopessoa->GetData();
    }
    
    
    public function _GetById($id) {
         $acessopessoa = new APessoa();
         return $acessopessoa->GetById($id);
    }
    
    
    public function _Delete($id) {
         $acessopessoa = new APessoa();
         return  $acessopessoa->Delete($id);
    }
    
    
    public function _GetConectar(){
        $acessopessoa = new APessoa();
         return $acessopessoa->GetConectar() ;
    }
    
    
    
    
}
