<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../AcessoBanco/AUsuario.php';


class UsuarioControle extends AUsuario  {
    //put your code here
    
    
    public function Salvar($login,$senha,$id){
        $acessousuario= new AUsuario();
        if($id == 0){
            
            return $acessousuario->Insert($login, $senha);
        
        } else if($id > 0){
            return $acessousuario->Update($login,$senha, $id );
        }
    }
    
    
    public function _GetData(){
        
         $acessousuario = new AUsuario();
         return  $acessousuario->GetData();
    }
    
    
    public function _GetById($id) {
         $acessousuario = new AUsuario();
         return $acessousuario->GetById($id);
    }
    
    
    public function _Delete($id) {
         $acessousuario = new AUsuario();
         return  $acessousuario->Delete($id);
    }
    
    
    public function _GetConectar(){
         $acessousuario = new AUsuario();
         return $acessousuario->GetConectar() ;
    }
    
    
    
    
}
